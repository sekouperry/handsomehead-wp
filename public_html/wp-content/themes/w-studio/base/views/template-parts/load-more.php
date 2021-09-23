<?php $w_studio_optionValues = get_option( 'w_studio' ); ?>
<!-- start load more -->
<div class="wl-sort-link text-center <?php if( $w_studio_optionValues[ 'w-blog-archive-load-more' ] != 2 ) { echo 'wl-section-marginbottom50'; } ?>">
	<div class="wl-link-to">
		<?php if( $w_studio_optionValues[ 'w-blog-archive-load-more' ] != 2 ) { ?>
			<span class="wl-direction-left" data-icon=&#x45;></span>
			<a href="javascript:void(0);"  id="w-load-more" data-value="<?php echo (is_home()) ? 'post' : ''; ?>">
			<?php 
				if( isset( $w_studio_optionValues[ 'w-blog-load-more-text-change' ] ) ) {
					echo esc_attr( $w_studio_optionValues[ 'w-blog-load-more-text-change' ] );
				} else {
					echo esc_html__( 'load more', 'w-studio' );
				}
			?>			
			</a>
			<span class="wl-direction-right" data-icon=&#x44;></span>
		<?php } ?>
	</div>
</div>
<a id="initialPageValue">2</a>
<!-- end load more -->