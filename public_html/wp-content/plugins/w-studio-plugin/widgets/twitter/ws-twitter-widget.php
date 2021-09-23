<?php
/*
  Plugin Name: Twitter Tweets Widget
  Plugin URI: http://code.tutsplus.com
  Description: Displays latest tweets from Twitter.
  Author: Agbonghama Collins
  Author URI: http://tech4sky.com
 */

class w_studio_twitter_widget extends WP_Widget {
    function __construct() {
        parent::__construct(
            'w_studio_twitter_widget',
            esc_html__( 'Twitter Tweets Widget', 'w-studio-plugin' ),
            array(
                'classname' => 'w_studio_twitter_widget',
                'description' => esc_html__( 'Displays latest tweets from Twitter.', 'w-studio-plugin' ),
                'customize_selective_refresh' => true
            )
        );
    }

    //display twitter feed
    public function widget( $w_studio_args, $w_studio_instance ) {

        $w_studio_title                  = apply_filters( 'widget_title', $w_studio_instance['title'] );
        $config['screenname']      = $w_studio_instance['twitter_username'];
        $config['count']           = $w_studio_instance['update_count'];
        $config['token']           = $w_studio_instance['oauth_access_token'];
        $config['token_secret']    = $w_studio_instance['oauth_access_token_secret'];
        $config['key']             = $w_studio_instance['consumer_key'];
        $config['secret']          = $w_studio_instance['consumer_secret'];

        require('StormTwitter.class.php');

        echo $w_studio_args['before_widget'];

        if ( ! empty( $w_studio_title ) ) {
            echo $w_studio_args['before_title'] . $w_studio_title . $w_studio_args['after_title'];
        }


        $w_studio_result = $this->getTweets($config);

        if($w_studio_result) { ?>

                <div id="twitter-feed" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner">

                        <?php
                        $w_studio_count = 0;
                        foreach($w_studio_result as $timeline): ?>

                            <div class="item text-center <?php echo ($w_studio_count == 0) ? 'active' : ''; ?>">
                                <p class="wl-standard-marginbottom">
                                    <span data-icon=&#xe094;></span> @ <span class="text-capitalize"><b><?php echo esc_attr($config['screenname']); ?></b></span>
                                </p>
                                <p class="wl-standard-marginbottom">
                                    <?php if( isset( $timeline['text'] ) ) { echo esc_attr($timeline['text']); } ?>
                                </p>
                                <p class="wl-standard-marginbottom"><?php if( isset( $timeline['created_at'] ) ){ echo esc_attr($timeline['created_at']); } ?></p>
                            </div>

                            <?php
                            $w_studio_count++;
                        endforeach; ?>

                    </div>
                    <!-- Indicators -->
                    <ol class="carousel-indicators twitter-carousel">
                        <?php for($w_studio_counts = 0; $w_studio_counts < $w_studio_count; $w_studio_counts++) : ?>
                            <li data-target="#twitter-feed" data-slide-to="<?php echo esc_attr($w_studio_counts); ?>" class="<?php echo ($w_studio_counts == 0) ? 'active' : ''; ?>"><span></span></li>
                        <?php endfor; ?>
                    </ol>
                </div>

        <?php
        }

        echo $w_studio_args['after_widget'];
    }

    function getTweets($config)
    {

        $obj = new StormTwitter($config);
        $res = $obj->getTweets($config['screenname'], $config['count'], false);
        return $res;
    }



