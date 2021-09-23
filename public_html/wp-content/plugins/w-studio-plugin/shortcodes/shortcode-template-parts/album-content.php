<?php
/**
 * Clients shortcode
 */
extract( shortcode_atts( array( 
    'album_style' => '',
    'posts_per_page' => '',
    'category' => '',
    'order' => '',
    'orderby' => '',
    'title_color' => '', 
    'title_hover_color' => '',
    'title_background_color' => '',
    'title_hover_background_color' => '',
    'font_size' => '',
    'google_fonts' => '',
    'hover_icon' => '',
    'hover_icon_size' => '',
    'hover_icon_color' => '',
    'hover_overlay_color' => '',
    'is_load_more' => '' ) , $atts ) 
);

if( !function_exists( 'w_studio_random_number' ) ) {
    function w_studio_random_number() {
        $class_name = 'wl-';
        for( $i = 0 ; $i < 5 ; $i++ ) {
            $class_name .= mt_rand( 0 , 9999 );
        }
        return $class_name;
    }
}
$className = w_studio_random_number();

if( $google_fonts !== "" ) {
    $processing_google_font_data = explode( '|' , rawurldecode( $atts[ 'google_fonts' ] ) );

    $processing_google_font_data[ 'font-family' ] = ltrim( $processing_google_font_data[ '0' ] , 'font_family:' );
    $processing_google_font_data[ 'font-style' ] = ltrim( $processing_google_font_data[ '1' ] , 'font_style:' );
    $font_family = $processing_google_font_data[ 'font-family' ];
    $font_style = $processing_google_font_data[ 'font-style' ];
    $font_family_name = explode( ':' , $font_family );
    $font_style_name = explode( ' ' , $font_style );
    wp_enqueue_style( 'style_icon' , '//fonts.googleapis.com/css?family=' . $processing_google_font_data[ 'font-family' ] );
}

$w_studio_custom_inline_style = '';
$w_studio_custom_inline_style .= '.'.$className.' .album-btn > a {font-family: '.$font_family_name[ 0 ].'; font-weight: '.$font_style_name[ 0 ].'; font-size: '.$font_size.'px; color: '.$title_color.'; }';
$w_studio_custom_inline_style .= '.'.$className.' .album-btn > a:hover {color: '.$title_color.'; }';
list( $r , $g , $b ) = sscanf( $hover_overlay_color , "#%02x%02x%02x" );
$w_studio_custom_inline_style .= '.album-sin > a::before {background: rgba(' . $r . ', ' . $g . ', ' . $b . ', 0.6) none repeat scroll 0 0}';
$w_studio_custom_inline_style .= '.'.$className.' .album-btn a {background-color: '.$title_background_color.'}';
$w_studio_custom_inline_style .= '.'.$className.' .album-btn a:hover {background-color: '.$title_hover_background_color.'}';
$w_studio_custom_inline_style .= '.'.$className.' a span {font-size: '.$hover_icon_size.'px; color: '.$hover_icon_color.';}';
wp_add_inline_style( 'w_studio_inline-style', $w_studio_custom_inline_style );

if($album_style == 'column-2' || $album_style == '') {
	$album_style = 'column-2';
	$column_class = 'col-lg-6 col-md-6 col-sm-6';
	$w_studio_image_size = 'w_studio_image_570x370';
} else {
	$album_style = 'column-3';
	$column_class = 'col-lg-4 col-md-4 col-sm-6';
	$w_studio_image_size = 'w_studio_image_370x270';
}
if($posts_per_page == '') {
	$posts_per_page = '12';
}

if( $category != 'all' ) {
    $category_slug = explode( ',' , $category );
} else {
    $category_slug = get_terms( 'album-category' , array(
        'hide_empty' => 0 ,
        'fields' => 'names'
    ) );
}
$args = array(
    'post_type' => 'album' ,
    'tax_query' => array(
        array(
            'taxonomy' => 'album-category' ,
            'field' => 'name' ,
            'terms' => $category_slug ,
        ) ,
    ) ,
    'posts_per_page' => $posts_per_page ,
    'taxonomy' => 'album-category' ,
    'order' => $order ,
    'orderby' => $orderby 
);
if($category == 'all') {
	$args = array(
	    'post_type' => 'album' ,
	    'posts_per_page' => $posts_per_page ,
	    'taxonomy' => 'album-category' ,
	    'order' => $order ,
	    'orderby' => $orderby 
	);
}
$hover_icon = ($hover_icon != '') ? $hover_icon : 'arrow_expand';
$query = new WP_Query( $args );
?>
<?php if($query->have_posts()) : ?>
<div class="row" id="albumpostload">
	<?php while($query->have_posts()) : $query->the_post(); ?>
		<div class="<?php echo esc_attr($column_class); ?>">							
			<div class="album-sin <?php echo esc_attr($className); ?>">		
				<a href="<?php the_permalink(); ?>">
					<img src="<?php echo get_the_post_thumbnail_url(get_the_ID(),$w_studio_image_size); ?>" alt="" />	
					<span class="<?php echo esc_attr($hover_icon); ?>" href="<?php the_permalink(); ?>"></span>
				</a>
				<div class="album-btn">
					<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
				</div>										
			</div>							
		</div>
	<?php endwhile; wp_reset_query(); ?>
</div>
<?php endif; ?>

<?php if($is_load_more && $category == 'all') { ?>
	<!-- start load more -->
	<div class="wl-sort-link text-center">
		<div class="wl-link-to">
			<span class="wl-direction-left" data-icon=&#x45;></span>
			<a href="javascript:void(0);"  id="w-load-more" data-value="album">
				<?php echo esc_html__( 'load more', 'w-studio' ); ?>			
			</a>
			<span class="wl-direction-right" data-icon=&#x44;></span>
		</div>
	</div>
	<a id="initialPageValue">2</a>
	<!-- end load more -->
<?php 
	wp_register_script( 'albumloadmore' , W_STUDIO_THEME_ASSETS_JS . '/load.more-album.js' , '' , '1.0.0' , true );

	wp_enqueue_script( 'albumloadmore' );

	wp_localize_script( 'albumloadmore' , 'w_studio_loadmorepost' , array( 'ajaxurl' => admin_url( 'admin-ajax.php' ) , 'style' => $album_style , 'limit' => $posts_per_page , 'random' => $className, 'icon' => $hover_icon ) );
}
?>