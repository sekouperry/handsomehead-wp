<?php

/**
 * Function To Register Album Post Type
 * 
 *
 */
 $optionValues = get_option( 'w_studio' );
 $slug = '';
 $cat_slug = '';
 if( isset( $optionValues[ 'w-album-category-slug' ] ) ) {
	if( !empty( $optionValues[ 'w-album-category-slug' ] ) ){
		$cat_slug = $optionValues[ 'w-album-category-slug' ];
	}else{
		$cat_slug = 'album-category';
	}	
 } else {
	$cat_slug = 'album-category';
 }
 
 if( isset( $optionValues[ 'w-album-slug' ] ) ) {
	if( !empty( $optionValues[ 'w-album-slug' ] ) ){
		$slug = $optionValues[ 'w-album-slug' ];
	}else{
		$slug = 'album';
	}	
 } else {
	$slug = 'album';
 }

function wCustomAlbumTaxonomy( $cat_slug ){
    $labels = array(
        'name'              => _x( 'Album Category', 'taxonomy general name', 'w-studio-plugin' ),
        'singular_name'     => _x( 'Album Category', 'taxonomy singular name', 'w-studio-plugin' ),
        'search_items'      => esc_html__( 'Search Album', 'w-studio-plugin' ),
        'all_items'         => esc_html__( 'All Album', 'w-studio-plugin' ),
        'parent_item'       => esc_html__( 'Parent Album Category', 'w-studio-plugin' ),
        'parent_item_colon' => esc_html__( 'Parent Album Category:', 'w-studio-plugin' ),
        'edit_item'         => esc_html__( 'Edit Album Category', 'w-studio-plugin' ),
        'update_item'       => esc_html__( 'Update Album Category', 'w-studio-plugin' ),
        'add_new_item'      => esc_html__( 'Add New Album Category', 'w-studio-plugin' ),
        'new_item_name'     => esc_html__( 'New Album Category Name', 'w-studio-plugin' ),
        'menu_name'         => esc_html__( 'Album Category', 'w-studio-plugin' ),
    );

    $args = array(
        'hierarchical'      => true,
        'labels'            => $labels,
        'show_ui'           => true,
        'show_admin_column' => true,
        'query_var'         => true,
        'rewrite'           => array( 'slug' => $cat_slug ),
    );

    register_taxonomy( 'album-category', array( 'album' ), $args );
}

function wAlbumPost( $slug ){
    $albumLabels = array(
        'name'               => _x( 'Album', 'post type general name', 'w-studio-plugin' ),
        'singular_name'      => _x( 'Album Category', 'post type singular name', 'w-studio-plugin' ),
        'menu_name'          => _x( 'Album', 'admin menu', 'w-studio-plugin' ),
        'name_admin_bar'     => _x( 'Album', 'add new on admin bar', 'w-studio-plugin' ),
        'add_new'            => _x( 'New Album', 'album', 'w-studio-plugin' ),
        'add_new_item'       => esc_html__( 'Add New Album', 'w-studio-plugin' ),
        'new_item'           => esc_html__( 'New Album', 'w-studio-plugin' ),
        'edit_item'          => esc_html__( 'Edit Album', 'w-studio-plugin' ),
        'view_item'          => esc_html__( 'View Album', 'w-studio-plugin' ),
        'all_items'          => esc_html__( 'All Album', 'w-studio-plugin' ),
        'search_items'       => esc_html__( 'Search Album', 'w-studio-plugin' ),
        'parent_item_colon'  => esc_html__( 'Parent Album:', 'w-studio-plugin' ),
        'not_found'          => esc_html__( 'No Album found.', 'w-studio-plugin' ),
        'not_found_in_trash' => esc_html__( 'No Album found in Trash.', 'w-studio-plugin' )
    );

    $albumArgs  = array(
        'labels'             => $albumLabels,
        'description'        => esc_html__( 'Description.', 'w-studio-plugin' ),
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => false,
        'rewrite'            => array( 'slug' => $slug ),
        'capability_type'    => 'post',
        'has_archive'        => true,
        'taxonomies'         => array( 'album-category' ),
        'menu_position'      => null,
        'menu_icon'          => 'dashicons-images-alt2',
        'supports'           => array( 'title', 'editor', 'author', 'thumbnail', 'comments', 'page-attributes' )
    );

    register_post_type( 'album', $albumArgs );
}

