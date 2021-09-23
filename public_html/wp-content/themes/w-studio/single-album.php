<?php
get_header();
$w_studio_optionValues = get_option( 'w_studio' );
$w_studio_metaData  = get_post_meta( $post->ID, '', false );
$w_studio_custom_inline_style = '';
if(has_post_thumbnail()) {
    $w_studio_banner_bg = get_the_post_thumbnail_url();
} else {
    $w_studio_banner_bg = isset($w_studio_optionValues['w-galler-banner']) ? $w_studio_optionValues['w-galler-banner']['url'] : '';
}
$w_studio_banner_height = isset($w_studio_optionValues['w-gallery-banner-height']) ? $w_studio_optionValues['w-gallery-banner-height'] : '500';
$w_studio_banner_position = isset($w_studio_optionValues['w-gallery-banner-position']) ? $w_studio_optionValues['w-gallery-banner-position'] : 'contain';
$w_studio_banner_color = isset($w_studio_optionValues['w-gallery-banner-background-color']) ? $w_studio_optionValues['w-gallery-banner-background-color'] : '#f0f0f1';
$w_studio_banner_overlay = isset($w_studio_optionValues['w-gallery-banner-overlay-color']) ? $w_studio_optionValues['w-gallery-banner-overlay-color'] : '#000000';
$w_studio_banner_opacity = isset($w_studio_optionValues['w-gallery-banner-opacity']) ? $w_studio_optionValues['w-gallery-banner-opacity'] : '0.7';
list( $r , $g , $b ) = sscanf( $w_studio_banner_overlay , "#%02x%02x%02x" );
if(isset($w_studio_optionValues['w-gallery-banner-enable']) && $w_studio_optionValues['w-gallery-banner-enable']) {
    if($w_studio_optionValues['w-gallery-background-selection'] == 'bg-image' && $w_studio_banner_bg != '' ) {
        $w_studio_custom_inline_style .= '.single .wl-home-style2.wl-blog-bg1 {background-image: url('.$w_studio_banner_bg.'); background-size: '.$w_studio_banner_position.'; height: '.$w_studio_banner_height.'px;}';
        $w_studio_custom_inline_style .= '.single .wl-home-style2 .wl-overlay1 {background-color: rgba( ' . $r . ', ' . $g . ', ' . $b . ', ' . $w_studio_banner_opacity . ' );}';
    } else {
        $w_studio_custom_inline_style .= '.single .wl-home-style2.wl-blog-bg1 {background-color: '.$w_studio_banner_color.'; height: '.$w_studio_banner_height.'px; }';
		$w_studio_custom_inline_style .= '.single .wl-home-style2 .wl-overlay1 {background-color: inherit;}';
	}
}

wp_add_inline_style( 'w_studio_inline-style' , $w_studio_custom_inline_style ); ?>
    <section>
        <?php
        $w_studio_portfolioStyle = esc_attr( get_post_meta( $post->ID , 'w-single-portfolio-style' , true ) ); 
        if(isset($w_studio_optionValues['w-gallery-banner-enable']) && $w_studio_optionValues['w-gallery-banner-enable']) {
            ?>
            <div class="wl-gallery-banner">
                <?php get_template_part( 'base/views/template-parts/single-blog-banner' ); ?>
            </div>
            <?php
        }
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
        <div class="wl-main-content">
            <div class="container">
                <?php
                while( have_posts() ) : the_post(); 
                $w_studio_images = unserialize( $w_studio_metaData['w-album-images'][0] );
                ?>

                    <div class="wl-gallery-inner <?php echo esc_attr($w_studio_galery_class).' '.esc_attr($w_studio_space); ?>">
                        <ul>
                            <?php foreach ($w_studio_images as $w_studio_image) { 
                                
                                $w_studio_image_prop = wp_get_attachment($w_studio_image);

                                $url = wp_get_attachment_image_src( $w_studio_image, $w_studio_image_size );
                                $url1 = wp_get_attachment_image_src( $w_studio_image, 'large' );
                                ?>
                                <li>
                                    <a href="<?php echo esc_url($url1[0]); ?>" title="<?php if( isset( $w_studio_optionValues[ 'w-gallery-image-title-enable' ] ) && $w_studio_optionValues[ 'w-gallery-image-title-enable' ] != '0' ) { echo esc_attr($w_studio_image_prop['title'] ); } ?>" rel="prettyPhoto[gallery1]"><img src="<?php echo esc_url($url[0]); ?>" alt="<?php echo esc_attr($w_studio_image_prop['alt']); ?>" /></a>
                                </li>
                            <?php } ?>
                        </ul>
                    </div>
                    <?php
					if( isset( $w_studio_optionValues[ 'w-gallery-nav-enable' ] ) && $w_studio_optionValues[ 'w-gallery-nav-enable' ] != '0' ) {
                    // Previous/next post navigation.
						the_post_navigation( array( 'next_text' => '<span class="meta-nav" aria-hidden="true">' . esc_html__( '' , 'w-studio' ) . '</span> ' . '<span class="screen-reader-text">' . esc_html__( 'Next' , 'w-studio' ) . '</span> ' . '<span class="post-title next-prev-icon" data-icon="&#x24;"></span>' , 'prev_text' => '<span class="meta-nav" aria-hidden="true">' . esc_html__( '' , 'w-studio' ) . '</span> ' . '<span class="post-title next-prev-icon" data-icon="&#x23;"></span>' . '<span class="screen-reader-text">' . esc_html__( 'Previous' , 'w-studio' ) . '</span> ' , ) );
					}
                endwhile;
                ?>
            </div>
        </div>
    </section>
<?php get_footer();