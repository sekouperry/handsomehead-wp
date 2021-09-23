<?php
/*
  Plugin Name: Twitter Tweets Widget
  Plugin URI: http://code.tutsplus.com
  Description: Displays latest tweets from Twitter.
  Author: Agbonghama Collins
  Author URI: http://tech4sky.com
 */

class W_studio_social_widget extends WP_Widget {
    function __construct() {
        parent::__construct(
            'W_studio_social_widget',
            esc_html__( 'Social Icons Widget', 'w-studio-plugin' ),
            array(
                'classname' => 'W_studio_social_widget',
                'description' => esc_html__( 'Displays Social Icons.', 'w-studio-plugin' ),
                'customize_selective_refresh' => true
            )
        );
    }

    //display social icons
    public function widget( $w_studio_args, $w_studio_instance ) {

        $config['align']       	  = $w_studio_instance['align'];
        $config['font_size']      = isset( $w_studio_instance['font_size'] ) ? $w_studio_instance['font_size'] : '';
        $config['color']       	  = isset( $w_studio_instance['color'] ) ? $w_studio_instance['color'] : '';

        $config['facebook']       = $w_studio_instance['facebook'];
        $config['flickr']         = $w_studio_instance['flickr'];
        $config['rss']            = $w_studio_instance['rss'];
        $config['twitter']        = $w_studio_instance['twitter'];
        $config['vimeo']          = $w_studio_instance['vimeo'];
        $config['youtube']        = $w_studio_instance['youtube'];
        $config['instagram']      = $w_studio_instance['instagram'];
        $config['pinterest']      = $w_studio_instance['pinterest'];
        $config['tumblr']         = $w_studio_instance['tumblr'];      
        $config['google']         = $w_studio_instance['google'];
        $config['dribbble']       = $w_studio_instance['dribbble'];
        $config['linkedin']       = $w_studio_instance['linkedin'];       
        $config['skype']          = $w_studio_instance['skype'];
        $config['deviantart']     = $w_studio_instance['deviantart'];    
        $config['blogger']        = $w_studio_instance['blogger'];
        $config['picassa']        = $w_studio_instance['picassa'];    
        $config['myspace']        = $w_studio_instance['myspace'];
        $config['tumbleupon']     = $w_studio_instance['tumbleupon'];
        $config['googledrive']    = $w_studio_instance['googledrive'];       
        $config['delicious']      = $w_studio_instance['delicious'];
        extract($config);
        if ($align == '') {
            $align = 'center';
        } 
        echo $w_studio_args['before_widget']; ?>

        <style type="text/css">
            .wl-social-icons ul li a span {
                font-size: <?php echo $font_size; ?>px;
            }
            .wl-social-icons ul li a span {
                color: <?php echo $color; ?>;
            }
        </style>

        <div class="wl-social-icons <?php echo 'text-'.$align; ?>">
            <ul>
                <?php
                echo (!empty($facebook)) ? '<li><a href="'.$facebook.'"><span data-icon="&#xe093;"></span></a></li>' : '';
                echo (!empty($flickr)) ? '<li><a href="'.$flickr.'"><span data-icon="&#xe0a6;"></span></a></li>' : '';
                echo (!empty($rss)) ? '<li><a href="'.$rss.'"><span data-icon="&#xe09e;"></span></a></li>' : '';
                echo (!empty($twitter)) ? '<li><a href="'.$twitter.'"><span data-icon="&#xe094;"></span></a></li>' : '';
                echo (!empty($vimeo)) ? '<li><a href="'.$vimeo.'"><span data-icon="&#xe09c;"></span></a></li>' : '';
                echo (!empty($youtube)) ? '<li><a href="'.$youtube.'"><span data-icon="&#xe0a3;"></span></a></li>' : '';
                echo (!empty($instagram)) ? '<li><a href="'.$instagram.'"><span data-icon="&#xe09a;"></span></a></li>' : '';
                echo (!empty($pinterest)) ? '<li><a href="'.$pinterest.'"><span data-icon="&#xe095;"></span></a></li>' : '';
                echo (!empty($tumblr)) ? '<li><a href="'.$tumblr.'"><span data-icon="&#xe097;"></span></a></li>' : '';
                echo (!empty($google)) ? '<li><a href="'.$google.'"><span data-icon="&#xe096;"></span></a></li>' : '';
                echo (!empty($dribbble)) ? '<li><a href="'.$dribbble.'"><span data-icon="&#xe09b;"></span></a></li>' : '';
                echo (!empty($linkedin)) ? '<li><a href="'.$linkedin.'"><span data-icon="&#xe09d;"></span></a></li>' : '';
                echo (!empty($skype)) ? '<li><a href="'.$skype.'"><span data-icon="&#xe0a2;"></span></a></li>' : '';
                echo (!empty($deviantart)) ? '<li><a href="'.$deviantart.'"><span data-icon="&#xe09f;"></span></a></li>' : ''; 
                echo (!empty($blogger)) ? '<li><a href="'.$blogger.'"><span data-icon="&#xe0a7;"></span></a></li>' : '';
                echo (!empty($picassa)) ? '<li><a href="'.$picassa.'"><span data-icon="&#xe0a4;"></span></a></li>' : '';
                echo (!empty($myspace)) ? '<li><a href="'.$myspace.'"><span data-icon="&#xe0a1;"></span></a></li>' : '';
                echo (!empty($tumbleupon)) ? '<li><a href="'.$tumbleupon.'"><span data-icon="&#xe098;"></span></a></li>' : '';
                echo (!empty($googledrive)) ? '<li><a href="'.$googledrive.'"><span data-icon="&#xe0a5;"></span></a></li>' : '';
                echo (!empty($delicious)) ? '<li><a href="'.$delicious.'"><span data-icon="&#xe0a9;"></span></a></li>' : '';
                ?>
            </ul>
        </div>
        
        <?php
        echo $w_studio_args['after_widget'];
    }



