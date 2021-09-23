<?php 
	$w_studio_optionValues = get_option( 'w_studio' );
	$w_studio_class = '';
	$w_studio_image_size = '';
	if( $w_studio_optionValues[ 'w-blog-sidebar-style' ] == 1 ) {
		$w_studio_classTop = 'col-md-4 col-sm-6 ';
		$w_studio_classBottom = 'col-md-8 col-sm-6 ';
		$w_studio_image_size = 'w_studio_image_770x570';
		$w_studio_custom_image_size = '770x570';
	} else {
		$w_studio_classTop = 'col-sm-6';
		$w_studio_classBottom = 'col-sm-6';
		$w_studio_image_size = 'w_studio_image_370x570';
		$w_studio_custom_image_size = '370x570';
	}
?>
<div class="row wl-nomalmargin-bottom column-2">
	<div class="<?php if(has_post_thumbnail()) { echo esc_attr($w_studio_classTop); } else { echo 'col-md-12'; } ?> col-xs-12 pull-left wl-sibling-hover-1">
		<div class="wl-height1 wl-full-width wl-bg-color2 pull-left wl-both-padding wl-relative">
			<?php if(!has_post_thumbnail()) { echo '<div class="row"><div class="col-md-8 col-md-offset-2 wl-blog-items"><div class="wl-middle-content">';} ?>
			<?php if( isset($w_studio_optionValues[ 'w-blog-archive-category' ]) && $w_studio_optionValues[ 'w-blog-archive-category' ] ) { ?>
				<h5 class="wl-box-margintop wl-color3 hidden-sm"><?php the_category( ', ', $post->ID ); ?></h5>
			<?php } else { ?>
				<h5 class="wl-box-margintop wl-color3 hidden-sm"><?php the_category( ', ', $post->ID ); ?></h5>
			<?php } ?>
			<h4 class="wl-big-top-margin text-uppercase wl-color4">
				<a href="<?php the_permalink(); ?>"><?php if( get_the_title() != '' ) { the_title(); } else { echo 'Untitled'; } ?></a>
			</h4>
			<?php get_template_part( 'base/views/template-parts/blog-time-comments' ); ?>
			<div class="wl-box-margintop"><?php the_excerpt(); ?></div>
			<?php 
				if( $w_studio_optionValues[ 'w-social-network-header' ] ) {
					get_template_part( 'base/views/template-parts/share-blog' );
				}
			?>
			<?php if(!has_post_thumbnail()) { echo '</div></div></div>'; } ?>
		</div>
	</div>		
	<?php if(has_post_thumbnail()) { ?>
	<div class="<?php echo esc_attr($w_studio_classBottom); ?> col-xs-12 pull-right wl-sibling-hover-2 mobile-margintop">
		<div class="wl-relative wl-height1">
			<?php 
			if( has_post_thumbnail() ) {			
				the_post_thumbnail( $w_studio_image_size );
			} ?>
			<div class="hover-effect-1">
				<div class="hover-inner blog-hover-inner">
					<a href="<?php the_permalink(); ?>" class="wl-color1">
						<span><?php esc_html_e( 'Read More', 'w-studio' ); ?></span>
					</a>
				</div>
			</div>
		</div>
	</div>
	<?php } ?>
</div>