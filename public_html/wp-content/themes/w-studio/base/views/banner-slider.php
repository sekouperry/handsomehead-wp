<?php 
	global $wp_query;

	$term = esc_attr( get_post_meta( $wp_query->post->ID, 'w-slider-category', true ) );
	$args = array(
		'post_type' => 'slider',
		'posts_per_page'	=> -1,
		'tax_query' => array(
			array(
				'taxonomy' => 'slider-category',
				'field'    => 'slug',
				'terms'    => $term,
			),
		),
	);
	$slider = new WP_Query( $args );
	
	if( $slider->have_posts() ) {
		
	if( !function_exists( 'w_studio_random_number' ) ) {
        function w_studio_random_number() {
            $class_name = 'wl-';

            for( $i = 0 ; $i < 5 ; $i++ ) {
                $class_name .= mt_rand( 0 , 9999 );
            }
            return $class_name;
        }
    }
	
	$w_studio_sliderHeight = esc_attr( get_post_meta( $wp_query->post->ID, 'w-slider-height', true ) );
	$w_studio_sliderWidth = esc_attr( get_post_meta( $wp_query->post->ID, 'w-slider-width', true ) );
		
	//enqueue inline style css
	wp_enqueue_style( 'w_studio_inline-style', get_template_directory_uri() . '/assets/css/inline-style.css' );
	$w_studio_custom_inline_style = '';
	
	$w_studio_custom_inline_style .= '.wl-header {  position: inherit ; }';
	$w_studio_custom_inline_style .= '.slides li {  height:' . $w_studio_sliderHeight .'px; }';

?>
<section class="slider <?php if( $w_studio_sliderWidth == 'container' ) { echo 'container'; } ?>">
	<div class="flexslider">
		<ul class="slides">
			<?php 
				while( $slider->have_posts() ) : $slider->the_post(); 
				
				$wl_overlay = w_studio_random_number();
				
				//slider overlay
				$w_studio_slider_overlayColor = esc_attr( get_post_meta( get_the_ID(), 'w-slider-background-overlay-color', true ) );
				$w_studio_slider_opacity =  esc_attr( get_post_meta( get_the_ID(), 'w-slider-background-opacity', true ) );
				
				//slider title
				$w_studio_slider_titleFontSize =  esc_attr( get_post_meta( get_the_ID(), 'w-slider-title-font-size', true ) );
				$w_studio_slider_titleLineHeight =  esc_attr( get_post_meta( get_the_ID(), 'w-slider-title-line-height', true ) );
				$w_studio_slider_titleColor =  esc_attr( get_post_meta( get_the_ID(), 'w-slider-title-font-color', true ) );
				
				//slider content
				$w_studio_slider_contentFontSize =  esc_attr( get_post_meta( get_the_ID(), 'w-slider-content-font-size', true ) );
				$w_studio_slider_contentLineHeight =  esc_attr( get_post_meta( get_the_ID(), 'w-slider-content-line-height', true ) );
				$w_studio_slider_contentColor =  esc_attr( get_post_meta( get_the_ID(), 'w-slider-content-font-color', true ) );
				
				//content alignment
				$w_studio_slider_contentAlignVer =  esc_attr( get_post_meta( get_the_ID(), 'w-slider-content-alignment', true ) );
				$w_studio_slider_contentAlignHori =  esc_attr( get_post_meta( get_the_ID(), 'w-slider-content-hori-alignment', true ) );
				
				list( $r , $g , $b ) = sscanf( $w_studio_slider_overlayColor , "#%02x%02x%02x" );
				$w_studio_custom_inline_style .= '.'. $wl_overlay .'{ background-color: rgba( ' . $r . ', ' . $g . ', ' . $b . ', ' . $w_studio_slider_opacity . ' ); }';
				
				$w_studio_custom_inline_style .= '.' . $wl_overlay . ' h1 {  font-size:' . $w_studio_slider_titleFontSize . 'px ; line-height:' . $w_studio_slider_titleLineHeight . 'px; color:' . $w_studio_slider_titleColor . '; }';
				
				$w_studio_custom_inline_style .= '.' . $wl_overlay . ' p, .' . $wl_overlay . ' p a {  font-size:' . $w_studio_slider_contentFontSize . 'px ; line-height:' . $w_studio_slider_contentLineHeight . 'px; color:' . $w_studio_slider_contentColor . '; }';
				
				$w_studio_custom_inline_style .= '.' . $wl_overlay . ' .wl-middle-content {  text-align:' . $w_studio_slider_contentAlignVer .'; vertical-align:' . $w_studio_slider_contentAlignHori .'; }';
				
				wp_add_inline_style( 'w_studio_inline-style', $w_studio_custom_inline_style );
			?>
			<li>
			<?php 
				$w_studio_imageSize = '';
				if( $w_studio_sliderWidth == 'container' ) {
					$w_studio_imageSize = 'w_studio_image_1170x570';
				} else {
					$w_studio_imageSize = 'large';
				}
				if(!has_post_thumbnail() ) {
					$w_studio_custom_inline_style .= '.'. $wl_overlay .' .wl-display-table { background:' . $w_studio_slider_overlayColor .' ; }';
				} else {
					the_post_thumbnail( $w_studio_imageSize );
				}
			?>
			<div class="wl-slider-overlay <?php echo esc_attr( $wl_overlay ); ?>">
				<div class="wl-display-table">
					<div class="wl-middle-content">
						<div class="container">
							<h1><?php the_title(); ?></h1>
							<div class="wl-slider-content"><?php the_content(); ?></div>
						</div>
					</div>
				</div>
			</div>
			</li>
			<?php endwhile; wp_reset_postdata(); ?>
		</ul>
	</div>
</section>
<?php } ?>