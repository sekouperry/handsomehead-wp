<?php

	$w_studio_terms = get_the_terms( $post->ID, 'portfolio-category' );

	if( $w_studio_terms ) {

		foreach( $w_studio_terms as $w_studio_term ) {

			$w_studio_termLink	= get_term_link( $w_studio_term->term_id, 'portfolio-category' );?>

			<a href="<?php echo esc_attr($w_studio_termLink);?>"><?php echo esc_attr($w_studio_term->name);?></a>

<?php   }

    } ?>