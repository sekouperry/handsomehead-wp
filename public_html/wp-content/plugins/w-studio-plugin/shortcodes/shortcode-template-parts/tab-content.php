<?php
/**
 * Tab Shortcode
 */
extract( shortcode_atts( array(
    'tab_value' => '' ,
    'tab_title_icon' => '',
    'title_color' => '' ,
    'icon_color' => '' ,
    'border_color' => '' ,
    'active_border_color' => '' ,
    'content_color' => '' ,
    'tab_content' => '',
    'title_font_size' => '' ,
) , $atts ) );

$value = vc_param_group_parse_atts( $tab_value );

 if( !function_exists( 'w_studio_random_number' ) ) {
        function w_studio_random_number() {
            $class_name = 'wl-';

            for( $i = 0 ; $i < 5 ; $i++ ) {
                $class_name .= mt_rand( 0 , 9999 );
            }
            return $class_name;
        }
    }
    $className = w_studio_random_number();
    $className2 = w_studio_random_number();

    $w_studio_custom_inline_style = '';
    $w_studio_custom_inline_style .= '.' . $className . ' li a, .tab-menu .active a, .tab-menu .active a:hover  { color: ' . $title_color . '; font-size:'.$title_font_size.'px!important;}';
    $w_studio_custom_inline_style .= '.'.$className.' .tab-icon{ color:'.$icon_color.'}';
    if($border_color !== ''){
         $w_studio_custom_inline_style .= '.'.$className.'.tab-menu> li { border-bottom: 1px solid '.$border_color.';}';
    }
   if($active_border_color !== ''){
      $w_studio_custom_inline_style .= '.'.$className.'.tab-menu> li.active { border-color:'.$active_border_color.';}';
   }
  

    $w_studio_custom_inline_style .= '.'.$className2.'{ color:'.$content_color.';}';
  

    wp_add_inline_style( 'w_studio_inline-style', $w_studio_custom_inline_style );
?>

    <div class="single-tab tab-1">
        <ul class="tab-menu <?php echo $className; ?>" role="tablist">
            <?php $count = 0;
            foreach( $value as $title ) : ?>
                <li role="presentation" class="<?php echo ( $count == 0 ) ? 'active' : ''; ?>">

                    <a href="#tab-<?php echo $count; ?>" aria-controls="tab-<?php echo $count; ?>" role="tab" data-toggle="tab"> 
                    <i class="tab-icon <?php echo $title['tab_title_icon']; ?>"></i><?php echo $title[ 'tab_title' ]; ?></a>
                </li>
                <?php $count++; endforeach; ?>
        </ul>
        <div class="tab-content <?php echo $className2; ?>">
            <?php $count = 0;
            foreach( $value as $content ) : ?>
                <div role="tabpanel" class="tab-pane fade in <?php echo ( $count == 0 ) ? 'active' : ''; ?>" id="tab-<?php echo $count; ?>">
                    <p><?php echo $content[ 'tab_content' ]; ?></p>
                </div>
                <?php $count++; endforeach; ?>
        </div>
    </div>