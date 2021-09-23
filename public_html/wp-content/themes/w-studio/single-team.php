<?php get_header(); ?>

    <div class="wl-team-banner">
        <div class="container text-center">
            <h1><?php the_title(); ?></h1>
            <p><?php echo esc_attr( get_post_meta( $post->ID , 'w-team-member-designation' , true ) ); ?></p>
            <div class="wl-media-icons2">
                <div class="wl-media-plot row">
                    <?php do_action( 'w_studio_studio_team_icons' ); ?>
                </div>
            </div>
        </div>
    </div>

    <div class="container wl-single-team-content">
        <div class="row">
            <?php while( have_posts() ) : the_post(); ?>
                <?php if( has_post_thumbnail() ) : ?>
                    <div class="col-md-6 col-sm-6">
                        <?php the_post_thumbnail('w_studio_image_550x550'); ?>
                    </div>
                <?php endif; ?>
                <?php if( !has_post_thumbnail() ) { ?>
                    <div class="col-md-12 col-sm-12">
                <?php } else { ?>
                <div class="col-md-6 col-sm-6">
                <?php } ?>
                    <?php the_content(); ?>
                </div>
                <div class="col-md-12">
    				<?php 
    					// Previous/next post navigation.
                        the_post_navigation( array( 'next_text' => '<span class="meta-nav" aria-hidden="true">' . esc_html__( '' , 'w-studio' ) . '</span> ' . '<span class="screen-reader-text">' . esc_html__( 'Next' , 'w-studio' ) . '</span> ' . '<span class="post-title next-prev-icon" data-icon="&#x24;"></span>' , 'prev_text' => '<span class="meta-nav" aria-hidden="true">' . esc_html__( '' , 'w-studio' ) . '</span> ' . '<span class="post-title next-prev-icon" data-icon="&#x23;"></span>' . '<span class="screen-reader-text">' . esc_html__( 'Previous' , 'w-studio' ) . '</span> ', ) );
    				?>
                </div>
            <?php endwhile; ?>
        </div>
    </div>

<?php get_footer(); ?>