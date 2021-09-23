<?php

global $post;

if( is_page() ) {



    $w_studio_sidebarToLoad = esc_attr( get_post_meta( $post->ID , 'w-page-load-sidebar' , true ) );

    ?>

    <div class="col-md-4">

        <!-- sidebar start -->

        <div class="wl-blog-sidebar wl-section-margintop">

            <?php if( isset( $w_studio_sidebarToLoad ) && !empty( $w_studio_sidebarToLoad ) ) {

                if( is_active_sidebar( $w_studio_sidebarToLoad ) ) {

                    dynamic_sidebar( $w_studio_sidebarToLoad );
                }

            } else {

                // Get Global Option For Page Sidebar

                $w_studio_pageSidebar = get_option( 'w_studio' );

                if( esc_attr( isset( $w_studio_pageSidebar[ 'w-pages-sidebar' ] ) ) ) {

                    if( is_active_sidebar( $w_studio_pageSidebar[ 'w-pages-sidebar' ] ) ) {

                        dynamic_sidebar( esc_attr( $w_studio_pageSidebar[ 'w-pages-sidebar' ] ) );
                    }

                }

            }

            ?>

        </div>

        <!-- sidebar end -->

    </div>

<?php

} else {

    // Loading Sidebar For Blog Pages

    $w_studio_sidebarOption = get_option( 'w_studio' );

    if( is_single() ) {

        // Checking Post Meta Data For Sidebar

        $w_studio_sidebarToLoad = esc_attr( get_post_meta( $post->ID , 'w-post-load-sidebar' , true ) );

        if( isset( $w_studio_sidebarToLoad ) && !empty( $w_studio_sidebarToLoad ) ) {

            ?>

            <div class="col-md-4">

                <!-- sidebar start -->

                <div class="wl-blog-sidebar wl-section-margintop">

                    <?php 
                    if( is_active_sidebar( $w_studio_sidebarToLoad ) ) {

                        dynamic_sidebar( $w_studio_sidebarToLoad );
                    } 
                    ?>

                </div>

                <!-- sidebar end -->

            </div>

        <?php

        } else {

            // For Single Pages

            if( esc_attr( isset( $w_studio_sidebarOption[ 'w-blog-single-page-sidebar-load' ] ) ) ) {

                ?>

                <div class="col-md-4">

                    <!-- sidebar start -->

                    <div class="wl-blog-sidebar wl-section-margintop">

                        <?php 
                        if( is_active_sidebar( $w_studio_sidebarOption[ 'w-blog-single-page-sidebar-load' ] ) ) {

                            dynamic_sidebar( esc_attr( $w_studio_sidebarOption[ 'w-blog-single-page-sidebar-load' ] ) ); 
                        }
                        ?>

                    </div>

                    <!-- sidebar end -->

                </div>

            <?php

            }

        }

    } else {

        // For Blog Index Pages

        if( esc_attr( isset( $w_studio_sidebarOption[ 'w-blog-pages-sidebar' ] ) ) ) {

            ?>

            <div class="col-md-4">

                <!-- sidebar start -->

                <div class="wl-blog-sidebar wl-section-margintop">

                    <?php 
                    if( is_active_sidebar( $w_studio_sidebarOption[ 'w-blog-pages-sidebar' ] ) ) {
                        dynamic_sidebar( esc_attr( $w_studio_sidebarOption[ 'w-blog-pages-sidebar' ] ) ); 
                    }
                    ?>

                </div>

                <!-- sidebar end -->

            </div>

        <?php } ?>

    <?php } ?>

<?php } ?>