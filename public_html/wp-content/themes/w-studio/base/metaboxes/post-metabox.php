<?php

/* Adding Metaboxes For Posts */

add_action( 'add_meta_boxes' , 'w_studio_additionalPostMetaBoxes' , 100 );



/* Saving Post Data */

add_action( 'save_post' , 'w_studio_savePostData' );



/*

 * Function to add metabox

 * 

 *

 */

function w_studio_additionalPostMetaBoxes() {

    add_meta_box( 'w-post-header' , esc_html__( 'Post Settings' , 'w-studio' ) , 'w_studio_postHeader' , 'post' , 'normal' , 'high' );

}



/**

 * Function To Generate Page Header Metabox Options

 *

 *

 */

function w_studio_postHeader() {



    wp_nonce_field( 'w-post-header-options' , 'w-post-header-nonce' );



    global $post_id;

    // Getting Previously Saved Values

    $w_studio_values = get_post_custom( $post_id );

    $w_studio_loadBannerInContainer = isset( $w_studio_values[ 'w-post-banner-container' ][ 0 ] ) ? esc_attr( $w_studio_values[ 'w-post-banner-container' ][ 0 ] ) : '';

    $w_studio_bannerHead = isset( $w_studio_values[ 'w-post-banner-head' ][ 0 ] ) ? esc_attr( $w_studio_values[ 'w-post-banner-head' ][ 0 ] ) : '';

    $w_studio_sidebarType = isset( $w_studio_values[ 'w-post-sidebar' ][ 0 ] ) ? esc_attr( $w_studio_values[ 'w-post-sidebar' ][ 0 ] ) : '';

    $w_studio_sidebarLoad = isset( $w_studio_values[ 'w-post-load-sidebar' ][ 0 ] ) ? esc_attr( $w_studio_values[ 'w-post-load-sidebar' ][ 0 ] ) : '';
	
    $w_studio_bgOverlayColor = isset( $w_studio_values[ 'w-post-background-overlay-color' ][ 0 ] ) ? esc_attr( $w_studio_values[ 'w-post-background-overlay-color' ][ 0 ] ) : '';
	
    $w_studio_bgOpacity = isset( $w_studio_values[ 'w-post-background-opacity' ][ 0 ] ) ? esc_attr( $w_studio_values[ 'w-post-background-opacity' ][ 0 ] ) : '';

    $w_studio_headerFontColor = isset( $w_studio_values[ 'w-post-header-font-color' ][ 0 ] ) ? esc_attr( $w_studio_values[ 'w-post-header-font-color' ][ 0 ] ) : '';

	$w_studio_categoryFontColor = isset( $w_studio_values[ 'w-post-category-font-color' ][ 0 ] ) ? esc_attr( $w_studio_values[ 'w-post-category-font-color' ][ 0 ] ) : '';
	
	$w_studio_metaFontColor = isset( $w_studio_values[ 'w-post-meta-font-color' ][ 0 ] ) ? esc_attr( $w_studio_values[ 'w-post-meta-font-color' ][ 0 ] ) : '';

    ?>

    <!-- Banner Container -->
    <div class="w-header-meta">	
		<label for="w-post-banner-container"><?php esc_html_e( 'Choose Banner Display' , 'w-studio' ); ?></label>
		<select name="w-post-banner-container" id="w-post-banner-container">
            <option
                value="default" <?php selected( $w_studio_loadBannerInContainer , 'default' ); ?>><?php esc_html_e( 'Default Banner' , 'w-studio' ); ?></option>
            <option value="container" <?php selected( $w_studio_loadBannerInContainer , 'container' ); ?>><?php esc_html_e( 'In Container' , 'w-studio' ); ?></option>
            <option value="fullwidth" <?php selected( $w_studio_loadBannerInContainer , 'fullwidth' ); ?>><?php esc_html_e( 'Full Width' , 'w-studio' ); ?></option>
        </select>
    </div>

	<!-- Banner Title, Meta -->
    <div class="w-header-meta">	
		<label for="w-post-banner-head"><?php esc_html_e( 'Choose Title, Meta Display' , 'w-studio' ); ?></label>
		<select name="w-post-banner-head" id="w-post-banner-head">
            <option
                value="default" <?php selected( $w_studio_bannerHead , 'default' ); ?>><?php esc_html_e( 'Default' , 'w-studio' ); ?></option>
            <option value="on-banner" <?php selected( $w_studio_bannerHead , 'on-banner' ); ?>><?php esc_html_e( 'On Banner' , 'w-studio' ); ?></option>
            <option value="below-banner" <?php selected( $w_studio_bannerHead , 'below-banner' ); ?>><?php esc_html_e( 'Below Banner' , 'w-studio' ); ?></option>
        </select>
    </div>

    <!-- Sidebar Option -->
    <div class="w-header-meta">
        <label for="w-post-sidebar"><?php esc_html_e( 'Choose Sidebar Position' , 'w-studio' ); ?></label>
        <select name="w-post-sidebar" id="w-post-sidebar">
            <option
                value="no-sidebar" <?php selected( $w_studio_sidebarType , 'no-sidebar' ); ?>><?php esc_html_e( 'No Sidebar' , 'w-studio' ); ?></option>
            <option
                value="2" <?php selected( $w_studio_sidebarType , '2' ); ?>><?php esc_html_e( 'Left' , 'w-studio' ); ?></option>
            <option
                value="3" <?php selected( $w_studio_sidebarType , '3' ); ?>><?php esc_html_e( 'Right' , 'w-studio' ); ?></option>
        </select>
    </div>



    <!-- Sidebar Loading Option -->
    <div class="w-header-meta">
        <label for="w-post-load-sidebar"><?php esc_html_e( 'Choose Sidebar To Load' , 'w-studio' ); ?></label>
        <select name="w-post-load-sidebar" id="w-post-load-sidebar">
            <?php
            global $wp_registered_sidebars;
            foreach( $wp_registered_sidebars as $w_studio_sideBar ) {
                ?>
                <option
                    value="<?php echo esc_attr( $w_studio_sideBar[ 'id' ] ); ?>" <?php selected( $w_studio_sidebarLoad , $w_studio_sideBar[ 'id' ] ); ?>><?php echo esc_attr( $w_studio_sideBar[ 'name' ] ); ?></option>
            <?php } ?>
        </select>
    </div>
	
	<!-- Background Overlay Color -->
    <div class="w-header-meta">
        <label for="w-post-background-overlay-color"><?php esc_html_e( 'Choose Background Overlay Color' , 'w-studio' ) ?></label>
        <input class="w-color-field" id="w-post-background-overlay-color" name="w-post-background-overlay-color" type="text" value="<?php echo esc_attr( $w_studio_bgOverlayColor ); ?>"/>
    </div>
	
	<!-- Sidebar Loading Option -->
    <div class="w-header-meta">
        <label for="w-post-background-opacity"><?php esc_html_e( 'Set Background Opacity' , 'w-studio' ); ?></label>
        <select name="w-post-background-opacity" id="w-post-background-opacity">
                <option value="select" <?php selected( $w_studio_bgOpacity, 'selected="selected' ); ?>>Select Background Opacity</option>
                <option value="0" <?php selected( $w_studio_bgOpacity, '0' ); ?>>0.0</option>
                <option value="0.1" <?php selected( $w_studio_bgOpacity, '0.1' ); ?>>0.1</option>
                <option value="0.2" <?php selected( $w_studio_bgOpacity, '0.2' ); ?>>0.2</option>
                <option value="0.3" <?php selected( $w_studio_bgOpacity, '0.3' ); ?>>0.3</option>
                <option value="0.4" <?php selected( $w_studio_bgOpacity, '0.4' ); ?>>0.4</option>
                <option value="0.5" <?php selected( $w_studio_bgOpacity, '0.5' ); ?>>0.5</option>
                <option value="0.6" <?php selected( $w_studio_bgOpacity, '0.6' ); ?>>0.6</option>
                <option value="0.7" <?php selected( $w_studio_bgOpacity, '0.7' ); ?>>0.7</option>
                <option value="0.8" <?php selected( $w_studio_bgOpacity, '0.8' ); ?>>0.8</option>
                <option value="0.9" <?php selected( $w_studio_bgOpacity, '0.9' ); ?>>0.9</option>
                <option value="1" <?php selected( $w_studio_bgOpacity, '1' ); ?>>1.0</option>
        </select>
    </div>

    <!-- Header Title Font Color -->
    <div class="w-header-meta">
        <label for="w-post-header-font-color"><?php esc_html_e( 'Choose Title Color' , 'w-studio' ) ?></label>
        <input class="w-color-field" id="w-post-header-font-color" name="w-post-header-font-color" type="text" value="<?php echo esc_attr( $w_studio_headerFontColor ); ?>"/>
    </div>

	<!-- Category Font Color -->
    <div class="w-header-meta">
        <label for="w-post-category-font-color"><?php esc_html_e( 'Choose Category Color' , 'w-studio' ) ?></label>
        <input class="w-color-field" id="w-post-category-font-color" name="w-post-category-font-color" type="text" value="<?php echo esc_attr( $w_studio_categoryFontColor ); ?>"/>
    </div>
	
	<!-- Meta Font Color -->
    <div class="w-header-meta">
        <label for="w-post-meta-font-color"><?php esc_html_e( 'Choose Meta Color' , 'w-studio' ) ?></label>
        <input class="w-color-field" id="w-post-meta-font-color" name="w-post-meta-font-color" type="text" value="<?php echo esc_attr( $w_studio_metaFontColor ); ?>"/>
    </div>

<?php

}



