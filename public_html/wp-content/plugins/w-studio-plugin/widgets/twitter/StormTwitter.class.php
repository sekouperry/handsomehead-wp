<?php
/*
* Version 2.2.1
* The base class for the storm twitter feed for developers.
* This class provides all the things needed for the wordpress plugin, but in theory means you don't need to use it with wordpress.
* What could go wrong?
*/


if ( !class_exists( 'TwitterOAuth' ) ) {
    require_once 'oauth/twitteroauth.php';
} else {
    define('TFD_USING_EXISTING_LIBRARY_TWITTEROAUTH', true);
}

class StormTwitter
{

    private $defaults = array(
        'directory' => '',
        'key' => '',
        'secret' => '',
        'token' => '',
        'token_secret' => '',
        'screenname' => '',
        'cache_expire' => 3600
    );

    public $st_last_error = false;

    function __construct($w_studio_args = array())
    {
        $this->defaults = array_merge($this->defaults, $w_studio_args);
    }

    function __toString()
    {
        return print_r($this->defaults, true);
    }

    function getTweets($w_studio_screenname = false, $w_studio_count , $options = false)
    {
        // BC: $w_studio_count used to be the first argument
        if (is_int($w_studio_screenname)) {
            list($w_studio_screenname, $w_studio_count) = array($w_studio_count, $w_studio_screenname);
        }

        if ($w_studio_count > 15) $w_studio_count = 15;
        if ($w_studio_count < 1) $w_studio_count = 1;

        $default_options = array('trim_user' => true, 'exclude_replies' => true, 'include_rts' => false);

        if ($options === false || !is_array($options)) {
            $options = $default_options;
        } else {
            $options = array_merge($default_options, $options);
        }

        if ($w_studio_screenname === false || $w_studio_screenname === 20) $w_studio_screenname = $this->defaults['screenname'];

        $w_studio_result = $this->checkValidCache($w_studio_screenname, $options);

        if ($w_studio_result !== false) {
            //return $this->cropTweets($w_studio_result, $w_studio_count);
        }

        //If we're here, we need to load.
        $w_studio_result = $this->oauthGetTweets($w_studio_screenname, $w_studio_count, $options);

        if (is_array($w_studio_result) && isset($w_studio_result['errors'])) {
            if (is_array($w_studio_result) && isset($w_studio_result['errors'][0]) && isset($w_studio_result['errors'][0]['message'])) {
                $last_error = $w_studio_result['errors'][0]['message'];
            } else {
                $last_error = $w_studio_result['errors'];
            }
            return array('error' => 'Twitter said: ' . json_encode($last_error));
        } else {
            if (is_array($w_studio_result)) {
                return $this->cropTweets($w_studio_result, $w_studio_count);
            } else {
                $last_error = 'Something went wrong with the twitter request: ' . json_encode($w_studio_result);
                return array('error' => $last_error);
            }
        }

    }

    private function cropTweets($w_studio_result, $w_studio_count)
    {
        return array_slice($w_studio_result, 0, $w_studio_count);
    }

    private function getCacheLocation()
    {
        return $this->defaults['directory'] . '.tweetcache';
    }

    private function getOptionsHash($options)
    {
        $hash = md5(serialize($options));
        return $hash;
    }

    private function checkValidCache($w_studio_screenname, $options)
    {
        require_once( ABSPATH . 'wp-admin/includes/file.php' );
        WP_Filesystem();
        global $wp_filesystem;

        $file = $this->getCacheLocation();
        if (is_file($file)) {
            $cache = wp_remote_get($file);
            $cache = @json_decode($cache, true);

            if (!isset($cache)) {
                unlink($file);
                return false;
            }

            // Delete the old cache from the first version, before we added support for multiple usernames
            if (isset($cache['time'])) {
                unlink($file);
                return false;
            }

            $cachename = $w_studio_screenname . "-" . $this->getOptionsHash($options);

            //Check if we have a cache for the user.
            if (!isset($cache[$cachename])) return false;

            if (!isset($cache[$cachename]['time']) || !isset($cache[$cachename]['tweets'])) {
                unset($cache[$cachename]);
                
                $wp_filesystem->put_contents( $file, json_encode($cache), FS_CHMOD_FILE );
                //file_put_contents($file, json_encode($cache));
                return false;
            }

            if ($cache[$cachename]['time'] < (time() - $this->defaults['cache_expire'])) {
                $w_studio_result = $this->oauthGetTweets($w_studio_screenname, '', $options);
                if (!isset($w_studio_result['errors'])) {
                    return $w_studio_result;
                }
            }
            return $cache[$cachename]['tweets'];
        } else {
            return false;
        }
    }

    private function oauthGetTweets($w_studio_screenname, $w_studio_count, $options)
    {
        global $wp_filesystem;

        $key = $this->defaults['key'];
        $secret = $this->defaults['secret'];
        $token = $this->defaults['token'];
        $token_secret = $this->defaults['token_secret'];

        $cachename = $w_studio_screenname . "-" . $this->getOptionsHash($options);

        $options = array_merge($options, array('screen_name' => $w_studio_screenname, 'count' => $w_studio_count));

        if (empty($key)) return array('error' => 'Missing Consumer Key - Check Settings');
        if (empty($secret)) return array('error' => 'Missing Consumer Secret - Check Settings');
        if (empty($token)) return array('error' => 'Missing Access Token - Check Settings');
        if (empty($token_secret)) return array('error' => 'Missing Access Token Secret - Check Settings');
        if (empty($w_studio_screenname)) return array('error' => 'Missing Twitter Feed Screen Name - Check Settings');

        $connection = new TwitterOAuth($key, $secret, $token, $token_secret);
        $w_studio_result = $connection->get('statuses/user_timeline', $options);

        if (is_file($this->getCacheLocation())) {
            $cache = json_decode(wp_remote_get($this->getCacheLocation()), true);
        }

        if (!isset($w_studio_result['errors'])) {
            $cache[$cachename]['time'] = time();
            $cache[$cachename]['tweets'] = $w_studio_result;
            $file = $this->getCacheLocation();
            $wp_filesystem->put_contents( $file, json_encode($cache), FS_CHMOD_FILE );
            //file_put_contents($file, json_encode($cache));
        } else {
            if (is_array($w_studio_result) && isset($w_studio_result['errors'][0]) && isset($w_studio_result['errors'][0]['message'])) {
                $last_error = '[' . date('r') . '] Twitter error: ' . $w_studio_result['errors'][0]['message'];
                $this->st_last_error = $last_error;
            } else {
                $last_error = '[' . date('r') . '] Twitter returned an invalid response. It is probably down.';
                $this->st_last_error = $last_error;
            }
        }

        return $w_studio_result;

    }
}