    // widget form
    public function form($w_studio_instance) {

        $blank_array['blank']           = '';
        $social_array['align']          = '';
        $social_array['font_size']      = '';
        $social_array['color']          = '';

        $social_array['facebook']       = '';
        $social_array['flickr']         = '';
        $social_array['rss']            = '';
        $social_array['twitter']        = '';
        $social_array['vimeo']          = '';
        $social_array['youtube']        = '';
        $social_array['instagram']      = '';
        $social_array['pinterest']      = '';
        $social_array['tumblr']         = '';        
        $social_array['google']         = '';
        $social_array['dribbble']       = '';
        $social_array['linkedin']       = '';        
        $social_array['skype']          = '';
        $social_array['deviantart']     = '';    
        $social_array['blogger']        = '';
        $social_array['picassa']        = '';    
        $social_array['myspace']        = '';
        $social_array['tumbleupon']     = '';
        $social_array['googledrive']    = '';        
        $social_array['delicious']      = '';

        $final_array = array_merge($social_array,$w_studio_instance);
        ?>
        <input type="hidden" id="blank-for-serial" name="<?php echo esc_attr($this->get_field_name( 'blank' )); ?>" value="<?php echo esc_attr($this->get_field_name( 'blank' )); ?>">

        <div class="social-widget-wraper">
            <p>
                <label for="<?php echo esc_attr($this->get_field_id( 'align' )); ?>">
                    <?php echo esc_attr('Social Icons Position', 'w-studio-plugin'); ?>
                </label>
                <select class="widefat" id="<?php echo esc_attr($this->get_field_id( 'align' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'align' )); ?>" type="text" value="<?php echo esc_attr( $name ); ?>">
                    <option value="left" <?php selected($final_array['align'], 'left', true); ?>>Align Left</option>
                    <option value="center" <?php selected($final_array['align'], 'center', true); ?>>Align Center</option>
                    <option value="right" <?php selected($final_array['align'], 'right', true); ?>>Align Right</option>
                </select>
            </p>
            <p>
                <label for="<?php echo esc_attr($this->get_field_id( 'font_size' )); ?>">
                    <?php echo esc_attr('Social Icons Font Size', 'w-studio-plugin'); ?>
                </label>
                <input class="widefat" id="<?php echo esc_attr($this->get_field_id( 'font_size' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'font_size' )); ?>" type="text" value="<?php echo esc_attr( $final_array['font_size'] ); ?>">
            </p>
            <p>
                <label for="<?php echo esc_attr($this->get_field_id( 'color' )); ?>">
                    <?php echo esc_attr('Social Icons Color', 'w-studio-plugin'); ?>
                </label>
                <div class="widefat">
                    <input class="w-color-field" id="<?php echo esc_attr($this->get_field_id( 'color' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'color' )); ?>" type="text" value="<?php echo esc_attr( $final_array['color'] ); ?>">
                </div>
            </p>
            <p>
                <label for="select-social">
                    <?php echo esc_html__( 'Select Social Media', 'w-studio-plugin' ) . ':'; ?>
                </label>
                <select class="widefat select-social" id="select-social" name="select-social">
                    <option>Select Options</option>
                    <?php foreach( $final_array as $key=>$name ) : ?>
                        <?php if($name == '' && $key != 'align' && $key != 'font_size' && $key != 'color') { ?>
                        <option data-icon="<?php echo $name; ?>"><?php echo $key; ?></option>
                        <?php } ?>
                    <?php endforeach; ?>
                </select>
            </p>
            <?php foreach( $final_array as $key=>$name ) : 
                if($name != '' && $key != 'align' && $key != 'font_size' && $key != 'color') {
            ?>
                <p>
                    <label for="<?php echo esc_attr($this->get_field_id( $key )); ?>">
                        <?php echo $key. ' url:'; ?>
                    </label>
                    <input class="widefat" id="<?php echo esc_attr($this->get_field_id( $key )); ?>" name="<?php echo esc_attr($this->get_field_name( $key )); ?>" type="text" value="<?php echo esc_attr( $name ); ?>" />
                </p>
                <?php } ?>
            <?php endforeach; ?>
        </div>
        <script type="text/javascript">

            jQuery( document ).ready( function(){
                // Adding Color Picker
                jQuery( '.w-color-field' ).wpColorPicker();
            });
            
            jQuery('select.select-social').on('change', function() {
                var serial = jQuery(this).parent('p').parent('.social-widget-wraper').parent('.widget-content').find('#blank-for-serial').attr('name').match(/\d+/);
                var selectedOption = jQuery('option:selected', this);
                var valueSelected = this.value;
                var inputContent = '<p><label for="'+valueSelected+'">'+valueSelected+' url</label><input class="widefat" id="widget-w_studio_social_widget-'+serial+'-'+valueSelected+'" name="widget-w_studio_social_widget['+serial+']['+valueSelected+']" type="text" value="" /></p>';
                jQuery(inputContent).appendTo('.social-widget-wraper');
                selectedOption.remove();
            });
        </script>
    <?php
    }

