<?php
$id = get_the_id();

$content = get_the_content();
$post_meta = wbc_get_meta( $id );

$video_embed_code = ( isset( $post_meta['wbc-video-embed'] ) && !empty( $post_meta['wbc-video-embed'] ) ) ? $post_meta['wbc-video-embed'] : false;
?>
<article id="post-<?php the_id();?>" <?php post_class( 'clearfix' );?>>

      	<?php

			if ( $video_embed_code !== false ) {
				echo '<div class="post-featured video-format">';
				echo '<div class="wbc-video-wrap">';
				echo apply_filters( 'the_content', do_shortcode( $video_embed_code ) );
				echo '</div>';
				echo '</div>';
			}

		?>

      <div class="post-contents">

	      	<header class="post-header">
		      	<?php
					if ( is_single() ) {
						echo '<h1 class="entry-title">'.get_the_title().'</h1>';
					}else {
						echo '<h2 class="entry-title"><a href="'.esc_attr( get_permalink() ).'">'.get_the_title().'</a></h2>';
					}

				?>
		        <div class="entry-meta">
					<span class="date"><i class="far fa-calendar-alt"></i> <?php echo get_the_date( get_option( 'date_format' ) )?></span>
		            <span class="user"><i class="fas fa-user"></i> <?php esc_html_e( 'By', 'ninezeroseven' ); ?> <?php the_author_posts_link(); ?></span>
		           	<?php if ( get_post_type() == 'post' ) { ?> <span class="post-in"><i class="fas fa-pencil-alt"></i> <?php esc_html_e( 'In', 'ninezeroseven' ); ?> <?php the_category( ', ' ) ?></span><?php } ?>
		            <span class="comments"><i class="fas fa-comments"></i> <?php comments_number( esc_html__( 'No Comments', 'ninezeroseven' ), esc_html__( '1 Comment', 'ninezeroseven' ), esc_html__( '% Comments', 'ninezeroseven' ) );?></span>
	        	</div>
	     	</header>

	      <div class="entry-content clearfix">

			<?php
				if ( is_single() ) {

					echo apply_filters( 'the_content', $content );

				}else {

					the_excerpt();

					printf( '<div class="more-link"><a href="%1s" class="button btn-primary">%2s</a></div>',
						get_permalink(),
						esc_html__( 'Read More', 'ninezeroseven' )
					);

				}
			?>
			<?php if( is_single() && has_tag() ): ?>
				<div class="clearfix"></div>
				<div class="tags">
				<?php the_tags(); ?>
				</div>

			<?php endif; ?>

		</div>
    </div>

</article> <!-- ./post -->
