<?php $w_studio_optionValues = get_option( 'w_studio' ); ?>
<div class="wl-media-icons wl-blog-media">
	<div class="wl-media-plot  row">
		<div class="wl-media-share">	
                 <?php if( is_single() ) { ?>
                  <span>share</span><span data-icon="E" class="wl-icon-padding hidden-sm hidden-xs"></span>	
                 <?php } ?>	
				<?php //comes from post metabox  ?>
				<?php if( isset ( $w_studio_optionValues[ 'w-social-share-facebook' ] ) ) { ?>
					<a href="https://www.facebook.com/sharer/sharer.php?u=<?php the_permalink();?>" target="_blank"><span data-icon=&#xe093;></span></a>
				<?php } if( isset ( $w_studio_optionValues[ 'w-social-share-twitter' ] ) ) { ?>
					<a href="http://twitter.com/intent/tweet?url=<?php the_permalink(); ?>&text=<?php echo rawurlencode(get_the_title()); ?>" target="_blank"><span data-icon=&#xe094;></span></a>
				<?php } if( isset ( $w_studio_optionValues[ 'w-social-share-google-plus' ] ) ) { ?>
					<a href="https://plus.google.com/share?url=<?php the_permalink(); ?>" target="_blank"><span data-icon=&#xe096;></span></a>
				<?php } if( isset ( $w_studio_optionValues[ 'w-social-share-pinterest' ] ) ) { ?>
					<a href="http://pinterest.com/pin/create/bookmarklet/?media=MEDIA&url=<?php the_permalink(); ?>" target="_blank"><span data-icon=&#xe095;></span></a>
				<?php } if( isset ( $w_studio_optionValues[ 'w-social-share-tumblr' ] ) ) { ?>
					<a href="http://www.tumblr.com/share?v=3&u=<?php the_permalink(); ?>" target="_blank"><span data-icon=&#xe097;></span></a>
				<?php } if( isset ( $w_studio_optionValues[ 'w-social-share-delicious' ] ) ) { ?>
					<a href="http://del.icio.us/post?url=<?php the_permalink(); ?>" target="_blank"><span data-icon=&#xe0a9;></span></a>
				<?php } ?>
		</div>
	</div>
</div>