    //update social form
    public function update( $w_studio_new_instance, $w_studio_old_instance ) {
        $w_studio_instance = $w_studio_old_instance; 

        $w_studio_instance['align']  = ( ! empty( $w_studio_new_instance['align'] ) ) ? strip_tags( $w_studio_new_instance['align'] ) : 'center';

        $w_studio_instance['font_size']  = ( ! empty( $w_studio_new_instance['font_size'] ) ) ? strip_tags( $w_studio_new_instance['font_size'] ) : '';

        $w_studio_instance['color']  = ( ! empty( $w_studio_new_instance['color'] ) ) ? strip_tags( $w_studio_new_instance['color'] ) : '';

        $w_studio_instance['facebook']  = ( ! empty( $w_studio_new_instance['facebook'] ) ) ? strip_tags( $w_studio_new_instance['facebook'] ) : '';
        $w_studio_instance['flickr']    = ( ! empty( $w_studio_new_instance['flickr'] ) ) ? strip_tags( $w_studio_new_instance['flickr'] ) : '';
        $w_studio_instance['rss']       = ( ! empty( $w_studio_new_instance['rss'] ) ) ? strip_tags( $w_studio_new_instance['rss'] ) : '';
        $w_studio_instance['twitter']   = ( ! empty( $w_studio_new_instance['twitter'] ) ) ? strip_tags( $w_studio_new_instance['twitter'] ) : '';
        $w_studio_instance['vimeo']     = ( ! empty( $w_studio_new_instance['vimeo'] ) ) ? strip_tags( $w_studio_new_instance['vimeo'] ) : '';
        $w_studio_instance['youtube']   = ( ! empty( $w_studio_new_instance['youtube'] ) ) ? strip_tags( $w_studio_new_instance['youtube'] ) : '';
        $w_studio_instance['instagram'] = ( ! empty( $w_studio_new_instance['instagram'] ) ) ? strip_tags( $w_studio_new_instance['instagram'] ) : '';
        $w_studio_instance['pinterest']  = ( ! empty( $w_studio_new_instance['pinterest'] ) ) ? strip_tags( $w_studio_new_instance['pinterest'] ) : '';
        $w_studio_instance['tumblr']    = ( ! empty( $w_studio_new_instance['tumblr'] ) ) ? strip_tags( $w_studio_new_instance['tumblr'] ) : '';
        $w_studio_instance['google']       = ( ! empty( $w_studio_new_instance['google'] ) ) ? strip_tags( $w_studio_new_instance['google'] ) : '';
        $w_studio_instance['dribbble']   = ( ! empty( $w_studio_new_instance['dribbble'] ) ) ? strip_tags( $w_studio_new_instance['dribbble'] ) : '';
        $w_studio_instance['linkedin']   = ( ! empty( $w_studio_new_instance['linkedin'] ) ) ? strip_tags( $w_studio_new_instance['linkedin'] ) : '';
        $w_studio_instance['skype'] = ( ! empty( $w_studio_new_instance['skype'] ) ) ? strip_tags( $w_studio_new_instance['skype'] ) : '';
        $w_studio_instance['deviantart']  = ( ! empty( $w_studio_new_instance['deviantart'] ) ) ? strip_tags( $w_studio_new_instance['deviantart'] ) : '';
        $w_studio_instance['blogger']    = ( ! empty( $w_studio_new_instance['blogger'] ) ) ? strip_tags( $w_studio_new_instance['blogger'] ) : '';
        $w_studio_instance['picassa']       = ( ! empty( $w_studio_new_instance['picassa'] ) ) ? strip_tags( $w_studio_new_instance['picassa'] ) : '';
        $w_studio_instance['myspace']   = ( ! empty( $w_studio_new_instance['myspace'] ) ) ? strip_tags( $w_studio_new_instance['myspace'] ) : '';
        $w_studio_instance['tumbleupon']     = ( ! empty( $w_studio_new_instance['tumbleupon'] ) ) ? strip_tags( $w_studio_new_instance['tumbleupon'] ) : '';
        $w_studio_instance['googledrive']   = ( ! empty( $w_studio_new_instance['googledrive'] ) ) ? strip_tags( $w_studio_new_instance['googledrive'] ) : '';
        $w_studio_instance['delicious'] = ( ! empty( $w_studio_new_instance['delicious'] ) ) ? strip_tags( $w_studio_new_instance['delicious'] ) : '';
        return $w_studio_instance;
    }
}

function social_widget() {

    unregister_widget('WP_Widget');
    register_widget('W_studio_social_widget');
}
add_action('widgets_init', 'social_widget');