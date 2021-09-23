<?php

/* Adding Metaboxes For Posts */

add_action( 'add_meta_boxes' , 'w_studio_additionalSliderMetaBoxes' , 100 );



/* Saving Slider Post Data */

add_action( 'save_post' , 'w_studio_saveSliderData' );



/*

 * Function to add metabox

 * 

 *

 */

function w_studio_additionalSliderMetaBoxes() {

    add_meta_box( 'w-post-header' , esc_html__( 'Slider Settings' , 'w-studio' ) , 'w_studio_sliderHeader' , 'slider' , 'normal' , 'high' );

}



/**

 * Function To Generate Page Header Metabox Options

 *

 *

 */

function w_studio_sliderHeader() {



    wp_nonce_field( 'w-slider-header-options' , 'w-slider-header-nonce' );



    global $post_id;

    // Getting Previously Saved Values

    $w_studio_values = get_post_custom( $post_id );
	
    $w_studio_bgOverlayColor = isset( $w_studio_values[ 'w-slider-background-overlay-color' ][ 0 ] ) ? esc_attr( $w_studio_values[ 'w-slider-background-overlay-color' ][ 0 ] ) : '';
	
    $w_studio_bgOpacity = isset( $w_studio_values[ 'w-slider-background-opacity' ][ 0 ] ) ? esc_attr( $w_studio_values[ 'w-slider-background-opacity' ][ 0 ] ) : '';

    $w_studio_title_font_size = isset( $w_studio_values[ 'w-slider-title-font-size' ][ 0 ] ) ? esc_attr( $w_studio_values[ 'w-slider-title-font-size' ][ 0 ] ) : '';
    
	$w_studio_title_line_height = isset( $w_studio_values[ 'w-slider-title-line-height' ][ 0 ] ) ? esc_attr( $w_studio_values[ 'w-slider-title-line-height' ][ 0 ] ) : '';
	
	$w_studio_headerFontColor = isset( $w_studio_values[ 'w-slider-title-font-color' ][ 0 ] ) ? esc_attr( $w_studio_values[ 'w-slider-title-font-color' ][ 0 ] ) : '';
	
	$w_studio_content_font_size = isset( $w_studio_values[ 'w-slider-content-font-size' ][ 0 ] ) ? esc_attr( $w_studio_values[ 'w-slider-content-font-size' ][ 0 ] ) : '';
    
	$w_studio_content_line_height = isset( $w_studio_values[ 'w-slider-content-line-height' ][ 0 ] ) ? esc_attr( $w_studio_values[ 'w-slider-content-line-height' ][ 0 ] ) : '';

	$w_studio_content_font_color = isset( $w_studio_values[ 'w-slider-content-font-color' ][ 0 ] ) ? esc_attr( $w_studio_values[ 'w-slider-content-font-color' ][ 0 ] ) : '';
	
	$w_studio_slider_content_alignment = isset( $w_studio_values[ 'w-slider-content-alignment' ][ 0 ] ) ? esc_attr( $w_studio_values[ 'w-slider-content-alignment' ][ 0 ] ) : '';
	
	$w_studio_slider_content_hori_alignment = isset( $w_studio_values[ 'w-slider-content-hori-alignment' ][ 0 ] ) ? esc_attr( $w_studio_values[ 'w-slider-content-hori-alignment' ][ 0 ] ) : '';
	?>

	<!-- Background Overlay Color -->
    <div class="w-header-meta">
        <label for="w-slider-background-overlay-color"><?php esc_html_e( 'Image Overlay Color' , 'w-studio' ) ?></label>
        <input class="w-color-field" id="w-slider-background-overlay-color" name="w-slider-background-overlay-color" type="text" value="<?php echo esc_attr( $w_studio_bgOverlayColor ); ?>"/>
    </div>
	
	<!-- Sidebar Loading Option -->
    <div class="w-header-meta">
        <label for="w-slider-background-opacity"><?php esc_html_e( 'Overlay Opacity' , 'w-studio' ); ?></label>
        <select name="w-slider-background-opacity" id="w-slider-background-opacity">
                <option value="select" <?php selected( $w_studio_bgOpacity, 'selected="selected' ); ?>><?php esc_html_e( 'Select Opacity', 'w-studio' ); ?></option>
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

	 <!-- Title font size -->
    <div class="w-header-meta">
        <label for="w-slider-title-font-size"><?php esc_html_e( 'Title Font Size' , 'w-studio' ) ?></label>
        <input type="text" name="w-slider-title-font-size" id="w-slider-title-font-size" value="<?php echo esc_attr( $w_studio_title_font_size ); ?>"/><?php esc_html_e( 'px', 'w-studio' ); ?>
    </div>
	
	 <!-- Title line height -->
    <div class="w-header-meta">
        <label for="w-slider-title-line-height"><?php esc_html_e( 'Title Line Height' , 'w-studio' ) ?></label>
        <input type="text" name="w-slider-title-line-height" id="w-slider-title-line-height" value="<?php echo esc_attr( $w_studio_title_line_height ); ?>"/><?php esc_html_e( 'px', 'w-studio' ); ?>
    </div>
	
    <!-- Header Title Font Color -->
    <div class="w-header-meta">
        <label for="w-slider-title-font-color"><?php esc_html_e( 'Title Color' , 'w-studio' ) ?></label>
        <input class="w-color-field" id="w-slider-title-font-color" name="w-slider-title-font-color" type="text" value="<?php echo esc_attr( $w_studio_headerFontColor ); ?>"/>
    </div>
	
	 <!-- Content font size -->
    <div class="w-header-meta">
        <label for="w-slider-content-font-size"><?php esc_html_e( 'Content Font Size' , 'w-studio' ) ?></label>
        <input type="text" name="w-slider-content-font-size" id="w-slider-content-font-size" value="<?php echo esc_attr( $w_studio_content_font_size ); ?>"/><?php esc_html_e( 'px', 'w-studio' ); ?>
    </div>
	
	 <!-- Content line height -->
    <div class="w-header-meta">
        <label for="w-slider-content-line-height"><?php esc_html_e( 'Content Line Height' , 'w-studio' ) ?></label>
        <input type="text" name="w-slider-content-line-height" id="w-slider-content-line-height" value="<?php echo esc_attr( $w_studio_content_line_height ); ?>"/><?php esc_html_e( 'px', 'w-studio' ); ?>
    </div>

	<!-- Category Font Color -->
    <div class="w-header-meta">
        <label for="w-slider-content-font-color"><?php esc_html_e( 'Content Color' , 'w-studio' ) ?></label>
        <input class="w-color-field" id="w-slider-content-font-color" name="w-slider-content-font-color" type="text" value="<?php echo esc_attr( $w_studio_content_font_color ); ?>"/>
    </div>
	
	<!-- Slider Content Horizontal alignment -->
    <div class="w-header-meta">
        <label for="w-slider-content-alignment"><?php esc_html_e( 'Content Horizontal  Alignment' , 'w-studio' ); ?></label>
        <select name="w-slider-content-alignment" id="w-slider-content-alignment">
            <option value="left" <?php selected( $w_studio_slider_content_alignment , 'left' ); ?>><?php esc_html_e( 'Left' , 'w-studio' ); ?></option>
            <option value="center" <?php selected( $w_studio_slider_content_alignment , 'center' ); ?>><?php esc_html_e( 'Center' , 'w-studio' ); ?></option>
            <option value="right" <?php selected( $w_studio_slider_content_alignment , 'right' ); ?>><?php esc_html_e( 'Right' , 'w-studio' ); ?></option>
        </select>
    </div>
	
	<!-- Slider Content Vertical alignment -->
    <div class="w-header-meta">
        <label for="w-slider-content-hori-alignment"><?php esc_html_e( 'Content Vertical Alignment' , 'w-studio' ); ?></label>
        <select name="w-slider-content-hori-alignment" id="w-slider-content-hori-alignment">
            <option value="top" <?php selected( $w_studio_slider_content_hori_alignment , 'top' ); ?>><?php esc_html_e( 'Top' , 'w-studio' ); ?></option>
            <option value="middle" <?php selected( $w_studio_slider_content_hori_alignment , 'middle' ); ?>><?php esc_html_e( 'Center' , 'w-studio' ); ?></option>
            <option value="bottom" <?php selected( $w_studio_slider_content_hori_alignment , 'bottom' ); ?>><?php esc_html_e( 'Bottom' , 'w-studio' ); ?></option>
        </select>
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

function w_studio_saveSliderData( $post_id ) {

    // Bail if doing auto save

    if( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) return;



    // Check for valid nonce

    if( !isset( $_POST[ 'w-slider-header-nonce' ] ) || !wp_verify_nonce( $_POST[ 'w-slider-header-nonce' ] , 'w-slider-header-options' ) ) return;



    // If current user can't edit this post

    if( !current_user_can( 'edit_posts' ) ) return;



    // Saving slider post meta data

	//  Background Overlay color
    if( isset( $_POST[ 'w-slider-background-overlay-color' ] ) ) update_post_meta( $post_id , 'w-slider-background-overlay-color' , esc_attr( $_POST[ 'w-slider-background-overlay-color' ] ) );
	
	// Background Opacity select
    if( isset( $_POST[ 'w-slider-background-opacity' ] ) ) update_post_meta( $post_id , 'w-slider-background-opacity' , esc_attr( $_POST[ 'w-slider-background-opacity' ] ) );
	
	//  Title Font size
    if( isset( $_POST[ 'w-slider-title-font-size' ] ) ) update_post_meta( $post_id , 'w-slider-title-font-size' , esc_attr( $_POST[ 'w-slider-title-font-size' ] ) );
	
	//  Title line height
    if( isset( $_POST[ 'w-slider-title-line-height' ] ) ) update_post_meta( $post_id , 'w-slider-title-line-height' , esc_attr( $_POST[ 'w-slider-title-line-height' ] ) );
	
    //  Title Font color
    if( isset( $_POST[ 'w-slider-title-font-color' ] ) ) update_post_meta( $post_id , 'w-slider-title-font-color' , esc_attr( $_POST[ 'w-slider-title-font-color' ] ) );
	
	//  Content Font size
    if( isset( $_POST[ 'w-slider-content-font-size' ] ) ) update_post_meta( $post_id , 'w-slider-content-font-size' , esc_attr( $_POST[ 'w-slider-content-font-size' ] ) );
	
	//  Content line height
    if( isset( $_POST[ 'w-slider-content-line-height' ] ) ) update_post_meta( $post_id , 'w-slider-content-line-height' , esc_attr( $_POST[ 'w-slider-content-line-height' ] ) );

	//  Content Font color
    if( isset( $_POST[ 'w-slider-content-font-color' ] ) ) update_post_meta( $post_id , 'w-slider-content-font-color' , esc_attr( $_POST[ 'w-slider-content-font-color' ] ) );

	// Page title alignment
    if( isset( $_POST[ 'w-slider-content-alignment' ] ) ) update_post_meta( $post_id , 'w-slider-content-alignment' , esc_attr( $_POST[ 'w-slider-content-alignment' ] ) );
	
	// Page title alignment
    if( isset( $_POST[ 'w-slider-content-hori-alignment' ] ) ) update_post_meta( $post_id , 'w-slider-content-hori-alignment' , esc_attr( $_POST[ 'w-slider-content-hori-alignment' ] ) );
}