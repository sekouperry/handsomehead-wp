<?php
/**
 * The template for displaying pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages and that
 * other "pages" on your WordPress site will use a different template.
 *
 * @package W_Studio
 * @since W_Stuio 1.0
 */
get_header();
//Redux Global variable
$w_studio_optionValues = get_option( 'w_studio' );

//Inline style script
wp_enqueue_style( 'w_studio_inline-style', get_template_directory_uri() . '/assets/css/inline-style.css' );
$w_studio_custom_inline_style = '';

global $post;
$w_studio_checkbox = esc_attr( get_post_meta( $post->ID , 'w-page-header' , true ) );

//  Menu color 
$w_studio_menuBgColor = esc_attr( get_post_meta( $post->ID , 'w-page-menu-bg-color' , true ) );
if( isset( $w_studio_menuBgColor ) && $w_studio_menuBgColor == 'on' ) {

    $w_studio_custom_inline_style .= '.menu-bg {background: transparent;}';
    $w_studio_custom_inline_style .= '#home {top:0;}';
    $w_studio_custom_inline_style .= '.wl-header { position: absolute; top: 0; left: 0; }';
}


$w_studio_bannerSlider = esc_attr( get_post_meta( $post->ID , 'w-page-banner-slider' , true ) );
$w_studio_sliderMarginBottom = esc_attr( get_post_meta( $post->ID , 'w-slider-margin-bottom' , true ) );
$w_studio_headerMarginTop = esc_attr( get_post_meta( $post->ID , 'w-hide-page-header-margin' , true ) );
$w_studio_footerMarginBottom = esc_attr( get_post_meta( $post->ID , 'w-hide-page-footer-margin' , true ) );

if( $w_studio_bannerSlider == 'on' && $w_studio_sliderMarginBottom != '' ) {
	$w_studio_custom_inline_style .= '#home { top: '.$w_studio_sliderMarginBottom.'px;}';
}

if( $w_studio_headerMarginTop == 'on' ) {
	$w_studio_custom_inline_style .= '.wl-main-content { margin-top: 0;}';
	$w_studio_custom_inline_style .= '#home { top: 0;}';
}

if( $w_studio_footerMarginBottom == 'on' ) {
	$w_studio_custom_inline_style .= '.wl-main-content { margin-bottom: 0;}';
}

wp_add_inline_style( 'w_studio_inline-style' , $w_studio_custom_inline_style );

//banner slider section
if( $w_studio_bannerSlider == 'on' ) {
	get_template_part('base/views/banner-slider');
}

//page banner section
if( $w_studio_checkbox == 'on' ) {
	do_action( 'w_studio_studio_header' );
}

//Page title section
$w_studio_page_title_section = esc_attr( get_post_meta( $post->ID , 'w-hide-page-title' , true ) );
$w_studio_page_title_ED = '0';
if( $w_studio_page_title_section == 'default' || $w_studio_page_title_section == '' ) {
	$w_studio_page_title_ED = isset( $w_studio_optionValues[ 'w-page-title-enable-disable' ] ) ? esc_attr( $w_studio_optionValues[ 'w-page-title-enable-disable' ] ) : '';
} else if( $w_studio_page_title_section == 'show' ) {
	$w_studio_page_title_ED = '1';
} else if( $w_studio_page_title_section == 'hide' ) {
	$w_studio_page_title_ED = '0';
}

if( get_the_title() && $w_studio_page_title_ED != '0' ) {
	get_template_part( 'base/views/w-page-title' );
}

//Page sidebar
$w_studio_sidebar = esc_attr( get_post_meta( $post->ID , 'w-page-sidebar' , true ) );
if( $w_studio_sidebar == 'default' && $w_studio_sidebar != 'fullwidth' ) {
    // Get Global Option For Sidebar
    $w_studio_sidebarOption = get_option( 'w_studio' );
    if( esc_attr( isset( $w_studio_sidebarOption[ 'w-page-sidebar-style' ] ) ) ) {
        if( !esc_attr( empty( $w_studio_sidebarOption[ 'w-page-sidebar-style' ] ) ) ) {
            if( esc_attr( isset( $w_studio_sidebarOption[ 'w-pages-sidebar' ] ) ) ) {
                $w_studio_sidebar = esc_attr( $w_studio_sidebarOption[ 'w-page-sidebar-style' ] );
            }
        }
    }
}
$w_studio_cols_num = 'col-md-12';
if( $w_studio_sidebar == 'no-sidebar' || $w_studio_sidebar == 'fullwidth' ) { 
	$w_studio_cols_num = 'col-md-12';
} else {
	$w_studio_cols_num = 'col-md-8';
}
?>

<div class="container">
	<?php get_template_part( 'base/views/template-parts/breadcrumbs-code' ); ?>
	<div class="row">
		<?php if( $w_studio_sidebar == 'left' ) { get_sidebar(); } ?>
		<div class="<?php echo esc_attr( $w_studio_cols_num ); ?>">
			<div class="wl-main-content">
				<div  <?php post_class(); ?>>
					<?php
					while( have_posts() ) : the_post();
						the_content();
						//Page COmments Enable/Disable
						if(isset($w_studio_optionValues['w-page-comment-disable'])) {		
							if( esc_attr($w_studio_optionValues['w-page-comment-disable']) != '0' ) {
							// If comments are open or we have at least one comment, load up the comment template.
							if( comments_open( $post->ID ) || get_comments_number() ) :
								comments_template();
							endif;
							}
						} else {
							if( comments_open( $post->ID ) || get_comments_number() ) :
								comments_template();
							endif;
						}

					endwhile;
					?>
				</div>
			</div>
		</div>
		<?php if( $w_studio_sidebar == 'right' ) { get_sidebar(); } ?>
	</div>
</div>

<?php get_footer(); ?>