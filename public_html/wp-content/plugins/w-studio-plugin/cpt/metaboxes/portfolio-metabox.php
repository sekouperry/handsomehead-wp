<?php
/* Adding Metabox For Portfolio Pages */
add_action( 'add_meta_boxes', 'w_studio_portfolioMetaBoxes' );

/* Saving Post Data */
add_action( 'save_post', 'w_studio_savePortfolioData' );

/**
 * Function To Load Portfolio MetaBoxes
 *
 */

function w_studio_portfolioMetaBoxes() {
    add_meta_box(
            'w-portfolio-header',
            esc_html__( 'Portfolio Meta Data', 'w-studio-plugin' ),
            'w_studio_portfolioHeaderMetabox',
            'portfolio',
            'normal',
            'high'
        );
}

/**
 * Function Defining Portfolio Header Metaboxes
 * 
 *
 */

function w_studio_portfolioHeaderMetabox() {
    global $post_id;
    wp_nonce_field( 'w-portfolio-header-options', 'w-portfolio-header-nonce' );

    // Getting Previously Saved Values
    $w_studio_values             = get_post_custom( $post_id );
    
    $w_studio_projectDate        = isset( $w_studio_values['w-portfolio-project-date'][0] ) ? esc_attr( $w_studio_values['w-portfolio-project-date'][0] ) : '';
    $w_studio_projectClient      = isset( $w_studio_values['w-portfolio-project-client'][0] ) ? esc_attr( $w_studio_values['w-portfolio-project-client'][0] ) : '';
    $w_studio_projectLink        = isset( $w_studio_values['w-portfolio-project-link'][0] ) ? esc_attr( $w_studio_values['w-portfolio-project-link'][0] ) : '';
    $w_studio_hideCategory       = isset( $w_studio_values['w-hide-portfolio-category'][0] ) ? esc_attr( $w_studio_values['w-hide-portfolio-category'][0] ) : '';
    $w_studio_portfolioImages    = isset( $w_studio_values['w-portfolio-images'][0] ) ? unserialize( $w_studio_values['w-portfolio-images'][0] ) : '';
    $w_studio_portfolioStyle     = isset( $w_studio_values['w-single-portfolio-style'][0] ) ? esc_attr( $w_studio_values['w-single-portfolio-style'][0] ) : '';
        
    ?>
	
    <!-- Portfolio Project Date -->
    <div class="w-header-meta">
        <label for="w-portfolio-project-date"><?php esc_html_e( 'Portfolio Project Date', 'w-studio-plugin' ) ?></label>
        <input type="date" name="w-portfolio-project-date" id="w-portfolio-project-date" value="<?php echo esc_attr($w_studio_projectDate); ?>" />
    </div>
	
    <!-- Portfolio Project Client -->
    <div class="w-header-meta">
        <label for="w-portfolio-project-client"><?php esc_html_e( 'Portfolio Project Client', 'w-studio-plugin' ) ?></label>
        <input type="textarea" name="w-portfolio-project-client" id="w-portfolio-project-client" value="<?php echo esc_attr($w_studio_projectClient); ?>" />
    </div>
	
    <!-- Portfolio Project Link -->
    <div class="w-header-meta">
        <label for="w-portfolio-project-link"><?php esc_html_e( 'Portfolio Project Link', 'w-studio-plugin' ) ?></label>
        <input type="textarea" name="w-portfolio-project-link" id="w-portfolio-project-link" value="<?php echo esc_attr($w_studio_projectLink); ?>" />
    </div>
	
	<!-- Portfolio category show/hide -->
    <div class="w-header-meta">
        <label for="w-hide-portfolio-category"><?php esc_html_e( 'Hide Category' , 'w-studio' ); ?></label>
        <input type="checkbox" id="w-hide-portfolio-category"
               name="w-hide-portfolio-category" <?php checked( $w_studio_hideCategory , 'on' ); ?> />
    </div>

    <!-- Multiple Image Uploader -->
    <div class="w-header-meta">
        <label for="w-portfolio-images"><?php esc_html_e( 'Upload Portfolio Image', 'w-studio-plugin' ) ?></label>
        <div id="w-portfolio-images" class="w-header-img-meta">
            <div id="w-portfolio-images-wrapper">
                <?php
                if( $w_studio_portfolioImages ){
                    foreach( $w_studio_portfolioImages as $w_studio_images ){ ?>
						<small class="w-test">
						<span id="<?php echo esc_attr($w_studio_images); ?>" class="w-delete w-delete-image" onclick="deleteImage( this )" ></span>
                        <input type="text" name="w-portfolio-images[]" id="w-portfolio-images" class="<?php echo esc_attr($w_studio_images); ?>" value="<?php echo esc_attr($w_studio_images); ?>" style="display: none;" />
                        <img class="w-page-header-image-loader <?php echo esc_attr($w_studio_images); ?>" onmouseover="showClose(this)" onmouseout="hideClose( this )" value="<?php echo esc_attr($w_studio_images); ?>" src="<?php echo wp_get_attachment_url( $w_studio_images );?>" />
						</small>
                        <?php
                    }
                }
                ?> 
				<div class="w-clearfix"></div>
            </div>
            <input class="button" id="w-portfolio-image-uploader-button" type="button" value="<?php esc_html_e( 'Choose Or Upload An Image', 'w-studio-plugin' )?>" />
        </div>
    </div>
    
    <!-- Select Portfolio Style -->
    <div class="w-header-meta">
        <label for="w-single-portfolio-style"><?php esc_html_e( 'Select Portfolio Style', 'w-studio-plugin' ); ?></label>
        <select id="w-single-portfolio-style" name="w-single-portfolio-style">
            <option value="1" <?php selected( $w_studio_portfolioStyle, '1' );?>><?php esc_html_e( '1', 'w-studio-plugin' ); ?></option>
            <option value="2" <?php selected( $w_studio_portfolioStyle, '2' );?>><?php esc_html_e( '2', 'w-studio-plugin' ); ?></option>
            <option value="3" <?php selected( $w_studio_portfolioStyle, '3' );?>><?php esc_html_e( '3', 'w-studio-plugin' ); ?></option>
            <option value="4" <?php selected( $w_studio_portfolioStyle, '4' );?>><?php esc_html_e( '4', 'w-studio-plugin' ); ?></option>
            <option value="5" <?php selected( $w_studio_portfolioStyle, '5' );?>><?php esc_html_e( '5', 'w-studio-plugin' ); ?></option>
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
function w_studio_savePortfolioData( $post_id ){
    // Bail if doing auto save
    if( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) return;
    
    // Check for valib nonce
    if( !isset( $_POST['w-portfolio-header-nonce'] ) || !wp_verify_nonce( $_POST['w-portfolio-header-nonce'], 'w-portfolio-header-options' ) ) return;
    
    // If current user can't edit this post
    if( !current_user_can( 'edit_posts' ) ) return;
    // Saving portfolio meta data
    
    // Enable Disable portfolio Header
    $w_studio_checkbox   = isset( $_POST['w-portfolio-header-checkbox'] ) ? 'on' : 'off';
    update_post_meta( $post_id, 'w-portfolio-header-checkbox', $w_studio_checkbox );
    
    	
    // Portfolio Project Date
    if( isset( $_POST['w-portfolio-project-date'] ) )
        update_post_meta( $post_id, 'w-portfolio-project-date', $_POST['w-portfolio-project-date'] );
	
    // Portfolio Project Client
    if( isset( $_POST['w-portfolio-project-client'] ) )
        update_post_meta( $post_id, 'w-portfolio-project-client', $_POST['w-portfolio-project-client'] );
	
    // Portfolio Project Link
    if( isset( $_POST['w-portfolio-project-link'] ) )
        update_post_meta( $post_id, 'w-portfolio-project-link', $_POST['w-portfolio-project-link'] );
    
	//Hide page Title
    $w_studio_checkCategory = isset( $_POST[ 'w-hide-portfolio-category' ] ) ? 'on' : 'off';
    update_post_meta( $post_id , 'w-hide-portfolio-category' , $w_studio_checkCategory );
	
    /* For Multiple Image Uploader  */
    $w_studio_images = array();
    if( isset( $_POST['w-portfolio-images'] ) ){
        foreach( $_POST['w-portfolio-images'] as $w_studio_image ){
            $w_studio_images['url'][]   = $w_studio_image;
        }
        update_post_meta( $post_id, 'w-portfolio-images', $w_studio_images['url'] );
    }else{
    	$w_studio_images['url']	= '';
        delete_post_meta( $post_id, 'w-portfolio-images', $w_studio_images['url'] );
    }
    
    // Single Portfolio Style
    if( isset( $_POST['w-single-portfolio-style'] ) )
        update_post_meta( $post_id, 'w-single-portfolio-style', $_POST['w-single-portfolio-style'] );
}