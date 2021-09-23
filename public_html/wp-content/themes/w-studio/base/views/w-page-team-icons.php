<?php



// Adding function to w_studio_studio_header hook

add_action( 'w_studio_studio_team_icons', 'w_studio_teamSocialicons' );



/*

 * Function To Load Header

 *

 */

function w_studio_teamSocialicons(){

    

    global $post;



    $w_studio_isSocialIcons   = esc_attr( get_post_meta( $post->ID, 'w-team-icons', true ) );

    

    if( $w_studio_isSocialIcons == 'on' ){

    

        // Get Other General Values

        

        // Facebook Link

        $w_studio_teamIconFacebook   = esc_url( get_post_meta( $post->ID, 'w-team-icon-facebook', true ) );

        

        // Title Link

        $w_studio_teamIconTwitter   = esc_url( get_post_meta( $post->ID, 'w-team-icon-twitter', true ) );

        

        // Twitter Link

        $w_studio_teamIconGoogleplus = esc_url( get_post_meta( $post->ID, 'w-team-google-plus-link', true ) );

        

        // Pinterest Link

        $w_studio_teamIconPinterest    = esc_url( get_post_meta( $post->ID, 'w-team-pinterest-link', true ) );



        // Linkedin Link

        $w_studio_teamIconLinkedin    = esc_url( get_post_meta( $post->ID, 'w-team-linkedin-link', true ) );

      

    }

    if( $w_studio_isSocialIcons == 'on' ) {

        if ( $w_studio_teamIconFacebook ){?>

        <a href="<?php echo esc_url($w_studio_teamIconFacebook); ?>"><span data-icon=&#xe093;></span></a>

        <?php }



        if ( $w_studio_teamIconTwitter ){?>

        <a href="<?php echo esc_url($w_studio_teamIconTwitter); ?>"><span data-icon=&#xe094;></span></a>

        <?php }



        if ( $w_studio_teamIconGoogleplus ){?>

        <a href="<?php echo esc_url($w_studio_teamIconGoogleplus); ?>"><span data-icon=&#xe096;></span></a>

        <?php }



        if ( $w_studio_teamIconPinterest ){?>

        <a href="<?php echo esc_url($w_studio_teamIconPinterest); ?>"><span data-icon=&#xe095;></span></a>

        <?php }



        if ( $w_studio_teamIconLinkedin ){?>

        <a href="<?php echo esc_url($w_studio_teamIconLinkedin); ?>"><span data-icon=&#xe09d;></span></a>

        <?php }?>



   <?php }

} ?>