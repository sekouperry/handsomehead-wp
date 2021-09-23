<?php get_header();

$w_studio_custom_inline_style = '';
$w_studio_optionValues = get_option( 'w_studio' );
if( esc_attr( $w_studio_optionValues[ 'w-blog-sidebar-style' ] ) == 2 ) {
    $w_studio_custom_inline_style .= '.wl-blog-sidebar { padding-left: 0; padding-right: 60px; }';
}
wp_add_inline_style( 'w_studio_inline-style' , $w_studio_custom_inline_style );
?>
    <section>
        <?php 
			if( isset($w_studio_optionValues['w-blog-category-banner-on-off'] ) && $w_studio_optionValues['w-blog-category-banner-on-off'] == '1' ) {
				get_template_part( 'base/views/template-parts/blog-archive-banner' ); 
			}
		?>
        <div class="wl-main-content wl-section-margintop4">
            <div class="container">
                <?php
                if( esc_attr( $w_studio_optionValues[ 'w-blog-archive-style' ] ) ) {
                    $w_studio_style = '-style-' . esc_attr( $w_studio_optionValues[ 'w-blog-archive-style' ] );
                } else {
                    $w_studio_style = '-style-1';
                }
                if( get_post_format( $post->ID ) ) {
                    $w_studio_format = get_post_format( $post->ID ) . $w_studio_style;
                } else {
                    $w_studio_format = 'standard' . $w_studio_style;
                }
                if( esc_attr( $w_studio_optionValues[ 'w-blog-sidebar-style' ] ) == 1 ) {
                    if( esc_attr( $w_studio_optionValues[ 'w-blog-archive-style' ] ) != 3 ) {
                        ?>
                        <div class="wl-nomalmargin-bottom <?php
                        if( esc_attr( $w_studio_optionValues[ 'w-blog-archive-style' ] ) == 2 ) {
                            echo 'column-2';
                        }
                        ?>" id="blogpostload">
                            <?php
                            while( have_posts() ) : the_post();
                                get_template_part( 'base/views/template-parts/content' , $w_studio_format );
                            endwhile;
                            ?>
                        </div>
                    <?php
                    } else {
                        get_template_part( 'base/views/template-parts/content' , $w_studio_format );
                    }
                    get_template_part( 'base/views/template-parts/pagination' );
                } else {
                    echo '<div class="row">';
                    if( esc_attr( $w_studio_optionValues[ 'w-blog-sidebar-style' ] ) == 2 ) {
                        get_sidebar();
                    }
                    if( esc_attr( $w_studio_optionValues[ 'w-blog-archive-style' ] ) != 3 ) {
                        ?>
                        <div
                            class="wl-nomalmargin-bottom col-md-12 wl-section-margintop
							<?php 
                            if( esc_attr( $w_studio_optionValues[ 'w-blog-archive-style' ] ) == 2 ) {
                                echo 'row column-2';
                            }
                            ?>">
                            <?php
                            while( have_posts() ) : the_post();
                                get_template_part( 'base/views/template-parts/content' , $w_studio_format );
                            endwhile;
                            ?>
                            <div id="blogpostload"></div>
                            <?php get_template_part( 'base/views/template-parts/pagination' ); ?>
                        </div>
                    <?php
                    } else {
                        ?>
                        <div class="col-md-8 wl-section-margintop">
                            <!-- Main content start -->
                            <div class="wl-main-content">
                                <?php get_template_part( 'base/views/template-parts/content' , $w_studio_format ); ?>
                                <div id="blogpostload"></div>
                                <?php get_template_part( 'base/views/template-parts/pagination' ); ?>
                            </div>
                        </div>
                    <?php
                    }
                    if( esc_attr( $w_studio_optionValues[ 'w-blog-sidebar-style' ] ) == 3 ) {
                        get_sidebar();
                    }
                    echo '</div>';
                } ?>
            </div>
        </div>
    </section>
<?php get_footer(); ?>