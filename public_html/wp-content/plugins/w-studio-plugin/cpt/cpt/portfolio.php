<?php

/**
 * Function To Register Portfolio Post Type
 * 
 *
 */
 $optionValues = get_option( 'w_studio' );
 $slug = '';
 $cat_slug = '';
 if( isset( $optionValues[ 'w-portfolio-category-slug' ] ) ) {
	if( !empty( $optionValues[ 'w-portfolio-category-slug' ] ) ){
		$cat_slug = $optionValues[ 'w-portfolio-category-slug' ];
	}else{
		$cat_slug = 'portfolio-category';
	}	
 } else {
	$cat_slug = 'portfolio-category';
 }
 if( isset( $optionValues[ 'w-portfolio-slug' ] ) ) {
	if( !empty( $optionValues[ 'w-portfolio-slug' ] ) ){
		$slug = $optionValues[ 'w-portfolio-slug' ];
	}else{
		$slug = 'w-portfolio';
	}	
 } else {
	$slug = 'w-portfolio';
 }
 function wCustomPortfolioTaxonomy( $cat_slug ){
    $labels = array(
                'name'              => _x( 'Portfolio Category', 'taxonomy general name', 'w-studio-plugin' ),
                'singular_name'     => _x( 'Portfolio Category', 'taxonomy singular name', 'w-studio-plugin' ),
                'search_items'      => esc_html__( 'Search Portfolio', 'w-studio-plugin' ),
                'all_items'         => esc_html__( 'All Portfolio', 'w-studio-plugin' ),
                'parent_item'       => esc_html__( 'Parent Portfolio Category', 'w-studio-plugin' ),
                'parent_item_colon' => esc_html__( 'Parent Portfolio Category:', 'w-studio-plugin' ),
                'edit_item'         => esc_html__( 'Edit Portfolio Category', 'w-studio-plugin' ),
                'update_item'       => esc_html__( 'Update Portfolio Category', 'w-studio-plugin' ),
                'add_new_item'      => esc_html__( 'Add New Portfolio Category', 'w-studio-plugin' ),
                'new_item_name'     => esc_html__( 'New Portfolio Category Name', 'w-studio-plugin' ),
                'menu_name'         => esc_html__( 'Portfolio Category', 'w-studio-plugin' ),
            );

    $args = array(
                'hierarchical'      => true,
                'labels'            => $labels,
                'show_ui'           => true,
                'show_admin_column' => true,
                'query_var'         => true,
                'rewrite'           => array( 'slug' => $cat_slug ),
            );

    register_taxonomy( 'portfolio-category', array( 'portfolio' ), $args );
}

function wPortfolioPost( $slug ){
    $portfolioLabels = array(
        'name'               => _x( 'Portfolio', 'post type general name', 'w-studio-plugin' ),
        'singular_name'      => _x( 'Portfolio Category', 'post type singular name', 'w-studio-plugin' ),
        'menu_name'          => _x( 'Portfolio', 'admin menu', 'w-studio-plugin' ),
        'name_admin_bar'     => _x( 'Portfolio', 'add new on admin bar', 'w-studio-plugin' ),
        'add_new'            => _x( 'New Portfolio', 'portfolio', 'w-studio-plugin' ),
        'add_new_item'       => esc_html__( 'Add New Portfolio', 'w-studio-plugin' ),
        'new_item'           => esc_html__( 'New Portfolio', 'w-studio-plugin' ),
        'edit_item'          => esc_html__( 'Edit Portfolio', 'w-studio-plugin' ),
        'view_item'          => esc_html__( 'View Portfolio', 'w-studio-plugin' ),
        'all_items'          => esc_html__( 'All Portfolios', 'w-studio-plugin' ),
        'search_items'       => esc_html__( 'Search Portfolios', 'w-studio-plugin' ),
        'parent_item_colon'  => esc_html__( 'Parent Portfolio:', 'w-studio-plugin' ),
        'not_found'          => esc_html__( 'No portfolios found.', 'w-studio-plugin' ),
        'not_found_in_trash' => esc_html__( 'No portfolios found in Trash.', 'w-studio-plugin' )
    );

    $portfolioArgs  = array(
        'labels'             => $portfolioLabels,
        'description'        => esc_html__( 'Description.', 'w-studio-plugin' ),
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => false,
        'rewrite'            => array( 'slug' => $slug ),
        'capability_type'    => 'post',
        'has_archive'        => true,
        'taxonomies'         => array( 'portfolio-category' ),
        'menu_position'      => null,
        'menu_icon'          => 'dashicons-portfolio',
        'supports'           => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments', 'page-attributes' )
    );

    register_post_type( 'portfolio', $portfolioArgs );
}

add_filter( 'post_updated_messages', 'portfolio_updated_messages' );
/**
 * Portfolio update messages.
 *
 * See /wp-admin/edit-form-advanced.php
 *
 * @param array $messages Existing post update messages.
 *
 * @return array Amended post update messages with new CPT update messages.
 */
function portfolio_updated_messages( $messages ) {
    $post             = get_post();
    $post_type        = get_post_type( $post );
    $post_type_object = get_post_type_object( $post_type );

    $messages['portfolio'] = array(
            0  => '', // Unused. Messages start at index 1.
            1  => esc_html__( 'Portfolio Post updated.', 'w-studio-plugin' ),
            2  => esc_html__( 'Portfolio Post updated.', 'w-studio-plugin' ),
            3  => esc_html__( 'Portfolio Post deleted.', 'w-studio-plugin' ),
            4  => esc_html__( 'Portfolio Post updated.', 'w-studio-plugin' ),
            5  => isset( $_GET['revision'] ) ? sprintf( esc_html__( 'Portfolio restored to revision from %s', 'w-studio-plugin' ), wp_post_revision_title( (int) $_GET['revision'], false ) ) : false,
            6  => esc_html__( 'Portfolio Post published.', 'w-studio-plugin' ),
            7  => esc_html__( 'Portfolio Post saved.', 'w-studio-plugin' ),
            8  => esc_html__( 'Portfolio Post submitted.', 'w-studio-plugin' ),
            9  => sprintf(
                esc_html__( 'Portfolio Post scheduled for: <strong>%1$s</strong>.', 'w-studio-plugin' ),
                    date_i18n( esc_html__( 'M j, Y @ G:i', 'w-studio-plugin' ), strtotime( $post->post_date ) )
            ),
            10 => esc_html__( 'Portfolio Post draft updated.', 'w-studio-plugin' )
    );

    if ( $post_type_object->publicly_queryable ) {
		$screen	= get_current_screen();
		if( $screen->post_type == 'portfolio' ){
			$permalink = get_permalink( $post->ID );
		
			$view_link = sprintf( ' <a href="%s">%s</a>', esc_url( $permalink ), esc_html__( 'View Portfolio Post', 'w-studio-plugin' ) );
			$messages[ $post_type ][1] .= $view_link;
			$messages[ $post_type ][6] .= $view_link;
			$messages[ $post_type ][9] .= $view_link;

			$preview_permalink = add_query_arg( 'preview', 'true', $permalink );
			$preview_link = sprintf( ' <a target="_blank" href="%s">%s</a>', esc_url( $preview_permalink ), esc_html__( 'Preview Portfolio Post', 'w-studio-plugin' ) );
			$messages[ $post_type ][8]  .= $preview_link;
			$messages[ $post_type ][10] .= $preview_link;
		}
    }

    return $messages;
}
wCustomPortfolioTaxonomy( $cat_slug );
wPortfolioPost( $slug );