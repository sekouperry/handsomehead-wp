<?php
/**
 * Clients shortcode
 */
extract( shortcode_atts( array( 
    'client_style' => '', 
    'number_of_posts' => '', 
    'number_of_posts_in_row' => '', 
    'order_by' => 'ASC',
    'height' => '' ) , $atts ) 
);

global $post;

if( $number_of_posts != '' ) {
    $post_number = $number_of_posts;
} else {
    $post_number = '-1';
}

$query = new WP_Query( array( 
    'post_type' => 'client', 
    'posts_per_page' => $post_number, 
    'order' => $order_by ) 
);

if($number_of_posts_in_row == '') {
	$number_of_posts_in_row = '4';
}

if($number_of_posts_in_row == '3') {
	$column_number = 'col-md-4 col-sm-6 col-xs-12';
	$section_height = '250';
} else if($number_of_posts_in_row == '4') {
	$column_number = 'col-md-3 col-sm-4 col-xs-6';
	$section_height = '200';
} else if($number_of_posts_in_row == '6') {
	$column_number = 'col-md-2 col-sm-4 col-xs-3';
	$section_height = '150';
}

if($height != '' ) {
	$section_height = $height;
}

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
$w_studio_custom_inline_style .= '.wl-client-image.'.$className.'{height: '.$section_height.'px;}';
$w_studio_custom_inline_style .= '.wl-client-image.'.$className.' a img{max-height: '.$section_height.'px;}';
wp_add_inline_style( 'w_studio_inline-style', $w_studio_custom_inline_style );

if( $query->have_posts() ) : 
	if ($client_style == 'style-1') { 
		while ($query->have_posts()) : $query->the_post(); 
		$w_studio_client_logo_link = get_post_meta( $post->ID , 'w-client-logo-link' , true ); ?>
		<div class="<?php echo $column_number; ?>">
			<div class="text-center wl-client-image <?php echo $className; ?>">
				<a href="<?php echo esc_url($w_studio_client_logo_link); ?>">
					<?php the_post_thumbnail(); ?>
				</a>
			</div>
		</div>
		<?php endwhile; 
	} else { ?>
		<div id="client-curousel" class="owl-carousel owl-theme">
			<?php while ($query->have_posts()) : $query->the_post(); 
			$w_studio_client_logo_link = get_post_meta( $post->ID , 'w-client-logo-link' , true ); ?>
			<div class="item">
				<div class="text-center wl-client-image <?php echo $className; ?>">
					<a href="<?php echo esc_url($w_studio_client_logo_link); ?>">
						<?php the_post_thumbnail(); ?>
					</a>
				</div>
			</div>
			<?php endwhile; ?>
		</div>
	<?php }
endif; 

wp_register_script( 'client-carousel' , W_STUDIO_THEME_ASSETS_JS . '/client-carousel.js' , '' , '1.0.0' , true );

wp_enqueue_script( 'client-carousel' );

wp_localize_script( 'client-carousel' , 'w_studio_client_number' , array( 'client_number' => $number_of_posts_in_row ) );
?>
