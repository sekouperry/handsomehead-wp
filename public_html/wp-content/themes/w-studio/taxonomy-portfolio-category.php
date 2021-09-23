<?php get_header(); ?>

<?php

	$w_studio_optionValues = get_option( 'w_studio' );

	$w_studio_counter = 1;

	$w_studio_class = '';

	$w_studio_hoverStyle = '';

	$w_studio_pageStyle = '';

	if( esc_attr(isset( $w_studio_optionValues[ 'w-portfolio-hover-style' ] )) ){

	if( esc_attr($w_studio_optionValues[ 'w-portfolio-hover-style' ] )) {

		$w_studio_hoverStyle = 'hover-effect-'.esc_attr($w_studio_optionValues[ 'w-portfolio-hover-style' ]);

	}

	}else{

		$w_studio_hoverStyle = 'hover-effect-' . 1;

	}

	if( esc_attr($w_studio_optionValues[ 'w-portfolio-category-style' ] )) {

		$w_studio_pageStyle = 'style-'.esc_attr($w_studio_optionValues[ 'w-portfolio-category-style' ]);

	} else {

		$w_studio_pageStyle = 'style-' . 1;

	}

	if( have_posts() ) : ?>

<section>

	<?php get_template_part( 'base/views/template-parts/portfolio-banner' ); ?>

	<input type="hidden" name="fileName" value="taxonomy-portfolio-category">

	<!-- Main content start -->

	<?php get_template_part( 'base/views/template-parts/portfolio/content-'. $w_studio_pageStyle ); ?>

	<!-- Main content end -->

</section>

<?php 

	endif;

	get_footer();?>