<?php
/* Adding Metabox For Album Pages */
add_action( 'add_meta_boxes', 'w_studio_albumMetaBoxes' );

/* Saving Post Data */
add_action( 'save_post', 'w_studio_saveAlbumData' );

/**
 * Function To Load Album MetaBoxes
 *
 */

function w_studio_albumMetaBoxes() {
    add_meta_box(
            'w-album-header',
            esc_html__( 'Album Meta Data', 'w-studio-plugin' ),
            'w_studio_albumHeaderMetabox',
            'album',
            'normal',
            'high'
        );
}

/**
 * Function Defining Album Header Metaboxes
 */

function w_studio_albumHeaderMetabox() {
    global $post_id;
    wp_nonce_field( 'w-album-header-options', 'w-album-header-nonce' );

    // Getting Previously Saved Values
    $w_studio_values             = get_post_custom( $post_id );

    $w_studio_albumImages    = isset( $w_studio_values['w-album-images'][0] ) ? unserialize( $w_studio_values['w-album-images'][0] ) : '';
    $w_studio_albumStyle     = isset( $w_studio_values['w-single-album-style'][0] ) ? esc_attr( $w_studio_values['w-single-album-style'][0] ) : '';
    $w_studio_albumSpace     = isset( $w_studio_values['w-single-album-space'][0] ) ? esc_attr( $w_studio_values['w-single-album-space'][0] ) : '';
        
    ?>

    <!-- Multiple Image Uploader -->
    <div class="w-header-meta">
        <label for="w-album-images"><?php esc_html_e( 'Upload Album Image', 'w-studio-plugin' ) ?></label>
        <div id="w-album-images" class="w-header-img-meta">
            <div id="w-album-images-wrapper">
                <?php
                if( $w_studio_albumImages ){
                    foreach( $w_studio_albumImages as $w_studio_images ){ ?>
						<small class="w-test">
						<span id="<?php echo esc_attr($w_studio_images); ?>" class="w-delete w-delete-image" onclick="deleteImage( this )" ></span>
                        <input type="text" name="w-album-images[]" id="w-album-images" class="<?php echo esc_attr($w_studio_images); ?>" value="<?php echo esc_attr($w_studio_images); ?>" style="display: none;" />
                        <img class="w-page-header-image-loader <?php echo esc_attr($w_studio_images); ?>" onmouseover="showClose(this)" onmouseout="hideClose( this )" value="<?php echo esc_attr($w_studio_images); ?>" src="<?php echo wp_get_attachment_url( $w_studio_images );?>" />
						</small>
                        <?php
                    }
                }
                ?> 
				<div class="w-clearfix"></div>
            </div>
            <input class="button" id="w-album-image-uploader-button" type="button" value="<?php esc_html_e( 'Choose Or Upload An Image', 'w-studio-plugin' )?>" />
        </div>
    </div>
    
    <!-- Select album Style -->
    <div class="w-header-meta">
        <label for="w-single-album-style"><?php esc_html_e( 'Select Galary Style', 'w-studio-plugin' ); ?></label>
        <select id="w-single-album-style" name="w-single-album-style">
            <option value="1" <?php selected( $w_studio_albumStyle, '1' );?>><?php esc_html_e( 'Two Column', 'w-studio-plugin' ); ?></option>
            <option value="2" <?php selected( $w_studio_albumStyle, '2' );?>><?php esc_html_e( 'Three Column', 'w-studio-plugin' ); ?></option>
            <option value="3" <?php selected( $w_studio_albumStyle, '3' );?>><?php esc_html_e( 'Four Column', 'w-studio-plugin' ); ?></option>
            <option value="4" <?php selected( $w_studio_albumStyle, '4' );?>><?php esc_html_e( 'Eight Column', 'w-studio-plugin' ); ?></option>
        </select>
    </div>

    <!-- Select Content Spacing -->
    <div class="w-header-meta">
        <label for="w-single-album-space"><?php esc_html_e( 'Galary Items Spacing Style', 'w-studio-plugin' ); ?></label>
        <select id="w-single-album-space" name="w-single-album-space">
            <option value="space" <?php selected( $w_studio_albumSpace, 'space' );?>><?php esc_html_e( 'With Spacing', 'w-studio-plugin' ); ?></option>
            <option value="no-space" <?php selected( $w_studio_albumSpace, 'no-space' );?>><?php esc_html_e( 'Without Space', 'w-studio-plugin' ); ?></option>
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
function w_studio_saveAlbumData( $post_id ){
    // Bail if doing auto save
    if( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) return;
    
    // Check for valib nonce
    if( !isset( $_POST['w-album-header-nonce'] ) || !wp_verify_nonce( $_POST['w-album-header-nonce'], 'w-album-header-options' ) ) return;
    
    // If current user can't edit this post
    if( !current_user_can( 'edit_posts' ) ) return;
    // Saving album meta data
    
    /* For Multiple Image Uploader  */
    $w_studio_images = array();
    if( isset( $_POST['w-album-images'] ) ){
        foreach( $_POST['w-album-images'] as $w_studio_image ){
            $w_studio_images['url'][]   = $w_studio_image;
        }
        update_post_meta( $post_id, 'w-album-images', $w_studio_images['url'] );
    }else{
    	$w_studio_images['url']	= '';
        delete_post_meta( $post_id, 'w-album-images', $w_studio_images['url'] );
    }
    
    // Single album Style
    if( isset( $_POST['w-single-album-style'] ) )
        update_post_meta( $post_id, 'w-single-album-style', $_POST['w-single-album-style'] );

    // Single album Spacing
    if( isset( $_POST['w-single-album-space'] ) )
        update_post_meta( $post_id, 'w-single-album-space', $_POST['w-single-album-space'] );
}