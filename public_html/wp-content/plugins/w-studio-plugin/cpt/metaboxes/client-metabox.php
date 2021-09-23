<?php
/* Adding Metabox For client Pages */
add_action( 'add_meta_boxes', 'w_studio_clientMetaboxes' );

/* Saving Post Data */
add_action( 'save_post', 'w_studio_saveClientData' );

/**
 * Function To Load Client MetaBoxes
 *
 */

function w_studio_clientMetaboxes() {
    add_meta_box(
        'w-client-header',
        esc_html__( 'Client Setting', 'w-studio-plugin' ),
        'w_studio_clientHeaderMetabox',
        'client',
        'normal',
        'high'
    );
}

/**
 * Function Defining Client Metaboxes
 *
 *
 */

function w_studio_clientHeaderMetabox() {
    global $post_id;
    wp_nonce_field( 'w-client-header-options', 'w-client-header-nonce' );

    // Getting Previously Saved Values
    $w_studio_values = get_post_custom( $post_id );

    $w_studio_clientLogoLink = isset( $w_studio_values['w-client-logo-link'][0] ) ? esc_attr( $w_studio_values['w-client-logo-link'][0] ) : '';

    ?>

    <div class="w-header-meta">
        <label for="w-client-logo-link"><?php esc_html_e( 'Client Logo Link', 'w-studio-plugin' ) ?></label>
        <input type="url" name="w-client-logo-link" id="w-client-logo-link" value="<?php echo esc_attr($w_studio_clientLogoLink); ?>" />
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
function w_studio_saveClientData( $post_id ){

    // Bail if doing auto save
    if( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) return;

    // Check for valib nonce
    if( !isset( $_POST['w-client-header-nonce'] ) || !wp_verify_nonce( $_POST['w-client-header-nonce'], 'w-client-header-options' ) ) return;

    // If current user can't edit this post
    if( !current_user_can( 'edit_posts' ) ) return;


    // Saving client meta data
    if( isset( $_POST['w-client-logo-link'] ) )
        update_post_meta( $post_id, 'w-client-logo-link', $_POST['w-client-logo-link'] );
}