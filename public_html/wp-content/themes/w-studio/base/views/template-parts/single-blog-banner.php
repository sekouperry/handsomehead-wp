<!-- Home start -->
<?php
global $post;

$w_studio_optionValues	= get_option( 'w_studio' );
$w_studio_custom_inline_style = '';
$w_studio_custom_inline_style .= '.wl-overlay1 { background-color: inherit;}';

$w_studio_bannerContainer	= esc_attr( get_post_meta( $post->ID, 'w-post-banner-container', true ) );
$w_studio_bgOverlayColor    = esc_attr( get_post_meta( $post->ID, 'w-post-background-overlay-color', true ) );
$w_studio_bgOverlayOpacity    = esc_attr( get_post_meta( $post->ID, 'w-post-background-opacity', true ) );
$w_studio_titleColor    = esc_attr( get_post_meta( $post->ID, 'w-post-header-font-color', true ) );
$w_studio_metaColor    = esc_attr( get_post_meta( $post->ID, 'w-post-meta-font-color', true ) );
$w_studio_categoryColor    = esc_attr( get_post_meta( $post->ID, 'w-post-category-font-color', true ) );
$w_studio_titleNmeta	= esc_attr(get_post_meta( $post->ID, 'w-post-banner-head', true ));

if( $w_studio_bgOverlayOpacity == 'select' ) {
	$w_studio_bgOverlayOpacity = isset( $w_studio_optionValues['w-blog-banner-opacity'] ) ? $w_studio_optionValues['w-blog-banner-opacity'] : '0.5';
}

if( $w_studio_bgOverlayColor == '' ) {
	$w_studio_bgOverlayColor = isset( $w_studio_optionValues['w-blog-banner-overlay-color'] ) ? $w_studio_optionValues['w-blog-banner-overlay-color'] : '#000000';
}

if( $w_studio_titleNmeta == 'on-banner' ) {
	list( $r , $g , $b ) = sscanf( $w_studio_bgOverlayColor , "#%02x%02x%02x" );
	$w_studio_custom_inline_style .= '.wl-overlay1 { background-color: rgba( ' . $r . ', ' . $g . ', ' . $b . ',' . $w_studio_bgOverlayOpacity . ' ); }';
} else if( $w_studio_titleNmeta == 'default' ) {
	if( $w_studio_optionValues['w-blog-single-title-meta'] == 'on-banner' ) {
		list( $r , $g , $b ) = sscanf( $w_studio_bgOverlayColor , "#%02x%02x%02x" );
		$w_studio_custom_inline_style .= '.wl-overlay1 { background-color: rgba( ' . $r . ', ' . $g . ', ' . $b . ',' . $w_studio_bgOverlayOpacity . ' ); }';
		}
} else if( $w_studio_titleNmeta != 'below-banner' ) {
	$w_studio_custom_inline_style .= '.wl-overlay1 { background-color: rgba( 0, 0, 0, 0.6  ); }';
	$w_studio_custom_inline_style .= 'h2.wl-color4 { color: #ffffff; }';
	$w_studio_custom_inline_style .= '.wl-blog-home .wl-blog-detail-menu ul li a { color: #d7d7d7; }';
	$w_studio_custom_inline_style .= 'h5 a.wl-blog-single-cat { color: #ffffff; }';
	$w_studio_custom_inline_style .= '.single .wl-home-style2 { height: 500px; position: relative;}';
}

if( has_post_thumbnail()) {
	$w_studio_custom_inline_style .= '.wl-blog-bg1 { background: transparent url( ' . get_the_post_thumbnail_url( $post->ID ) . ' ) no-repeat;}';
	$w_studio_background_size = isset( $w_studio_optionValues[ 'w-single-feature-image-position' ] ) ? $w_studio_optionValues[ 'w-single-feature-image-position' ] : 'contain';
	$w_studio_custom_inline_style .= '.wl-blog-bg1 { background-size: '.$w_studio_background_size.'; background-position: 50% 0; }';
}

