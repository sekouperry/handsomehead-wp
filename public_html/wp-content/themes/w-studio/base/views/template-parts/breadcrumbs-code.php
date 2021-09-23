<?php 

	$w_studio_optionValues = get_option( 'w_studio' );

	if($w_studio_optionValues['w-breadcrumbs']){

		get_template_part( 'base/views/template-parts/breadcrumbs' );

	}

?>