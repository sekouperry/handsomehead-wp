<?php

$w_studio_optionValues = get_option( 'w_studio' );
if( !is_archive() ) {
	if( $w_studio_optionValues[ 'w-blog-pagination' ] ) {
		if( $w_studio_optionValues[ 'w-blog-archive-load-more' ] == 1 ) {
			w_studio_pagination();
		} else {
			get_template_part( 'base/views/template-parts/load-more' );
		}                                        
	}
} else {
	if( $w_studio_optionValues[ 'w-blog-category-pagination' ] ) {
		w_studio_pagination();                     
	}
}	

function w_studio_pagination() {
	the_posts_pagination( array(
			'prev_text'          => esc_html__( 'Previous', 'w-studio' ),
			'next_text'          => esc_html__( 'Next', 'w-studio' ),
			'before_page_number' => '<span class="meta-nav screen-reader-text">' . esc_html__( '', 'w-studio' ) . ' </span>',
	) );
}
?>