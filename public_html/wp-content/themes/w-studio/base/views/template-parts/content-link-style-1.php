<?php 
	$w_studio_optionValues = get_option( 'w_studio' );
	$w_studio_class = '';
	$w_studio_image_size = '';
	if( isset( $w_studio_optionValues[ 'w-blog-sidebar-style' ] ) ){
            if( $w_studio_optionValues[ 'w-blog-sidebar-style' ] != 1 ) {
                    $w_studio_class = 'col-md-6';
                    $w_studio_image_size = 'w_studio_image_770x570';
                    $w_studio_custom_image_size = '770x570';
            } else {
                    $w_studio_image_size = 'w_studio_image_1170x570';
                    $w_studio_class = 'col-md-4';
                    $w_studio_custom_image_size = '1170x570';
            }
        }else{
            $w_studio_image_size = 'w_studio_image_1170x570';
            $w_studio_class = 'col-md-4';
            $w_studio_custom_image_size = '1170x570';
        } ?>
<div class="wl-nomalmargin-bottom blog-col-1 wl-height1">
	<div class="wl-relative wl-right-zero wl-height1 wl-full-width">
		<a href="<?php the_permalink(); ?>">
		<?php 
			if( has_post_thumbnail() ) {			
				the_post_thumbnail( $w_studio_image_size );
			} ?>
		</a>
		<div class="<?php if(has_post_thumbnail()) { echo esc_attr($w_studio_class); } else { echo 'col-md-12'; }?> col-xs-12 wl-overlay-black wl-blog-overlay-absolute wl-both-padding blog-overlay-hover wl-height1">
		<?php if(!has_post_thumbnail()) { echo '<div class="row"><div class="col-md-8 col-md-offset-2 wl-blog-items"><div class="wl-middle-content">';} ?>
			<?php if( $w_studio_optionValues[ 'w-blog-archive-category' ] != '0' ) { ?>
				<h5 class="wl-box-margintop wl-category-color"><?php the_category( ', ', $post->ID ); ?></h5>
			<?php } ?>
			<h4 class="wl-big-top-margin text-uppercase wl-color1">
				<a class="wl-color1" href="<?php the_permalink(); ?>"><?php if( get_the_title() != '' ) { the_title(); } else { echo 'Untitled'; } ?></a>
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
		<div class="hover-effect-1">
			<div class="hover-inner">
				<a href="<?php the_permalink(); ?>"></a>
			</div>
			<div class="bottom-icon-left">
				<a href="<?php the_permalink(); ?>" class="wl-color1" data-icon=&#x2d;></a>
			</div>
			<div class="bottom-icon-right">
				<a href="<?php the_permalink(); ?>" class="wl-color1" data-icon=&#x2e;></a>
			</div>
		</div>
	</div>
</div>