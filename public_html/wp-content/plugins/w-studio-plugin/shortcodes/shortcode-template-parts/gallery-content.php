<?php
/**
 * Gallery shortcode
 */
extract( shortcode_atts( array( 
    'album_select' => '',
    ) , $atts ) 
);

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

$w_studio_custom_inline_style = '';
$w_studio_custom_inline_style .= '.'.$className.'.wl-gallery-inner {margin-bottom: 0;}';
wp_add_inline_style( 'w_studio_inline-style', $w_studio_custom_inline_style );

$args = array(
    'post_type' => 'album' ,
    'posts_per_page' => 1 ,
    'taxonomy' => 'album-category' ,
    'name' => $album_select
);

$query = new WP_Query( $args ); 
?>
<?php if($query->have_posts()) : 
    while( $query->have_posts() ) : $query->the_post();
    global $post;

    $w_studio_metaData  = get_post_meta( $post->ID, '', false );
    $w_studio_images = unserialize( $w_studio_metaData['w-album-images'][0] );

    if($w_studio_metaData['w-single-album-style'][0] == '1') {
        $w_studio_image_size = 'w_studio_image_585x520';
        $w_studio_galery_class = 'style-4';
    } else if($w_studio_metaData['w-single-album-style'][0] == '2') {
        $w_studio_image_size = 'w_studio_image_390x345';
        $w_studio_galery_class = 'style-2';
    } else if($w_studio_metaData['w-single-album-style'][0] == '3') {
        $w_studio_image_size = 'w_studio_image_295x260';
        $w_studio_galery_class = 'style-1';
    } else {
        $w_studio_image_size = 'w_studio_image_147x130';
        $w_studio_galery_class = 'style-3';
    }

    $w_studio_space = '';
    if($w_studio_metaData['w-single-album-space'][0] == 'no-space') {
        $w_studio_space = 'wl-gallery-inner-2';
    }
    function wp_get_attachment( $w_studio_image ) {

        $attachment = get_post( $w_studio_image );
        return array(
            'alt' => get_post_meta( $attachment->ID, '_wp_attachment_image_alt', true ),
            'caption' => $attachment->post_excerpt,
            'description' => $attachment->post_content,
            'href' => get_permalink( $attachment->ID ),
            'src' => $attachment->guid,
            'title' => $attachment->post_title
        );
    };
?>

<div class="wl-gallery-inner <?php echo esc_attr($w_studio_galery_class).' '.esc_attr($w_studio_space).' '.$className; ?>">
    <ul>
        <?php foreach ($w_studio_images as $w_studio_image) { 

            $w_studio_image_prop = wp_get_attachment($w_studio_image);

            $url = wp_get_attachment_image_src( $w_studio_image, $w_studio_image_size );
            $url1 = wp_get_attachment_image_src( $w_studio_image, 'large' );
            ?>
            <li>
                <a href="<?php echo esc_url($url1[0]); ?>" title="<?php echo esc_attr($w_studio_image_prop['title']); ?>" rel="prettyPhoto[gallery1]"><img src="<?php echo esc_url($url[0]); ?>" alt="<?php echo esc_attr($w_studio_image_prop['alt']); ?>" /></a>
            </li>
        <?php } ?>
    </ul>
</div>



<?php endwhile;
endif; ?>