    // widget form
    public function form($w_studio_instance) {
        if ( empty( $w_studio_instance ) ) {
            $twitter_username = '';
            $update_count = '';
            $oauth_access_token = '';
            $oauth_access_token_secret = '';
            $consumer_key = '';
            $consumer_secret = '';
            $w_studio_title = '';
        } else {
            $twitter_username = $w_studio_instance['twitter_username'];
            $update_count = isset( $w_studio_instance['update_count'] ) ? $w_studio_instance['update_count'] : 5;
            $oauth_access_token = $w_studio_instance['oauth_access_token'];
            $oauth_access_token_secret = $w_studio_instance['oauth_access_token_secret'];
            $consumer_key = $w_studio_instance['consumer_key'];
            $consumer_secret = $w_studio_instance['consumer_secret'];

            if ( isset( $w_studio_instance['title'] ) ) {
                $w_studio_title = $w_studio_instance['title'];
            } else {
                $w_studio_title = esc_html__( 'Twitter feed', 'w-studio-plugin' );
            }
        }

        ?>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id( 'title' )); ?>">
                <?php echo esc_html__( 'Title', 'w-studio-plugin' ) . ':'; ?>
            </label>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id( 'title' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'title' )); ?>" type="text" value="<?php echo esc_attr( $w_studio_title ); ?>" />
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id( 'twitter_username' )); ?>">
                <?php echo esc_html__( 'Twitter Username (without @)', 'w-studio-plugin' ) . ':'; ?>
            </label>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id( 'twitter_username' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'twitter_username' )); ?>" type="text" value="<?php echo esc_attr( $twitter_username ); ?>" />
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id( 'update_count' )); ?>">
                <?php echo esc_html__( 'Number of Tweets to Display', 'w-studio-plugin' ) . ':'; ?>
            </label>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id( 'update_count' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'update_count' )); ?>" type="number" value="<?php echo esc_attr( $update_count ); ?>" placeholder="Please give a value between 1 and 15" />
            <span class="wl-display-switch">Your value will saved as 15.</span>
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id( 'oauth_access_token' )); ?>">
                <?php echo esc_html__( 'OAuth Access Token', 'w-studio-plugin' ) . ':'; ?>
            </label>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id( 'oauth_access_token' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'oauth_access_token' )); ?>" type="text" value="<?php echo esc_attr( $oauth_access_token ); ?>" />
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id( 'oauth_access_token_secret' )); ?>">
                <?php echo esc_html__( 'OAuth Access Token Secret', 'w-studio-plugin' ) . ':'; ?>
            </label>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id( 'oauth_access_token_secret' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'oauth_access_token_secret' )); ?>" type="text" value="<?php echo esc_attr( $oauth_access_token_secret ); ?>" />
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id( 'consumer_key' )); ?>">
                <?php echo esc_html__( 'Consumer Key', 'w-studio-plugin' ) . ':'; ?>
            </label>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id( 'consumer_key' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'consumer_key' )); ?>" type="text" value="<?php echo esc_attr( $consumer_key ); ?>" />
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id( 'consumer_secret' )); ?>">
                <?php echo esc_html__( 'Consumer Secret', 'w-studio-plugin' ) . ':'; ?>
            </label>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id( 'consumer_secret' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'consumer_secret' )); ?>" type="text" value="<?php echo esc_attr( $consumer_secret ); ?>" />
        </p>
    <?php
    }

    //update twitter form
    public function update( $w_studio_new_instance, $w_studio_old_instance ) {
        $w_studio_instance = array();

        $w_studio_instance['title']                      = ( ! empty( $w_studio_new_instance['title'] ) )                     ? strip_tags( $w_studio_new_instance['title'] ) : '';
        $w_studio_instance['title']                      = ( ! empty( $w_studio_new_instance['title'] ) )                     ? strip_tags( $w_studio_new_instance['title'] ) : '';
        $w_studio_instance['twitter_username']           = ( ! empty( $w_studio_new_instance['twitter_username'] ) )          ? strip_tags( $w_studio_new_instance['twitter_username'] ) : '';
        $w_studio_instance['update_count']               = ( ! empty( $w_studio_new_instance['update_count'] ) )              ? strip_tags( $w_studio_new_instance['update_count'] ) : '';
        $w_studio_instance['oauth_access_token']         = ( ! empty( $w_studio_new_instance['oauth_access_token'] ) )        ? strip_tags( $w_studio_new_instance['oauth_access_token'] ) : '';
        $w_studio_instance['oauth_access_token_secret']  = ( ! empty( $w_studio_new_instance['oauth_access_token_secret'] ) ) ? strip_tags( $w_studio_new_instance['oauth_access_token_secret'] ) : '';
        $w_studio_instance['consumer_key']               = ( ! empty( $w_studio_new_instance['consumer_key'] ) )              ? strip_tags( $w_studio_new_instance['consumer_key'] ) : '';
        $w_studio_instance['consumer_secret']            = ( ! empty( $w_studio_new_instance['consumer_secret'] ) )           ? strip_tags( $w_studio_new_instance['consumer_secret'] ) : '';

        return $w_studio_instance;
    }
}

function twitter_widget() {

    unregister_widget('WP_Widget');
    register_widget('w_studio_twitter_widget');
}
add_action('widgets_init', 'twitter_widget');