if( ( $w_studio_titleNmeta != 'on-banner' && ( isset( $w_studio_optionValues['w-blog-single-title-meta'] ) && $w_studio_optionValues['w-blog-single-title-meta'] != 'on-banner' )  ) && !has_post_thumbnail()) {
    $w_studio_custom_inline_style = '.single .wl-home-style2 { height: 0; margin-top: 0;}';
}
if($w_studio_bannerContainer != 'container' && has_post_thumbnail()) {
    if( isset( $w_studio_optionValues['w-blog-single-banner-container'] ) && $w_studio_optionValues['w-blog-single-banner-container'] == 'fullwidth' ) {
    	$w_studio_custom_inline_style .= '.single .wl-home-style2 { height: 500px; position: relative;}';
    }
}
if($w_studio_bannerContainer == 'container' && has_post_thumbnail()) {
    $w_studio_custom_inline_style .= '.single .wl-home-style2 { height: 420px; position: relative;}';
}
//title color
if(!empty($w_studio_titleColor)) {
	$w_studio_custom_inline_style .= 'h2.wl-color4 { color: '.$w_studio_titleColor.';}';
} else {
	$w_studio_titleColor = isset($w_studio_optionValues['w-single-blog-title-color']) ? $w_studio_optionValues['w-single-blog-title-color'] : '';
	$w_studio_custom_inline_style .= 'h2.wl-color4 { color: '.$w_studio_titleColor.';}';
}

if(!empty($w_studio_categoryColor)) {
	$w_studio_custom_inline_style .= 'h5 a.wl-blog-single-cat { color: '.$w_studio_categoryColor.'; }';
} else {
	$w_studio_categoryColor = isset($w_studio_optionValues['w-single-blog-category-color']) ? $w_studio_optionValues['w-single-blog-category-color'] : '';
	$w_studio_custom_inline_style .= 'h5 a.wl-blog-single-cat { color: '.$w_studio_categoryColor.';}';
}

if(!empty($w_studio_metaColor)) {
	$w_studio_custom_inline_style .= '.wl-blog-detail-menu ul li a { color: '.$w_studio_metaColor.'; border-right: 1px solid '.$w_studio_metaColor.';}';
} else {
	$w_studio_metaColor = isset($w_studio_optionValues['w-single-blog-meta-color']) ? $w_studio_optionValues['w-single-blog-meta-color'] : '';
	$w_studio_custom_inline_style .= '.wl-blog-detail-menu ul li a { color: '.$w_studio_metaColor.'; border-right: 1px solid '.$w_studio_metaColor.';}';
}

wp_add_inline_style( 'w_studio_inline-style', $w_studio_custom_inline_style );

if( $w_studio_bannerContainer == 'default' ) {
	if( isset( $w_studio_optionValues['w-blog-single-banner-container'] ) ) {
		if( $w_studio_optionValues['w-blog-single-banner-container'] == 'container' ) {
			$w_studio_bannerContainer	= 'container';
		} else {
			$w_studio_bannerContainer	= 'fullwidth';
		}
	}else{
		$w_studio_bannerContainer = 'fullwidth';
	}
}
if( $w_studio_bannerContainer == "container" ) {
		echo '<div class="container">';
	}
?>

<div class="wl-home-style2 wl-blog-bg1">

	<div class="wl-overlay1">
