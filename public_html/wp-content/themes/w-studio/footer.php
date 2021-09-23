<?php
/**
 * The template for displaying the footer
 *
 *
 * @package WordPress
 * @subpackage W Studio
 * @since W Studio 1.0
 */
$w_studio_optionValues = get_option( 'w_studio' );
$w_studio_custom_inline_style = '';
$w_studio_footerColor = esc_attr( isset( $w_studio_optionValues[ 'w-copyright-text-color' ] ) ) ? esc_attr( $w_studio_optionValues[ 'w-copyright-text-color' ] ) : '';
if( $w_studio_footerColor ) {
    $w_studio_custom_inline_style .= '.wl-copy-right p { color: ' . $w_studio_footerColor . '; }';
} if ( ! class_exists( 'Redux' ) ) {	$w_studio_custom_inline_style .= '.wl-copy-right { float: none; text-align: center; width: 100%; }';}wp_add_inline_style( 'w_studio_inline-style' , $w_studio_custom_inline_style );
if( is_page() ) {
	$footerSectionOnOffMeta = esc_attr( get_post_meta( $post->ID, 'w-page-footer-show-hide', true ) );
} else {
	$footerSectionOnOffMeta = '';
}
$footerSectionOnOffTO = isset($w_studio_optionValues[ 'w-enable-footer' ]) ? esc_attr( $w_studio_optionValues[ 'w-enable-footer' ] ) : '';
if ( ! class_exists( 'Redux' ) ) { 
	footerSection( $w_studio_optionValues ); 
} else {
	if( is_page() ) {
		if( $footerSectionOnOffMeta != 'hide' && $footerSectionOnOffMeta != 'show' ) {
			if( $footerSectionOnOffTO != '0' ) {
				footerSection( $w_studio_optionValues );
			}
		} else if( $footerSectionOnOffMeta == 'show' ) {
			footerSection( $w_studio_optionValues );
		}
	} else {
		footerSection( $w_studio_optionValues );
	}
}
?>
<?php function footerSection( $w_studio_optionValues ) { ?>
<!-- Footer start -->
<footer>
	<!-- Footer Top -->
	<?php
		$w_studio_footer_topED = isset( $w_studio_optionValues[ 'w-enable-footer-top' ] ) ? esc_attr( $w_studio_optionValues[ 'w-enable-footer-top' ] ) : '';
		if( $w_studio_footer_topED != '0' ) {
	?>
	<div class="footer_top">
		<div class="container">
			<div class="row">
			<?php 
				$w_studio_footer_col_cls = 'col-md-4';
				$w_studio_footer_col = isset( $w_studio_optionValues['w-footer-column-num'] ) ? esc_attr( $w_studio_optionValues['w-footer-column-num'] ) : '';
				if( $w_studio_footer_col == '' ) {
					$w_studio_footer_col = 3;
				} else if( $w_studio_footer_col == '1' ) {
					$w_studio_footer_col_cls = 'col-md-12';
				} else if( $w_studio_footer_col == '2' ) {
					$w_studio_footer_col_cls = 'col-md-6';
				} else if( $w_studio_footer_col == '3' ) {
					$w_studio_footer_col_cls = 'col-md-4';
				} else if( $w_studio_footer_col == '4' ) {
					$w_studio_footer_col_cls = 'col-md-3';
				}
			
				for( $w_studio_count = 1; $w_studio_count <= $w_studio_footer_col; $w_studio_count++ ) { 
					$footer_widget = 'footer_widgets'.$w_studio_count;
					echo '<div class="'.$w_studio_footer_col_cls.'">';
						if( is_active_sidebar( $footer_widget ) ) {
							dynamic_sidebar( $footer_widget );
						}
					echo '</div>';
				}
				?>
			</div>
		</div>
	</div>
	<?php } ?>
		<!-- Footer Bottom -->
		<?php
			//enqueue inline style css
			wp_enqueue_style( 'w_studio_inline-style', get_template_directory_uri() . '/assets/css/inline-style.css' );
			$w_studio_custom_inline_style = '';
	
			$w_studio_footer_bottomED = isset( $w_studio_optionValues[ 'w-enable-footer-bottom' ] ) ? esc_attr( $w_studio_optionValues[ 'w-enable-footer-bottom' ] ) : '';
			if( $w_studio_footer_bottomED != '0' ) {
				
				$w_studio_cp_align = isset( $w_studio_optionValues[ 'w-copy-right-text-align' ] ) ? esc_attr( $w_studio_optionValues[ 'w-copy-right-text-align' ] ) : 'center';
				
				$w_studio_footer_logo = isset( $w_studio_optionValues[ 'w-sub-footer-logo-ED' ] ) ? esc_attr($w_studio_optionValues[ 'w-sub-footer-logo-ED' ]) : '';
				$w_studio_footer_social = isset( $w_studio_optionValues[ 'w-sub-footer-social' ] ) ? esc_attr($w_studio_optionValues[ 'w-sub-footer-social' ]) : '';
				if( $w_studio_footer_logo == '0' && $w_studio_footer_social == '0' ) {
					$w_studio_custom_inline_style .= '.wl-copy-right { width: 100%; text-align: '.$w_studio_cp_align.'; }';
					$w_studio_custom_inline_style .= '.wl-copy-right p { text-align: '.$w_studio_cp_align.'; }';
				} else if( $w_studio_footer_logo != '0' && $w_studio_footer_social != '0' && $w_studio_cp_align == 'center' ) {
					$w_studio_custom_inline_style .= '.wl-copy-right, .wl-footer-logo, footer .wl-media-icons { width: 33%; }';
					$w_studio_custom_inline_style .= '.wl-copy-right p { text-align: '.$w_studio_cp_align.'; }';
					$w_studio_custom_inline_style .= '.wl-media-icons { float: none; text-align: right; }';
				} else if( $w_studio_footer_logo != '0' && $w_studio_footer_social != '0' && $w_studio_cp_align == 'left' ) {
					$w_studio_custom_inline_style .= '.wl-copy-right p { text-align: '.$w_studio_cp_align.'; }';
				} else if( $w_studio_footer_logo != '0' && $w_studio_footer_social != '0' && $w_studio_cp_align == 'right' ) {
					$w_studio_custom_inline_style .= '.wl-copy-right{ float: right; }';
				} else if( $w_studio_footer_logo == '0' && $w_studio_footer_social != '0' ) {
					$w_studio_custom_inline_style .= '.wl-copy-right{ float: left; }';
				} else if( $w_studio_footer_logo != '0' && $w_studio_footer_social == '0' ) {
					$w_studio_custom_inline_style .= '.wl-copy-right{ float: right; }';
				}
				
			wp_add_inline_style( 'w_studio_inline-style', $w_studio_custom_inline_style );
		?>
	<div class="footer_bottom">
		<div class="container">
			<div class="row">
				<?php if( $w_studio_footer_logo != '0' ) { ?>
					<div class="wl-footer-logo">
						<a class="wl-img" href="<?php echo esc_url( home_url( '/' ) ); ?>">
							<?php if( esc_url( $w_studio_optionValues[ 'w-footer-logo' ][ 'url' ] ) ) { ?>
								<img src="<?php echo esc_url( $w_studio_optionValues[ 'w-footer-logo' ][ 'url' ] ); ?>" alt="logo"/>
							<?php } ?>
						</a>
					</div>
				<?php } ?>
				
				<?php if( $w_studio_cp_align != 'right' ) { ?>
				<div class="wl-copy-right">
					<p>	
						<?php if ( ! class_exists( 'Redux' ) ) { esc_html_e( 'Copyright © 2017. Wilylab', 'w-studio' );	} ?>
						<?php echo wp_kses( sprintf( __( '%s' , 'w-studio' ) , $w_studio_optionValues[ 'w-sub-footer-copyright' ] ) , array( 'a' => array('href' => array()), 'br' => array() ) ); ?>					
					</p>
				</div>
				<?php } ?>
				
				<?php if( $w_studio_footer_social != '0' ) { ?>
					<div class="wl-media-icons">
						<div class="wl-media-plot">
							<?php if( !esc_url( empty( $w_studio_optionValues[ 'w-social-facebook' ] ) ) ) { ?>
								<a href="<?php echo esc_url( $w_studio_optionValues[ 'w-social-facebook' ] ); ?>"><span
										data-icon=&#xe093;></span></a>
							<?php } ?>

							<?php if( !esc_url( empty( $w_studio_optionValues[ 'w-social-twitter' ] ) ) ) { ?>
								<a href="<?php echo esc_url( $w_studio_optionValues[ 'w-social-twitter' ] ); ?>"><span
										data-icon=&#xe094;></span></a>
							<?php } ?>

							<?php if( !esc_url( empty( $w_studio_optionValues[ 'w-social-google-plus' ] ) ) ) { ?>
								<a href="<?php echo esc_url( $w_studio_optionValues[ 'w-social-google-plus' ] ); ?>"><span
										data-icon=&#xe096;></span></a>
							<?php } ?>

							<?php if( !esc_url( empty( $w_studio_optionValues[ 'w-social-pinterest' ] ) ) ) { ?>
								<a href="<?php echo esc_url( $w_studio_optionValues[ 'w-social-pinterest' ] ); ?>"><span
										data-icon=&#xe095;></span></a>
							<?php } ?>
							
							<?php if( !esc_url( empty( $w_studio_optionValues[ 'w-social-linkedin' ] ) ) ) { ?>
								<a href="<?php echo esc_url( $w_studio_optionValues[ 'w-social-linkedin' ] ); ?>"><span
										data-icon=&#xe09d;></span></a>
							<?php } ?>
							
							<?php if( !esc_url( empty( $w_studio_optionValues[ 'w-social-tumblr' ] ) ) ) { ?>
								<a href="<?php echo esc_url( $w_studio_optionValues[ 'w-social-tumblr' ] ); ?>"><span
										data-icon=&#xe097;></span></a>
							<?php } ?>
							
							<?php if( !esc_url( empty( $w_studio_optionValues[ 'w-social-vimeo' ] ) ) ) { ?>
								<a href="<?php echo esc_url( $w_studio_optionValues[ 'w-social-vimeo' ] ); ?>"><span
										data-icon=&#xe09c;></span></a>
							<?php } ?>
							
							<?php if( !esc_url( empty( $w_studio_optionValues[ 'w-social-skype' ] ) ) ) { ?>
								<a href="<?php echo esc_url( $w_studio_optionValues[ 'w-social-skype' ] ); ?>"><span
										data-icon=&#xe0a2;></span></a>
							<?php } ?>
							
							<?php if( !esc_url( empty( $w_studio_optionValues[ 'w-social-google-drive' ] ) ) ) { ?>
								<a href="<?php echo esc_url( $w_studio_optionValues[ 'w-social-google-drive' ] ); ?>"><span
										data-icon=&#xe0a5;></span></a>
							<?php } ?>
							
							<?php if( !esc_url( empty( $w_studio_optionValues[ 'w-social-wordpress' ] ) ) ) { ?>
								<a href="<?php echo esc_url( $w_studio_optionValues[ 'w-social-wordpress' ] ); ?>"><span
										data-icon=&#xe099;></span></a>
							<?php } ?>
							
							<?php if( !esc_url( empty( $w_studio_optionValues[ 'w-social-stumble-upon' ] ) ) ) { ?>
								<a href="<?php echo esc_url( $w_studio_optionValues[ 'w-social-stumble-upon' ] ); ?>"><span
										data-icon=&#xe098;></span></a>
							<?php } ?>
							
							<?php if( !esc_url( empty( $w_studio_optionValues[ 'w-social-dribbble' ] ) ) ) { ?>
								<a href="<?php echo esc_url( $w_studio_optionValues[ 'w-social-dribbble' ] ); ?>"><span
										data-icon=&#xe09b;></span></a>
							<?php } ?>
							
							<?php if( !esc_url( empty( $w_studio_optionValues[ 'w-social-youtube' ] ) ) ) { ?>
								<a href="<?php echo esc_url( $w_studio_optionValues[ 'w-social-youtube' ] ); ?>"><span
										data-icon=&#xe0a3;></span></a>
							<?php } ?>
							
							<?php if( !esc_url( empty( $w_studio_optionValues[ 'w-social-instagram' ] ) ) ) { ?>
								<a href="<?php echo esc_url( $w_studio_optionValues[ 'w-social-instagram' ] ); ?>"><span
										data-icon=&#xe09a;></span></a>
							<?php } ?>
						</div>
					</div>
				<?php } ?>
				
				<?php if( $w_studio_cp_align == 'right' ) { ?>
				<div class="wl-copy-right">
					<p>	
						<?php if ( ! class_exists( 'Redux' ) ) { esc_html_e( 'Copyright © 2017. Wilylab', 'w-studio' );	} ?>
						<?php echo wp_kses( sprintf( __( '%s' , 'w-studio' ) , $w_studio_optionValues[ 'w-sub-footer-copyright' ] ) , array( 'a' => array('href' => array()), 'br' => array() ) ); ?>					
					</p>
				</div>
				<?php } ?>
				
			</div>
		</div>
	</div>
	<?php } ?>
</footer>
<?php } ?>

<?php
$w_studio_top_icon_class = '';
if( esc_attr( isset( $w_studio_optionValues[ 'w-goto-top-mobile' ] ) ) && esc_attr( $w_studio_optionValues[ 'w-goto-top-mobile' ] ) != '1' ) { 
	$w_studio_top_icon_class = 'wl-mobile-goto-top';
}
if( esc_attr( isset( $w_studio_optionValues[ 'w-goto-top' ] ) ) && esc_attr( $w_studio_optionValues[ 'w-goto-top' ] ) == '1' ) {
?>
    <div class="scroll-top scroll-top-active <?php echo esc_attr($w_studio_top_icon_class); ?>">
        <span data-icon="&#xe047;" title="<?php esc_html_e( 'Go to top' , 'w-studio' ); ?>"></span>
    </div>
<?php } ?>
</div>
<!-- Closing Wrapper -->
<?php wp_footer(); ?>
</body>
</html>