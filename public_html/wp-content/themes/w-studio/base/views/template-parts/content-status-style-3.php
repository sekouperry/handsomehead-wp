<?php 
$w_studio_optionValues = get_option( 'w_studio' );
$w_studio_class = '';
$w_studio_gridClass = '';
$w_studio_image_size = '';
if( $w_studio_optionValues[ 'w-blog-sidebar-style' ] == 1 ) {
	$w_studio_class = 'wl-grid-item-2';
	$w_studio_gridClass = 'grid';
} else {
	$w_studio_class = 'wl-grid-column-2';
	$w_studio_gridClass = 'grid-column-2';
} 
?>
<div>
	<div class="row <?php echo esc_attr($w_studio_gridClass); ?> wl-blog-column3" id="blogpostload">
		<?php if( $w_studio_optionValues[ 'w-blog-sidebar-style' ] == 1 ) { ?>
		<div class="wl-grid-sizer-2"></div>
		<?php } else { ?>
		<div class="wl-grid-column-sizer-2"></div>
		<?php 
		}
		$w_studio_count = 0;
		while( have_posts() ) : the_post(); ?>		
			<div class="wl-grid-item <?php echo esc_attr($w_studio_class); ?> text-center">
				<div class="wl-overflow hover-parent-5">
					<div class="hover-img-5">
						<?php 
							if( $w_studio_count == 3 ) {
								$w_studio_count = 0;
							}
							if( has_post_thumbnail() ) { 
								$w_studio_image_size = '';
								if( $w_studio_count == 0 ) {
									$w_studio_image_size = 'w_studio_image_370x570';
								}
								if( $w_studio_count == 1 ) {
									$w_studio_image_size = 'w_studio_image_370x370';
								}
								if( $w_studio_count == 2 ) {
									$w_studio_image_size = 'w_studio_image_370x270';
								}	
							}
							$w_studio_count++;
						?>
						<?php 
							if( has_post_thumbnail() ) {			
								the_post_thumbnail( $w_studio_image_size );
							} ?>
					</div>
					<div class="hover-effect-5">
						<div class="hover-inner wl-full-width">
							<a href="<?php the_permalink(); ?>"><h5 class="wl-color1 top-zero"><?php esc_html_e( 'view post', 'w-studio' ); ?></h5></a>
						</div>
					</div>
				</div>								
				<div class="wl-full-width wl-bg-color2 pull-left wl-masonry-blog">
					<h5 class="wl-color3"><?php the_category( ', ', $post->ID ); ?></h5>
					<h4 class="text-uppercase wl-color4">
						<a href="<?php the_permalink(); ?>"><?php if( get_the_title() != '' ) { the_title(); } else { echo 'Untitled'; } ?></a>
					</h4>
					<?php get_template_part( 'base/views/template-parts/blog-time-comments' ); ?>
					<?php the_excerpt(); ?>
					<?php 
						if( $w_studio_optionValues[ 'w-social-network-header' ] ) {
							get_template_part( 'base/views/template-parts/share-blog' );
						}
					?>
				</div>
			</div>
		<?php endwhile; ?>		
	</div>
</div>