<?php get_header(); ?>



<section>

    <!-- 404 content start -->

    <div class="wl-full-width wl-404-wrapper">

        <div class="container">

            <div class="wl-middle-content">

                <div class="col-md-8 wl-404-text">

                    <span class="wl-color2"><?php esc_html_e( '404', 'w-studio' ); ?></span>

                    <h1><?php esc_html_e( 'Looks like you are lost', 'w-studio' ); ?></h1>

                    <p><?php esc_html_e( 'The page you are looking for was moved, removed,renamed or might never existed.', 'w-studio' ); ?></p>

                    <a href="<?php echo esc_url(home_url('/'));?>" class="wl-comment-submit wl-color1

                    wl-common-margintop pull-left"><?php esc_html_e( 'go home', 'w-studio' ); ?></a>

                </div>

                <div class="col-md-4 wl-404-img">

                    <img src="<?php echo W_STUDIO_THEME_DIR_URI;?>/assets/images/404.png" alt="404">

                </div>

            </div>

        </div>

    </div>

    <!-- 404 content end -->

</section>



<?php get_footer(); ?>



