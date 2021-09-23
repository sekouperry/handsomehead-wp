<?php

//Adding Metaboxes For Team Pages
add_action('add_meta_boxes','w_studio_teamMetaBox',100);

/* Saving Post Data */
add_action('save_post', 'w_studio_teamMetaSave');

/**
 * function to add meta box
 * 
 * 
 */
function w_studio_teamMetaBox() {
        add_meta_box(
                'w-team-header',
                esc_html__( 'Team Meta Data', 'w-studio-plugin' ),
                'w_studio_teamSocialiconsMeta',
                'team',
                'normal',
                'low'
        );
}

/**
* Function To Generate Team Header Metabox Options
* 
*
*/
function w_studio_teamSocialiconsMeta() {

	wp_nonce_field('w-team-icon-options','w-team-icon-nonce');

	global $post_id;
	
	//check existing values
	$w_studio_values = get_post_custom($post_id);

	$w_studio_teamMember = isset( $w_studio_values['w-team-member-designation'][0] ) ? esc_attr( $w_studio_values['w-team-member-designation'][0] ) : '';
	$w_studio_enableIcons = isset( $w_studio_values['w-team-icons'][0] ) ? esc_attr( $w_studio_values['w-team-icons'][0] ) : '';
	$iconOneLink = isset( $w_studio_values['w-team-icon-facebook'][0] ) ? esc_attr( $w_studio_values['w-team-icon-facebook'][0] ) : '';
	$iconTwoLink = isset( $w_studio_values['w-team-icon-twitter'][0] ) ? esc_attr( $w_studio_values['w-team-icon-twitter'][0] ) : '';
	$iconThirdLink = isset( $w_studio_values['w-team-google-plus-link'][0] ) ? esc_attr( $w_studio_values['w-team-google-plus-link'][0] ) : '';
	$iconFourthLink = isset( $w_studio_values['w-team-pinterest-link'][0] ) ? esc_attr( $w_studio_values['w-team-pinterest-link'][0] ) : '';
	$iconFifthLink = isset( $w_studio_values['w-team-linkedin-link'][0] ) ? esc_attr( $w_studio_values['w-team-linkedin-link'][0] ) : '';

	?>
	<!-- Designation of team member -->
	<div class="w-header-meta">
    	<label for="w-team-member-designation"><?php esc_html_e( 'Member Designation', 'w-studio-plugin' ); ?></label>
    	<input id="w-team-member-designation" name="w-team-member-designation" type="text" value="<?php echo esc_attr($w_studio_teamMember); ?>" />
    </div>

	<!-- Enable Disable Social Icons -->
    <div class="w-header-meta">
        <label for="w-page-header"><?php esc_html_e( 'Show Social Icons', 'w-studio-plugin' );?></label>
        <input type="checkbox" id="w-team-icons" name="w-team-icons" <?php checked( $w_studio_enableIcons, 'on' )?> />
    </div>

    <div class="w-header-meta">
    	<label for="w-header-icon-link"><?php esc_html_e( 'Facebook Link', 'w-studio-plugin' ); ?></label>
    	<input id="w-team-icon-facebook" name="w-team-icon-facebook" type="text" value="<?php echo esc_attr($iconOneLink); ?>" />
    </div>

    <div class="w-header-meta">
    	<label for="w-header-icon-link"><?php esc_html_e( 'Twitter Link', 'w-studio-plugin' ); ?></label>
    	<input id="w-team-icon-twitter" name="w-team-icon-twitter" type="text" value="<?php echo esc_attr($iconTwoLink); ?>" />
    </div>

    <div class="w-header-meta">
    	<label for="w-header-icon-link"><?php esc_html_e( 'Google Plus Link', 'w-studio-plugin' ); ?></label>
    	<input id="w-team-google-plus-link" name="w-team-google-plus-link" type="text" value="<?php echo esc_attr($iconThirdLink); ?>" />
    </div>

    <div class="w-header-meta">
    	<label for="w-header-icon-link"><?php esc_html_e( 'Pinterest Link', 'w-studio-plugin' ); ?></label>
    	<input id="w-team-pinterest-link" name="w-team-pinterest-link" type="text" value="<?php echo esc_attr($iconFourthLink); ?>" />
    </div>

    <div class="w-header-meta">
    	<label for="w-header-icon-link"><?php esc_html_e( 'Linkedin Link', 'w-studio-plugin' ); ?></label>
    	<input id="w-team-linkedin-link" name="w-team-linkedin-link" type="text" value="<?php echo esc_attr($iconFifthLink); ?>" />
    </div>

<?php 
}	

/**
 * function to save user header data
 * 
 */
function w_studio_teamMetaSave( $post_id ) {

    //check autosave
    if (defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) return;

    //check for valid nonce
    if( !isset($_POST['w-team-icon-nonce']) || !wp_verify_nonce($_POST['w-team-icon-nonce'], 'w-team-icon-options'))
        return;

    //if current user can not edit
    if( !current_user_can('edit_posts')) return;

    //saving meta data
    //enable or disable meta header
    $w_studio_checkbox = isset($_POST['w-team-icons']) ? 'on' : 'off';
    update_post_meta( $post_id, 'w-team-icons', $w_studio_checkbox);

    //check icon one link
    if ( isset($_POST['w-team-member-designation'])) {
        update_post_meta( $post_id, 'w-team-member-designation', $_POST['w-team-member-designation'] );
    }
	//check icon one link
    if ( isset($_POST['w-team-icon-facebook'])) {
        update_post_meta( $post_id, 'w-team-icon-facebook', $_POST['w-team-icon-facebook'] );
    }

    //check icon two link
    if ( isset($_POST['w-team-icon-twitter'])) {
        update_post_meta( $post_id, 'w-team-icon-twitter', $_POST['w-team-icon-twitter'] );
    }

    //check icon third link
    if ( isset($_POST['w-team-google-plus-link'])) {
        update_post_meta( $post_id, 'w-team-google-plus-link', $_POST['w-team-google-plus-link'] );
    }

    //check icon fourth link
    if ( isset($_POST['w-team-pinterest-link'])) {
        update_post_meta( $post_id, 'w-team-pinterest-link', $_POST['w-team-pinterest-link'] );
    }

    //check icon fifth link
    if ( isset($_POST['w-team-linkedin-link'])) {
        update_post_meta( $post_id, 'w-team-linkedin-link', $_POST['w-team-linkedin-link'] );
    }
}
?>