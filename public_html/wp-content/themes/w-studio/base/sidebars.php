<?php
/* Redux Global variable */
$w_studio_optionValues   = get_option( 'w_studio' );

$w_studio_args_right = array(
	'name'          => esc_html__( 'Right sidebar', 'w-studio' ),
	'id'            => 'right_sidebar',
	'before_widget' => '<div id="%1$s" class="wl-sidebar-items %2$s">',
	'after_widget'  => '</div>',
	'before_title'  => '<h5 class="wl-standard-marginbottom">',
	'after_title'   => '</h5>' 
);
/* Registering Right Sidebar */        
register_sidebar( $w_studio_args_right );

$w_studio_args_left = array(
	'name'          => esc_html__( 'Left sidebar', 'w-studio' ),
	'id'            => 'left_sidebar',
	'before_widget' => '<div id="%1$s" class="wl-sidebar-items %2$s">',
	'after_widget'  => '</div>',
	'before_title'  => '<h5 class="wl-standard-marginbottom">',
	'after_title'   => '</h5>' 
);
/* Registering Left Sidebar */
register_sidebar( $w_studio_args_left );

$w_studio_args_top = array(
	'name'          => esc_html__( 'Top Widget area', 'w-studio' ),
	'id'            => 'top_widgets',
	'before_widget' => '<div id="%1$s" class="top-widget-content %2$s">',
	'after_widget'  => '</div>',
	'before_title'  => '<h5 class="top-widget-area-title">',
	'after_title'   => '</h5>' 
);
/* Registering Top Widget Area */
register_sidebar( $w_studio_args_top );

$w_studio_footer_col = isset( $w_studio_optionValues['w-footer-column-num'] ) ? esc_attr( $w_studio_optionValues['w-footer-column-num'] ) : '';
if( $w_studio_footer_col == '' ) {
	$w_studio_footer_col = 3;
}
for( $w_studio_count = 1; $w_studio_count <= $w_studio_footer_col; $w_studio_count++ ) {
	$w_studio_args_top = array(
		'name'          => esc_html__( 'Footer Widget area'.$w_studio_count, 'w-studio' ),
		'id'            => 'footer_widgets'.$w_studio_count,
		'before_widget' => '<div id="%1$s" class="footer-widget-content %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h5 class="top-widget-area-title">',
		'after_title'   => '</h5>' 
	);
	/* Registering Top Widget Area */
	register_sidebar( $w_studio_args_top );
}

/* Registering User Defined Sidebars */
if( isset( $w_studio_optionValues['w-register-sidebar'] ) ){
	if( !empty( $w_studio_optionValues['w-register-sidebar'] ) ){
		foreach( $w_studio_optionValues['w-register-sidebar'] as $w_studio_sideBar ){
			if( !empty( $w_studio_sideBar ) ){
				$w_studio_args = array(
					'name'          => $w_studio_sideBar,
					'id'            => str_replace( ' ', '_', strtolower( $w_studio_sideBar ) ),
					'before_widget' => '<div id="%1$s" class="wl-sidebar-items %2$s">',
					'after_widget'  => '</div>',
					'before_title'  => '<h5 class="wl-standard-marginbottom">',
					'after_title'   => '</h5>' 
				);
				register_sidebar( $w_studio_args );
			}
		}
	}
}