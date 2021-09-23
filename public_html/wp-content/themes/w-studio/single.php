<?php
get_header();
global $post;

$w_studio_optionValues = get_option( 'w_studio' );
// Check Theme Option For Sidebar
$w_studio_sidebarPosition = esc_attr( get_post_meta( $post->ID , 'w-post-sidebar' , true ) );

if( isset( $w_studio_sidebarPosition ) && !empty( $w_studio_sidebarPosition ) ) {
    $w_studio_sidebar = $w_studio_sidebarPosition;
} else {
    if( esc_attr( isset( $w_studio_optionValues[ 'w-blog-single-page-sidebar' ] ) ) ) {
        $w_studio_sidebar = esc_attr( $w_studio_optionValues[ 'w-blog-single-page-sidebar' ] );
    } else {
        $w_studio_sidebar = 'no-sidebar';
    }
}

while( have_posts() ) : the_post();
    get_template_part( 'base/views/template-parts/single-blog-banner' );
endwhile;
?>
    <div class="container">
        <?php get_template_part( 'base/views/template-parts/breadcrumbs-code' ); ?>
        <div class="row wl-blog-contents">
            <?php
            if( $w_studio_sidebar == 2 || $w_studio_sidebar == 3 ) {
                $w_studio_classes = 'col-md-8';
            } else {
                $w_studio_classes = 'col-md-6 col-md-offset-3';
            }
            if( $w_studio_sidebar == 2 ) {
                get_sidebar();
            } ?>
            <div class="<?php echo esc_attr( $w_studio_classes ); ?>">
                <div  <?php post_class(); ?>>
                    <?php
                    while( have_posts() ) : the_post();

                        $w_studio_titleNmeta = esc_attr( get_post_meta( $post->ID , 'w-post-banner-head' , true ) );

                        if( $w_studio_titleNmeta == 'default' ) {
                            if( esc_attr( isset( $w_studio_optionValues[ 'w-blog-single-title-meta' ] ) ) ) {
                                if( esc_attr( $w_studio_optionValues[ 'w-blog-single-title-meta' ] == 'below-banner' ) ) {
                                    $w_studio_titleNmeta = 'below-banner';
                                } else {
                                    $w_studio_titleNmeta = 'on-banner';
                                }
                            } else {
                                $w_studio_titleNmeta = 'on-banner';
                            }
                        }

                        if( $w_studio_titleNmeta == 'below-banner' ) {
							if( isset( $w_studio_optionValues[ 'w-blog-single-category' ] ) && $w_studio_optionValues[ 'w-blog-single-category' ] != '0' ) {
							?>
                            <h5 class="wl-color3">
                                <?php
                                $w_studio_categories = get_the_category();
                                $w_studio_lastItem = end( $w_studio_categories );
                                foreach( $w_studio_categories as $cat ) {

                                    if( $cat->cat_name != "All" ) {
                                        if( $cat->term_id != $w_studio_lastItem->term_id ) {
                                            ?>
                                            <a class="wl-blog-single-cat"
                                               href="<?php echo get_category_link( $cat->cat_ID ); ?>"><?php echo esc_attr( $cat->cat_name ) . ", "; ?></a>
                                        <?php
                                        } else {
                                            ?>
                                            <a class="wl-blog-single-cat"
                                               href="<?php echo get_category_link( $cat->cat_ID ); ?>"><?php echo esc_attr( $cat->cat_name ); ?></a>
                                        <?php
                                        }
                                    }
                                } ?>
                            </h5>
							<?php } ?>
                            <?php $w_studio_title = get_the_title(); ?>
                            <h2 class="wl-color4"><?php echo (!empty($w_studio_title)) ? $w_studio_title : 'Untitled'; ?></h2>
                            <?php if( ( isset( $w_studio_optionValues[ 'w-blog-single-date' ] ) && $w_studio_optionValues[ 'w-blog-single-date' ] != '0' ) || ( isset( $w_studio_optionValues[ 'w-blog-single-author' ] ) && $w_studio_optionValues[ 'w-blog-single-author' ] != '0' ) || ( isset( $w_studio_optionValues[ 'w-blog-single-comments' ] ) && $w_studio_optionValues[ 'w-blog-single-comments' ] != '0' ) ) { ?>
							<div class="wl-blog-detail-menu">
								<ul>
									<?php 
									if( isset( $w_studio_optionValues[ 'w-blog-single-date' ] ) && $w_studio_optionValues[ 'w-blog-single-date' ] != '0' ) {
										$w_studio_archive_year  = get_the_time('Y');
										$w_studio_archive_month = get_the_time('m');
										$w_studio_archive_day   = get_the_time('d');
									?>
									<li><a href="<?php echo get_day_link( $w_studio_archive_year, $w_studio_archive_month, $w_studio_archive_day); ?>"><?php echo the_time('F j, Y'); ?></a></li>
									<?php } if( isset( $w_studio_optionValues[ 'w-blog-single-author' ] ) && $w_studio_optionValues[ 'w-blog-single-author' ] != '0' ) { ?>
									<li><a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ), get_the_author_meta( 'user_nicename' ) ); ?>"><?php the_author(); ?></a></li>
									<?php } if( isset( $w_studio_optionValues[ 'w-blog-single-comments' ] ) && $w_studio_optionValues[ 'w-blog-single-comments' ] != '0' ) { ?>
									<li><a href="<?php comments_link(); ?>"><?php comments_number( 'no Comment', 'one Comment', '% Comments' ); ?></a></li>
									<?php } ?>
								</ul>
							</div>
							<?php } } 
                        the_content();

                        $w_studio_defaults = array('before' => '<div class="page-links"><span class="page-links-title">' . esc_html__( 'Pages:', 'w-studio' ) . '</span>', 'after' => '</div>', 'link_before' => '<span>', 'link_after'  => '</span>', 'pagelink' => '<span class="screen-reader-text">' . esc_html__( ' ', 'w-studio' ) . ' </span>%', 'separator'  => '<span class="screen-reader-text"> </span>', );

                        wp_link_pages( $w_studio_defaults );
                        ?>
						
						<?php if( has_tag() ) { ?>
						<div  class="wl-margin-top43">
							<?php the_tags(); ?>
						</div>
						<?php } ?>
						<?php
							if( esc_attr( isset( $w_studio_optionValues[ 'w-social-network-header' ] ) ) && esc_attr( $w_studio_optionValues[ 'w-social-network-header' ] ) == '1' ) {
							get_template_part( 'base/views/template-parts/share-blog' );
						}
					
                        
                        // Previous/next post navigation.
                        the_post_navigation( array( 'next_text' => '<span class="meta-nav" aria-hidden="true">' . esc_html__( '' , 'w-studio' ) . '</span> ' . '<span class="screen-reader-text">' . esc_html__( 'Next post' , 'w-studio' ) . '</span> ' . '<span class="post-title next-prev-icon" data-icon="&#x24;"></span>' , 'prev_text' => '<span class="meta-nav" aria-hidden="true">' . esc_html__( '' , 'w-studio' ) . '</span> ' . '<span class="post-title next-prev-icon" data-icon="&#x23;"></span>' . '<span class="screen-reader-text">' . esc_html__( 'Previous post' , 'w-studio' ) . '</span> ' ,

                        ) );
                    endwhile;
                    ?>
                </div>
                <?php
                // If comments are open or we have at least one comment, load up the comment template.
                if( comments_open() || get_comments_number() ) :
                    comments_template();
                endif;
                ?>
            </div>
            <?php if( $w_studio_sidebar == 3 ) {
                get_sidebar();
            } ?>
        </div>
    </div>
<?php get_footer(); ?>