<?php


	if( $w_studio_bannerContainer == "fullwidth" ){ ?>
		<div class="container  vertical-middle">
	<?php } ?>
			<div class="wl-blog-bg">
					<div class="container">
				
					<?php			
					if( $w_studio_titleNmeta == 'default' ) {
						$w_studio_optionValues	= get_option( 'w_studio' );
						
						if( isset( $w_studio_optionValues['w-blog-single-title-meta'] ) ){
							if( $w_studio_optionValues['w-blog-single-title-meta'] == 'on-banner' ) {
								$w_studio_titleNmeta	= 'on-banner';
							}else{
								$w_studio_titleNmeta	= 'below-banner';
							}
						}else{
							$w_studio_titleNmeta	= 'below-banner';
						}
					}
					
					if( $w_studio_titleNmeta == 'on-banner' ) {
						if( isset( $w_studio_optionValues[ 'w-blog-single-category' ] ) && $w_studio_optionValues[ 'w-blog-single-category' ] != '0' ) {
					?>
					
						<h5 class="wl-color3">
							<?php 
								$w_studio_categories = get_the_category();
								$w_studio_lastItem   = end( $w_studio_categories );
								foreach( $w_studio_categories as $cat ) {
									if( $cat->cat_name != "All" ) { 
										if( $cat->term_id != $w_studio_lastItem->term_id ){ ?>
									<a class="wl-blog-single-cat" href="<?php echo get_category_link( $cat->cat_ID ); ?>"><?php echo esc_attr($cat->cat_name). ", "; ?></a>
									<?php } else { ?>
										<a class="wl-blog-single-cat" href="<?php echo get_category_link( $cat->cat_ID ); ?>"><?php echo esc_attr($cat->cat_name); ?></a>
									<?php }
									}
								}							
							?>
						</h5>
						<?php } ?>

					<h2 class="wl-color4"><?php the_title(); ?></h2>
					<?php if( ( isset( $w_studio_optionValues[ 'w-blog-single-date' ] ) && $w_studio_optionValues[ 'w-blog-single-date' ] != '0' ) || ( isset( $w_studio_optionValues[ 'w-blog-single-author' ] ) && $w_studio_optionValues[ 'w-blog-single-author' ] != '0' ) || ( isset( $w_studio_optionValues[ 'w-blog-single-comments' ] ) && $w_studio_optionValues[ 'w-blog-single-comments' ] != '0' ) ) { ?>
					<div class="wl-blog-detail-menu">
						<ul>
							<?php 
							if( isset( $w_studio_optionValues[ 'w-blog-single-date' ] ) && $w_studio_optionValues[ 'w-blog-single-date' ] != '0' ) {
								$w_studio_archive_year  = get_the_time('Y');
								$w_studio_archive_month = get_the_time('m');
								$w_studio_archive_day   = get_the_time('d');
							?>
							<li><a href="<?php echo get_day_link( $w_studio_archive_year, $w_studio_archive_month, $w_studio_archive_day); ?>"><?php echo the_time('F j, Y'); ?></a></li>
							<?php } if( isset( $w_studio_optionValues[ 'w-blog-single-author' ] ) && $w_studio_optionValues[ 'w-blog-single-author' ] != '0' ) { ?>
							<li><a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ), get_the_author_meta( 'user_nicename' ) ); ?>"><?php the_author(); ?></a></li>
							<?php } if( isset( $w_studio_optionValues[ 'w-blog-single-comments' ] ) && $w_studio_optionValues[ 'w-blog-single-comments' ] != '0' ) { ?>
							<li><a href="<?php comments_link(); ?>"><?php comments_number( 'no Comment', 'one Comment', '% Comments' ); ?></a></li>
							<?php } ?>
						</ul>
					</div>
					<?php } } 


					if ( $w_studio_titleNmeta	== '' ) {

					?>

					<h5 class="wl-color3">

					<?php 

					$w_studio_categories = get_the_category();

					$w_studio_lastItem   = end( $w_studio_categories );
					foreach( $w_studio_categories as $cat ) {

					if( $cat->cat_name != "All" ) { 
					 if( $cat->term_id != $w_studio_lastItem->term_id ){ ?>
					<a class="wl-blog-single-cat" href="<?php echo get_category_link( $cat->cat_ID ); ?>"><?php echo esc_attr($cat->cat_name). ", "; ?></a>

					<?php  
					}else{ ?>
					<a class="wl-blog-single-cat" href="<?php echo get_category_link( $cat->cat_ID ); ?>"><?php echo esc_attr($cat->cat_name); ?></a>
					<?php }
					}

					}       

					?>

					</h5>

					<h2 class="wl-color4"><?php the_title(); ?></h2>
					<?php 
					
					if ( 'post' == get_post_type() ) { ?>
					<div class="wl-blog-detail-menu">
					<ul>
						<?php 
							$w_studio_archive_year  = get_the_time('Y');
							$w_studio_archive_month = get_the_time('m');
							$w_studio_archive_day   = get_the_time('d');
						?>

						<li><a href="<?php echo get_day_link( $w_studio_archive_year, $w_studio_archive_month, $w_studio_archive_day); ?>"><?php echo the_time('F j, Y'); ?></a></li>

						<li><a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ), get_the_author_meta( 'user_nicename' ) ); ?>"><?php the_author(); ?></a></li>

						<li><a href="<?php comments_link(); ?>"><?php comments_number( 'no Comment', 'one Comment', '% Comments' ); ?></a></li>
					</ul>
					</div>
					<?php } } ?>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- Home end -->