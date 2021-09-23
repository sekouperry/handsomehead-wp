<?php

$w_studio_isSocialIcons = get_post_meta( $post->ID , 'w-team-icons' , true );
if( $w_studio_isSocialIcons == 'on' ):
    // Facebook Link
    $w_studio_teamIconFacebook = esc_url( get_post_meta( $post->ID , 'w-team-icon-facebook' , true ) );
    // Title Link
    $w_studio_teamIconTwitter = esc_url( get_post_meta( $post->ID , 'w-team-icon-twitter' , true ) );
    // Twitter Link
    $w_studio_teamIconGoogleplus = esc_url( get_post_meta( $post->ID , 'w-team-google-plus-link' , true ) );
    // Pinterest Link
    $w_studio_teamIconPinterest = esc_url( get_post_meta( $post->ID , 'w-team-pinterest-link' , true ) );
    // Linkedin Link
    $w_studio_teamIconLinkedin = esc_url( get_post_meta( $post->ID , 'w-team-linkedin-link' , true ) );
endif;
$w_studio_terms = get_the_terms( $post->ID , 'designation' );
?>

<div class="col-md-4 col-sm-6 wl-nomalmargin-bottom">
    <div class="row">
        <div class="col-md-12">
            <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail( 'w_studio_image_570x570' ); ?></a>
        </div>
    </div>
</div>
<div class="col-md-2 col-sm-6 wl-nomalmargin-bottom">
    <div class="row">
        <div class="col-md-12 wl-square-title wl-height4">
            <div class="wl-bottom-title">
                <a href="<?php the_permalink(); ?>"><h5><?php the_title(); ?></h5></a>
                <span class="wl-standard-marginbottom show"><?php echo esc_attr( get_post_meta( $post->ID , 'w-team-member-designation' , true ) ); ?></span>

                <div class="wl-media-icons wl-media-icons2 pull-left">
                    <div class="wl-media-plot row">
                        <?php if( $w_studio_teamIconFacebook ): ?>
                            <a href="<?php echo esc_url($w_studio_teamIconFacebook); ?>"><span data-icon=&#xe093;></span></a>
                        <?php endif;
                        if( $w_studio_teamIconTwitter ): ?>
                            <a href="<?php echo esc_url($w_studio_teamIconTwitter); ?>"><span data-icon=&#xe094;></span></a>
                        <?php endif;
                        if( $w_studio_teamIconGoogleplus ): ?>
                            <a href="<?php echo esc_url($w_studio_teamIconGoogleplus); ?>"><span data-icon=&#xe096;></span></a>
                        <?php endif;
                        if( $w_studio_teamIconPinterest ): ?>
                            <a href="<?php echo esc_url($w_studio_teamIconPinterest); ?>"><span data-icon=&#xe095;></span></a>
                        <?php endif;
                        if( $w_studio_teamIconLinkedin ): ?>
                            <a href="<?php echo esc_url($w_studio_teamIconLinkedin); ?>"><span data-icon=&#xe09d;></span></a>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>