add_filter( 'post_updated_messages', 'album_updated_messages' );
/**
 * Album update messages.
 *
 * See /wp-admin/edit-form-advanced.php
 *
 * @param array $messages Existing post update messages.
 *
 * @return array Amended post update messages with new CPT update messages.
 */
function album_updated_messages( $messages ) {
    $post             = get_post();
    $post_type        = get_post_type( $post );
    $post_type_object = get_post_type_object( $post_type );

    $messages['album'] = array(
            0  => '', // Unused. Messages start at index 1.
            1  => esc_html__( 'Album Post updated.', 'w-studio-plugin' ),
            2  => esc_html__( 'Album Post updated.', 'w-studio-plugin' ),
            3  => esc_html__( 'Album Post deleted.', 'w-studio-plugin' ),
            4  => esc_html__( 'Album Post updated.', 'w-studio-plugin' ),
            5  => isset( $_GET['revision'] ) ? sprintf( esc_html__( 'Album restored to revision from %s', 'w-studio-plugin' ), wp_post_revision_title( (int) $_GET['revision'], false ) ) : false,
            6  => esc_html__( 'Album Post published.', 'w-studio-plugin' ),
            7  => esc_html__( 'Album Post saved.', 'w-studio-plugin' ),
            8  => esc_html__( 'Album Post submitted.', 'w-studio-plugin' ),
            9  => sprintf(
                esc_html__( 'Album Post scheduled for: <strong>%1$s</strong>.', 'w-studio-plugin' ),
                    date_i18n( esc_html__( 'M j, Y @ G:i', 'w-studio-plugin' ), strtotime( $post->post_date ) )
            ),
            10 => esc_html__( 'Album Post draft updated.', 'w-studio-plugin' )
    );

    if ( $post_type_object->publicly_queryable ) {
		$screen	= get_current_screen();
		if( $screen->post_type == 'album' ){
			$permalink = get_permalink( $post->ID );
		
			$view_link = sprintf( ' <a href="%s">%s</a>', esc_url( $permalink ), esc_html__( 'View Album Post', 'w-studio-plugin' ) );
			$messages[ $post_type ][1] .= $view_link;
			$messages[ $post_type ][6] .= $view_link;
			$messages[ $post_type ][9] .= $view_link;

			$preview_permalink = add_query_arg( 'preview', 'true', $permalink );
			$preview_link = sprintf( ' <a target="_blank" href="%s">%s</a>', esc_url( $preview_permalink ), esc_html__( 'Preview Album Post', 'w-studio-plugin' ) );
			$messages[ $post_type ][8]  .= $preview_link;
			$messages[ $post_type ][10] .= $preview_link;
		}
    }

    return $messages;
}
wCustomAlbumTaxonomy( $cat_slug );
wAlbumPost( $slug );

add_filter( 'enter_title_here', 'album_post_title' );

function album_post_title( $title ) {

    $screen = get_current_screen();

    if ( 'album' == $screen->post_type ) {

        $title = 'Album Name';
    }

    return $title;
}

add_filter( 'admin_post_thumbnail_html', 'album_featured_image' );

function album_featured_image( $text ) {

    $screen = get_current_screen();

    if ( 'album' == $screen->post_type ) {

        $text = str_replace( __( 'Set featured image', 'wll-framework' ), __( 'Album Featured Image', 'wll-framework' ), $text );
    }

    return $text;
}