<?php



/**
 * Function To Register Custom Taxonomy
 *
 */

function wCustomTeamTaxonomy() {
    $labels = array(
                'name'              => _x( 'Department', 'taxonomy general name', 'w-studio-plugin' ),
                'singular_name'     => _x( 'Department', 'taxonomy singular name', 'w-studio-plugin' ),
                'search_items'      => esc_html__( 'Search Department', 'w-studio-plugin' ),
                'all_items'         => esc_html__( 'All Department', 'w-studio-plugin' ),
                'parent_item'       => esc_html__( 'Parent Department', 'w-studio-plugin' ),
                'parent_item_colon' => esc_html__( 'Parent Department:', 'w-studio-plugin' ),
                'edit_item'         => esc_html__( 'Edit Department', 'w-studio-plugin' ),
                'update_item'       => esc_html__( 'Update Department', 'w-studio-plugin' ),
                'add_new_item'      => esc_html__( 'Add New Department', 'w-studio-plugin' ),
                'new_item_name'     => esc_html__( 'New Department Name', 'w-studio-plugin' ),
                'menu_name'         => esc_html__( 'Department', 'w-studio-plugin' ),
            );

    $args = array(
                'hierarchical'      => true,
                'labels'            => $labels,
                'show_ui'           => true,
                'show_admin_column' => true,
                'query_var'         => true,
                'rewrite'           => array( 'slug' => 'designation' ),
            );

    register_taxonomy( 'designation', array( 'team' ), $args );
}

/**
 * Function To Register Team Post Type
 * 
 *
 */

function wTeamPostType(){
    $teamLabels = array(
        'name'               => _x( 'Members', 'post type general name', 'w-studio-plugin' ),
        'singular_name'      => _x( 'Member', 'post type singular name', 'w-studio-plugin' ),
        'menu_name'          => _x( 'Team', 'admin menu', 'w-studio-plugin' ),
        'name_admin_bar'     => _x( 'Team', 'add new on admin bar', 'w-studio-plugin' ),
        'add_new'            => _x( 'New Member', 'portfolio', 'w-studio-plugin' ),
        'add_new_item'       => esc_html__( 'Add New Member', 'w-studio-plugin' ),
        'new_item'           => esc_html__( 'New Member', 'w-studio-plugin' ),
        'edit_item'          => esc_html__( 'Edit Member', 'w-studio-plugin' ),
        'view_item'          => esc_html__( 'View Member', 'w-studio-plugin' ),
        'all_items'          => esc_html__( 'All Members', 'w-studio-plugin' ),
        'search_items'       => esc_html__( 'Search Members', 'w-studio-plugin' ),
        'parent_item_colon'  => esc_html__( 'Parent Member:', 'w-studio-plugin' ),
        'not_found'          => esc_html__( 'No members found.', 'w-studio-plugin' ),
        'not_found_in_trash' => esc_html__( 'No members found in Trash.', 'w-studio-plugin' )
    );

    $teamArgs  = array(
        'labels'             => $teamLabels,
        'description'        => esc_html__( 'Department.', 'w-studio-plugin' ),
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => array( 'slug' => 'w-team' ),
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => true,
        'taxonomies'         => array( 'department' ),
        'menu_position'      => null,
        'menu_icon'          => 'dashicons-groups',
        'supports'           => array( 'title', 'editor', 'thumbnail', 'page-attributes' )
    );

    register_post_type( 'team', $teamArgs );
}

add_filter( 'post_updated_messages', 'team_updated_messages' );
/**
 * Team update messages.
 *
 * See /wp-admin/edit-form-advanced.php
 *
 * @param array $messages Existing post update messages.
 *
 * @return array Amended post update messages with new CPT update messages.
 */
function team_updated_messages( $messages ) {
	$post             = get_post();
	$post_type        = get_post_type( $post );
	$post_type_object = get_post_type_object( $post_type );

	$messages['team'] = array(
		0  => '', // Unused. Messages start at index 1.
		1  => esc_html__( 'Team Post updated.', 'w-studio-plugin' ),
		2  => esc_html__( 'Team Post updated.', 'w-studio-plugin' ),
		3  => esc_html__( 'Team Post deleted.', 'w-studio-plugin' ),
		4  => esc_html__( 'Team Post updated.', 'w-studio-plugin' ),
		5  => isset( $_GET['revision'] ) ? sprintf( esc_html__( 'Book restored to revision from %s', 'w-studio-plugin' ), wp_post_revision_title( (int) $_GET['revision'], false ) ) : false,
		6  => esc_html__( 'Team Post published.', 'w-studio-plugin' ),
		7  => esc_html__( 'Team Post saved.', 'w-studio-plugin' ),
		8  => esc_html__( 'Team Post submitted.', 'w-studio-plugin' ),
		9  => sprintf(
            esc_html__( 'Team Post scheduled for: <strong>%1$s</strong>.', 'w-studio-plugin' ),
			date_i18n( esc_html__( 'M j, Y @ G:i', 'w-studio-plugin' ), strtotime( $post->post_date ) )
		),
		10 => esc_html__( 'Team Post draft updated.', 'w-studio-plugin' )
	);

	if ( $post_type_object->publicly_queryable ) {
		$screen	= get_current_screen();
		if( $screen->post_type == 'team' ){
            $permalink = get_permalink( $post->ID );

            $view_link = sprintf( ' <a href="%s">%s</a>', esc_url( $permalink ), esc_html__( 'View Team Post', 'w-studio-plugin' ) );
            $messages[ $post_type ][1] .= $view_link;
            $messages[ $post_type ][6] .= $view_link;
            $messages[ $post_type ][9] .= $view_link;

            $preview_permalink = add_query_arg( 'preview', 'true', $permalink );
            $preview_link = sprintf( ' <a target="_blank" href="%s">%s</a>', esc_url( $preview_permalink ), esc_html__( 'Preview Team Post', 'w-studio-plugin' ) );
            $messages[ $post_type ][8]  .= $preview_link;
            $messages[ $post_type ][10] .= $preview_link;
		}
	}

	return $messages;
}

// Registering Custom Taxonomy
wCustomTeamTaxonomy();

// Registering Custom Post Type Team
wTeamPostType();