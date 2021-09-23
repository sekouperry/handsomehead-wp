<?php
/* Adding Metabox For Testimonial Pages */
add_action( 'add_meta_boxes', 'w_studio_testimonialMetaBoxes' );

/* Saving Post Data */
add_action( 'save_post', 'w_studio_saveTestimonialData' );

/**
 * Function To Load testimonial MetaBoxes
 *
 */

function w_studio_testimonialMetaBoxes() {
    add_meta_box(
            'w-testimonial-header',
            esc_html__( 'Testimonial Quote', 'w-studio-plugin' ),
            'w_studio_testimonialHeaderMetabox',
            'testimonial',
            'normal',
            'high'
        );
}

/**
 * Function Defining Testimonial Header Metaboxes
 * 
 *
 */

function w_studio_testimonialHeaderMetabox() {
    global $post_id;
    wp_nonce_field( 'w-testimonial-header-options', 'w-testimonial-header-nonce' );

    // Getting Previously Saved Values
    $w_studio_values = get_post_custom( $post_id );
    
    $w_studio_testimonialQuote = isset( $w_studio_values['w-testimonial-quote'][0] ) ? esc_attr( $w_studio_values['w-testimonial-quote'][0] ) : '';
    $w_studio_testimonialDesignation = isset( $w_studio_values['w-testimonial-designation'][0] ) ? esc_attr( $w_studio_values['w-testimonial-designation'][0] ) : '';

    ?>
	
    <!-- testimonial Name -->
    <div class="w-header-meta">
        <label for="w-testimonial-quote"><?php esc_html_e( 'Testimonial Quote', 'w-studio-plugin' ) ?></label>
        <textarea rows="5" cols="50" name="w-testimonial-quote" id="w-testimonial-quote"><?php echo esc_attr($w_studio_testimonialQuote); ?></textarea>
    </div>
	
    <!-- testimonial Designation -->
    <div class="w-header-meta">
        <label for="w-testimonial-designation"><?php esc_html_e( 'Testimonial Designation', 'w-studio-plugin' ) ?></label>
        <input size="50" type="text" name="w-testimonial-designation" id="w-testimonial-designation" value="<?php echo esc_attr($w_studio_testimonialDesignation); ?>" />
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
function w_studio_saveTestimonialData( $post_id ){
    
	// Bail if doing auto save
    if( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) return;
    
    // Check for valib nonce
    if( !isset( $_POST['w-testimonial-header-nonce'] ) || !wp_verify_nonce( $_POST['w-testimonial-header-nonce'], 'w-testimonial-header-options' ) ) return;
    
    // If current user can't edit this post
    if( !current_user_can( 'edit_posts' ) ) return;


    // Saving testimonial meta data
    
	// testimonial Name
    if( isset( $_POST['w-testimonial-quote'] ) )
        update_post_meta( $post_id, 'w-testimonial-quote', $_POST['w-testimonial-quote'] );
	
    // testimonial Designation
    if( isset( $_POST['w-testimonial-designation'] ) )
        update_post_meta( $post_id, 'w-testimonial-designation', $_POST['w-testimonial-designation'] );

}