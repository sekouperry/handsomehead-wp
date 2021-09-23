<?php

/**
 * Function To Register Client Post Type
 *
 *
 */

function wClientPost(){
    $clientLabels = array(
        'name'               => _x( 'Client', 'post type general name', 'w-studio-plugin' ),
        'singular_name'      => _x( 'Client Category', 'post type singular name', 'w-studio-plugin' ),
        'menu_name'          => _x( 'Client', 'admin menu', 'w-studio-plugin' ),
        'name_admin_bar'     => _x( 'Client', 'add new on admin bar', 'w-studio-plugin' ),
        'add_new'            => _x( 'New client', 'client', 'w-studio-plugin' ),
        'add_new_item'       => esc_html__( 'Add New Client', 'w-studio-plugin' ),
        'new_item'           => esc_html__( 'New Client', 'w-studio-plugin' ),
        'edit_item'          => esc_html__( 'Edit Client', 'w-studio-plugin' ),
        'view_item'          => esc_html__( 'View Client', 'w-studio-plugin' ),
        'all_items'          => esc_html__( 'All Clients', 'w-studio-plugin' ),
        'search_items'       => esc_html__( 'Search Clients', 'w-studio-plugin' ),
        'parent_item_colon'  => esc_html__( 'Parent Client:', 'w-studio-plugin' ),
        'not_found'          => esc_html__( 'No Clients found.', 'w-studio-plugin' ),
        'not_found_in_trash' => esc_html__( 'No Clients found in Trash.', 'w-studio-plugin' )
    );

    $clientArgs  = array(
        'labels'             => $clientLabels,
        'description'        => esc_html__( 'Description.', 'w-studio-plugin' ),
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => array( 'slug' => 'client' ),
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => false,
        'menu_position'      => null,
        'menu_icon'          => 'dashicons-businessman',
        'supports'           => array( 'title', 'author', 'thumbnail', 'page-attributes' )
    );

    register_post_type( 'client', $clientArgs );
}

add_filter( 'post_updated_messages', 'client_updated_messages' );
/**
 * Client update messages.
 *
 * See /wp-admin/edit-form-advanced.php
 *
 * @param array $messages Existing post update messages.
 *
 * @return array Amended post update messages with new CPT update messages.
 */
function client_updated_messages( $messages ) {
    $post             = get_post();
    $post_type        = get_post_type( $post );
    $post_type_object = get_post_type_object( $post_type );

    $messages['client'] = array(
        0  => '', // Unused. Messages start at index 1.
        1  => esc_html__( 'Client Post updated.', 'w-studio-plugin' ),
        2  => esc_html__( 'Client Post updated.', 'w-studio-plugin' ),
        3  => esc_html__( 'Client Post deleted.', 'w-studio-plugin' ),
        4  => esc_html__( 'Client Post updated.', 'w-studio-plugin' ),
        5  => isset( $_GET['revision'] ) ? sprintf( esc_html__( 'Client restored to revision from %s', 'w-studio-plugin' ), wp_post_revision_title( (int) $_GET['revision'], false ) ) : false,
        6  => esc_html__( 'Client Post published.', 'w-studio-plugin' ),
        7  => esc_html__( 'Client Post saved.', 'w-studio-plugin' ),
        8  => esc_html__( 'Client Post submitted.', 'w-studio-plugin' ),
        9  => sprintf(
            esc_html__( 'Client Post scheduled for: <strong>%1$s</strong>.', 'w-studio-plugin' ),
            date_i18n( esc_html__( 'M j, Y @ G:i', 'w-studio-plugin' ), strtotime( $post->post_date ) )
        ),
        10 => esc_html__( 'Client Post draft updated.', 'w-studio-plugin' )
    );

   if ( $post_type_object->publicly_queryable ) {
		$screen	= get_current_screen();
		if( $screen->post_type == 'client' ){
			$permalink = get_permalink( $post->ID );

			$view_link = sprintf( ' <a href="%s">%s</a>', esc_url( $permalink ), esc_html__( 'View Client Post', 'w-studio-plugin' ) );
			$messages[ $post_type ][1] .= $view_link;
			$messages[ $post_type ][6] .= $view_link;
			$messages[ $post_type ][9] .= $view_link;

			$preview_permalink = add_query_arg( 'preview', 'true', $permalink );
			$preview_link = sprintf( ' <a target="_blank" href="%s">%s</a>', esc_url( $preview_permalink ), esc_html__( 'Preview Client Post', 'w-studio-plugin' ) );
			$messages[ $post_type ][8]  .= $preview_link;
			$messages[ $post_type ][10] .= $preview_link;
		}
    }

    return $messages;
}



/**
 *
 * Client title placeholder change.
 *
 **/

add_filter( 'enter_title_here', 'client_post_title' );

function client_post_title( $title ) {

    $screen = get_current_screen();

    if ( 'client' == $screen->post_type ) {

        $title = 'Client Name';
    }

    return $title;
}

/**
 *
 * Client featured image text change.
 *
 **/

add_filter( 'admin_post_thumbnail_html', 'client_featured_image' );

function client_featured_image( $text ) {

    $screen = get_current_screen();

    if ( 'client' == $screen->post_type ) {

        $text = str_replace( esc_html__( 'Set featured image', 'w-studio-plugin' ), esc_html__( 'Client Photo', 'w-studio-plugin' ), $text );
    }

    return $text;
}

wClientPost();