<?php
/**
 * Widget API: WP_Widget class
 *
 * @package WordPress
 * @subpackage Widgets
 * @since 4.4.0
 */

/**
 * Core class used to implement a Instagram Posts widget.
 *
 * @since 2.8.0
 *
 * @see WP_Widget
 */
/**
* 
*/
class loadWidgetInstagram extends WP_Widget {
	
    function __construct() {

        parent::__construct(
            'w-instagram-feed',
            esc_html__( 'Instagram', 'w-studio-plugin' ),
            array(
                'classname'                     => 'loadWidgetInstagram',
                'description'                   => esc_html__( 'Displays your latest Instagram photos', 'w-studio-plugin' ),
                'customize_selective_refresh'   => true
            )
        );
    }

    /**
    * Outputs the content for the current Instagram Images widget instance.
    *
    * @since 2.8.0
    * @access public
    *
    * @param array $w_studio_args     Display arguments including 'before_title', 'after_title',
    *                        'before_widget', and 'after_widget'.
    * @param array $w_studio_instance Settings for the current Recent Posts widget instance.
    */
    public function widget( $w_studio_args, $w_studio_instance ) {

        $username   = empty( $w_studio_instance['username'] ) ? '' : $w_studio_instance['username'];
        $w_studio_limit      = empty( $w_studio_instance['number'] ) ? 9 : $w_studio_instance['number'];
        $w_studio_image_size       = empty( $w_studio_instance['size'] ) ? 'large' : $w_studio_instance['size'];
        $target     = empty( $w_studio_instance['target'] ) ? '_self' : $w_studio_instance['target'];
        $link       = empty( $w_studio_instance['link'] ) ? '' : $w_studio_instance['link'];

        if ( ! isset( $w_studio_args['widget_id'] ) ) {
            $w_studio_args['widget_id'] = $this->id;
        }

        $w_studio_title      = ( ! empty( $w_studio_instance['title'] ) ) ? $w_studio_instance['title'] : esc_html__( 'Recent Instagram Photos', 'w-studio-plugin' );

        /** This filter is documented in wp-includes/widgets/class-wp-widget-pages.php */
        $w_studio_title      = apply_filters( 'widget_title', $w_studio_title, $w_studio_instance, $this->id_base );

        echo $w_studio_args['before_widget'];

        if( $username != '' ){

            $media_array = $this->scrape_instagram( $username, $w_studio_limit );

            if( is_wp_error( $media_array ) ){

                echo wp_kses_post( $media_array->get_error_message() );

            }else{

                // filter for images only?
                if( $w_studio_images_only = apply_filters( 'wpiw_images_only', FALSE ) )
                    $media_array = array_filter( $media_array, array( $this, 'images_only' ) );

                // filters for custom classes
                $ulclass        = apply_filters( 'wpiw_list_class', 'instagram-pics instagram-size-' . $w_studio_image_size );
                $liclass        = apply_filters( 'wpiw_item_class', '' );
                $aclass         = apply_filters( 'wpiw_a_class', '' );
                $w_studio_countsmgclass       = apply_filters( 'wpiw_img_class', '' );
                $template_part  = apply_filters( 'wpiw_template_part', 'parts/ws-instagram-widget.php' );

                ?>
                <div class="wl-sidebar-items">
                <?php echo $w_studio_args['before_title']. $w_studio_title . $w_studio_args['after_title']; ?>
                <div class="wl-full-width">
                <?php
                $w_studio_counter = 1;
                foreach ( $media_array as $w_studio_item ) {

                    // copy the else line into a new file ( parts/wp-instagram-widget.php ) within your theme and customise accordingly
                    if( locate_template( $template_part ) != '' ){
                        include locate_template( $template_part );
                    }else{ ?>
                        <div class="wl-instagram-image wl-common-marginbottom <?php echo ($w_studio_counter%3==2)?'wl-margin-both':'' ?> ">
                            <a href="<?php echo esc_url( $w_studio_item['link'] ); ?>">
                                <img src="<?php echo esc_url( $w_studio_item[$w_studio_image_size] ); ?>" alt="<?php echo esc_attr( $w_studio_item['description'] ); ?>">
                            </a>
                        </div>
                    <?php
                    }
                    $w_studio_counter++;
                }
                ?>
                </div>
                </div>
                <?php
            }
        }

        $linkclass = apply_filters( 'wpiw_link_class', 'clear' );

        do_action( 'wpiw_after_widget', $w_studio_instance );

        echo $w_studio_args['after_widget'];
    }