/**

 * Function to save user data

 *

 * @param integer $post_id Current Post ID

 *

 * @return

 */

function w_studio_savePostData( $post_id ) {

    // Bail if doing auto save

    if( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) return;



    // Check for valid nonce

    if( !isset( $_POST[ 'w-post-header-nonce' ] ) || !wp_verify_nonce( $_POST[ 'w-post-header-nonce' ] , 'w-post-header-options' ) ) return;



    // If current user can't edit this post

    if( !current_user_can( 'edit_posts' ) ) return;



    // Saving post meta data



    // Banner Container
	if( isset( $_POST[ 'w-post-banner-container' ] ) ) update_post_meta( $post_id , 'w-post-banner-container' , esc_attr( $_POST[ 'w-post-banner-container' ] ) );
   
   // Banner Title, Meta
	if( isset( $_POST[ 'w-post-banner-head' ] ) ) update_post_meta( $post_id , 'w-post-banner-head' , esc_attr( $_POST[ 'w-post-banner-head' ] ) );
    
	//  Background Overlay color
    if( isset( $_POST[ 'w-post-background-overlay-color' ] ) ) update_post_meta( $post_id , 'w-post-background-overlay-color' , esc_attr( $_POST[ 'w-post-background-overlay-color' ] ) );
	
	// Background Opacity select
    if( isset( $_POST[ 'w-post-background-opacity' ] ) ) update_post_meta( $post_id , 'w-post-background-opacity' , esc_attr( $_POST[ 'w-post-background-opacity' ] ) );
	
    //  Title Font color
    if( isset( $_POST[ 'w-post-header-font-color' ] ) ) update_post_meta( $post_id , 'w-post-header-font-color' , esc_attr( $_POST[ 'w-post-header-font-color' ] ) );

	//  Category Font color
    if( isset( $_POST[ 'w-post-category-font-color' ] ) ) update_post_meta( $post_id , 'w-post-category-font-color' , esc_attr( $_POST[ 'w-post-category-font-color' ] ) );

	//  Meta Font color
    if( isset( $_POST[ 'w-post-meta-font-color' ] ) ) update_post_meta( $post_id , 'w-post-meta-font-color' , esc_attr( $_POST[ 'w-post-meta-font-color' ] ) );

    // Sidebar Type
    if( isset( $_POST[ 'w-post-sidebar' ] ) ) update_post_meta( $post_id , 'w-post-sidebar' , esc_attr( $_POST[ 'w-post-sidebar' ] ) );

    // Sidebar Load
    if( isset( $_POST[ 'w-post-load-sidebar' ] ) ) update_post_meta( $post_id , 'w-post-load-sidebar' , esc_attr( $_POST[ 'w-post-load-sidebar' ] ) );

}