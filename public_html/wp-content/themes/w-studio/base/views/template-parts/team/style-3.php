<?php
if(! function_exists(w_studio_team_excerpt)) {
    function w_studio_team_excerpt($limit) {
    $excerpt = explode(' ', get_the_content(), $limit);
      if (count($excerpt)>=$limit) {
        array_pop($excerpt);
        $excerpt = implode(" ",$excerpt).'...';
      } else {
        $excerpt = implode(" ",$excerpt);
      } 
      $excerpt = preg_replace('`[[^]]*]`','',$excerpt);
      return $excerpt;
    }
}

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


<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail( 'w_studio_image_370x370' ); ?></a>
</div>
<div class="col-sm-6 wl-paddingzero">
    <div class="wl-team-descript wl-team-3">
        <a href="<?php the_permalink(); ?>"><h5 class="wl-section-margintop2"><?php echo the_title() ?></h5></a>
        <span class="wl-standard-marginbottom show"><?php echo esc_attr( get_post_meta( $post->ID , 'w-team-member-designation' , true ) ); ?></span>

        <div class="wl-color2"><?php echo w_studio_team_excerpt(16); ?></div>

        <div class="wl-media-icons pull-left">
            <div class="wl-media-plot plot-pading">
                <?php if( $w_studio_teamIconFacebook ): ?>
                    <a href="<?php echo esc_url($w_studio_teamIconFacebook); ?>" class="wl-padding-leftzero"><span data-icon=&#xe093;></span></a>
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