    function form( $w_studio_instance ) {
        $w_studio_instance   = wp_parse_args( (array) $w_studio_instance, array( 'title' => esc_html__( 'Instagram', 'w-studio-plugin' ), 'username' => '', 'size' => 'large', 'link' => esc_html__( 'Follow Me!', 'w-studio-plugin' ), 'number' => 9, 'target' => '_self' ) );
        $w_studio_title      = $w_studio_instance['title'];
        $username   = $w_studio_instance['username'];
        $number     = absint( $w_studio_instance['number'] );
        $w_studio_image_size       = $w_studio_instance['size'];
        ?>
        <p><label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php esc_html_e( 'Title', 'w-studio-plugin' ); ?>: <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php echo esc_attr( $w_studio_title ); ?>" /></label></p>
        <p><label for="<?php echo esc_attr( $this->get_field_id( 'username' ) ); ?>"><?php esc_html_e( 'Username', 'w-studio-plugin' ); ?>: <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'username' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'username' ) ); ?>" type="text" value="<?php echo esc_attr( $username ); ?>" /></label></p>
        <p><label for="<?php echo esc_attr( $this->get_field_id( 'number' ) ); ?>"><?php esc_html_e( 'Number of photos', 'w-studio-plugin' ); ?>: <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'number' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'number' ) ); ?>" type="text" value="<?php echo esc_attr( $number ); ?>" /></label></p>
        <p><label for="<?php echo esc_attr( $this->get_field_id( 'size' ) ); ?>"><?php esc_html_e( 'Photo size', 'w-studio-plugin' ); ?>:</label>
            <select id="<?php echo esc_attr( $this->get_field_id( 'size' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'size' ) ); ?>" class="widefat">
                <option value="thumbnail" <?php selected( 'thumbnail', $w_studio_image_size ) ?>><?php esc_html_e( 'Thumbnail', 'w-studio-plugin' ); ?></option>
            </select>
        </p>
        <?php
    }

    // based on https://gist.github.com/cosmocatalano/4544576
    function scrape_instagram( $username, $slice = 9 ) {

        $username = strtolower( $username );
        $username = str_replace( '@', '', $username );

        if( false === ( $w_studio_countsnstagram = get_transient( 'instagram-a4-'.sanitize_title_with_dashes( $username ) ) ) ) {

            $remote = wp_remote_get( 'http://instagram.com/'.trim( $username ) );

            if( is_wp_error( $remote ) )
                return new WP_Error( 'site_down', esc_html__( 'Unable to communicate with Instagram.', 'w-studio-plugin' ) );

            if( 200 != wp_remote_retrieve_response_code( $remote ) )
                return new WP_Error( 'invalid_response', esc_html__( 'Instagram did not return a 200.', 'w-studio-plugin' ) );

            $shards = explode( 'window._sharedData = ', $remote['body'] );
            $w_studio_countsnsta_json = explode( ';</script>', $shards[1] );
            $w_studio_countsnsta_array = json_decode( $w_studio_countsnsta_json[0], TRUE );

            if( ! $w_studio_countsnsta_array )
                return new WP_Error( 'bad_json', esc_html__( 'Instagram has returned invalid data.', 'w-studio-plugin' ) );

            if( isset( $w_studio_countsnsta_array['entry_data']['ProfilePage'][0]['user']['media']['nodes'] ) ) {
                $w_studio_images = $w_studio_countsnsta_array['entry_data']['ProfilePage'][0]['user']['media']['nodes'];
            }else{
                return new WP_Error( 'bad_json_2', esc_html__( 'Instagram has returned invalid data.', 'w-studio-plugin' ) );
            }

            if( ! is_array( $w_studio_images ) )
                return new WP_Error( 'bad_array', esc_html__( 'Instagram has returned invalid data.', 'w-studio-plugin' ) );

            $w_studio_countsnstagram = array();

            foreach( $w_studio_images as $w_studio_image ){

                $w_studio_image['thumbnail_src'] = preg_replace( '/^https?\:/i', '', $w_studio_image['thumbnail_src'] );
                $w_studio_image['display_src'] = preg_replace( '/^https?\:/i', '', $w_studio_image['display_src'] );

                // handle both types of CDN url
                if( ( strpos( $w_studio_image['thumbnail_src'], 's640x640' ) !== false ) ) {
                    $w_studio_image['thumbnail'] = str_replace( 's640x640', 's160x160', $w_studio_image['thumbnail_src'] );
                    $w_studio_image['small'] = str_replace( 's640x640', 's320x320', $w_studio_image['thumbnail_src'] );
                }else{
                    $urlparts = wp_parse_url( $w_studio_image['thumbnail_src'] );
                    $pathparts = explode( '/', $urlparts['path'] );
                    array_splice( $pathparts, 3, 0, array( 's160x160' ) );
                    $w_studio_image['thumbnail'] = '//' . $urlparts['host'] . implode('/', $pathparts);
                    $pathparts[3] = 's320x320';
                    $w_studio_image['small'] = '//' . $urlparts['host'] . implode('/', $pathparts);
                }

                $w_studio_image['large'] = $w_studio_image['thumbnail_src'];

                if( $w_studio_image['is_video'] == true ){
                    $type = 'video';
                }else{
                    $type = 'image';
                }

                $caption = esc_html__( 'Instagram Image', 'w-studio-plugin' );
                if( ! empty( $w_studio_image['caption'] ) ){
                    $caption = $w_studio_image['caption'];
                }

                $w_studio_countsnstagram[] = array(
                    'description'   => $caption,
                    'link'		  	=> trailingslashit( '//instagram.com/p/' . $w_studio_image['code'] ),
                    'time'		  	=> $w_studio_image['date'],
                    'comments'                  => $w_studio_image['comments']['count'],
                    'likes'		 	=> $w_studio_image['likes']['count'],
                    'thumbnail'                 => $w_studio_image['thumbnail'],
                    'type'		  	=> $type
                );
            }

            // do not set an empty transient - should help catch private or empty accounts
            if( ! empty( $w_studio_countsnstagram ) ){
                $w_studio_countsnstagram = base64_encode( serialize( $w_studio_countsnstagram ) );
                set_transient( 'instagram-a4-'.sanitize_title_with_dashes( $username ), $w_studio_countsnstagram, apply_filters( 'w_instagram_cache_time', HOUR_IN_SECONDS*2 ) );
            }
        }

        if( ! empty( $w_studio_countsnstagram ) ){

            $w_studio_countsnstagram = unserialize( base64_decode( $w_studio_countsnstagram ) );
            return array_slice( $w_studio_countsnstagram, 0, $slice );
        }else{
            return new WP_Error( 'no_images', esc_html__( 'Instagram did not return any images.', 'w-studio-plugin' ) );
        }
    }
}

function loadWidgetInstagram_register() {
	
    unregister_widget( 'WP_Widget' );
    register_widget( 'loadWidgetInstagram' );
}

add_action( 'widgets_init', 'loadWidgetInstagram_register' );