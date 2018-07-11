<?php

/**
 * Registers the `project` post type.
 */
function project_init() {
	register_post_type( 'project', array(
		'labels'                => array(
			'name'                  => __( 'Portfolio', 'wordplate' ),
			'singular_name'         => __( 'Project', 'wordplate' ),
			'all_items'             => __( 'Portfolio', 'wordplate' ),
			'archives'              => __( 'Portfolio Archives', 'wordplate' ),
			'attributes'            => __( 'Project Attributes', 'wordplate' ),
			'insert_into_item'      => __( 'Insert into Project', 'wordplate' ),
			'uploaded_to_this_item' => __( 'Uploaded to this Project', 'wordplate' ),
			'featured_image'        => _x( 'Featured Image', 'project', 'wordplate' ),
			'set_featured_image'    => _x( 'Set featured image', 'project', 'wordplate' ),
			'remove_featured_image' => _x( 'Remove featured image', 'project', 'wordplate' ),
			'use_featured_image'    => _x( 'Use as featured image', 'project', 'wordplate' ),
			'filter_items_list'     => __( 'Filter Projects list', 'wordplate' ),
			'items_list_navigation' => __( 'Portfolio list navigation', 'wordplate' ),
			'items_list'            => __( 'Portfolio list', 'wordplate' ),
			'new_item'              => __( 'New Project', 'wordplate' ),
			'add_new'               => __( 'Add New', 'wordplate' ),
			'add_new_item'          => __( 'Add New Project', 'wordplate' ),
			'edit_item'             => __( 'Edit Project', 'wordplate' ),
			'view_item'             => __( 'View Project', 'wordplate' ),
			'view_items'            => __( 'View Portfolio', 'wordplate' ),
			'search_items'          => __( 'Search Portfolio', 'wordplate' ),
			'not_found'             => __( 'No Projects found', 'wordplate' ),
			'not_found_in_trash'    => __( 'No Projects found in trash', 'wordplate' ),
			'parent_item_colon'     => __( 'Parent Project:', 'wordplate' ),
			'menu_name'             => __( 'Portfolio', 'wordplate' ),
		),
		'public'                => true,
		'hierarchical'          => false,
		'show_ui'               => true,
		'show_in_nav_menus'     => true,
		'supports'              => array( 'title', 'editor' ),
		'has_archive'           => true,
		'rewrite'               => true,
		'query_var'             => true,
		'menu_icon'             => 'dashicons-admin-post',
		'show_in_rest'          => true,
		'rest_base'             => 'project',
		'rest_controller_class' => 'WP_REST_Posts_Controller',
	) );

}
add_action( 'init', 'project_init' );

/**
 * Sets the post updated messages for the `project` post type.
 *
 * @param  array $messages Post updated messages.
 * @return array Messages for the `project` post type.
 */
function project_updated_messages( $messages ) {
	global $post;

	$permalink = get_permalink( $post );

	$messages['project'] = array(
		0  => '', // Unused. Messages start at index 1.
		/* translators: %s: post permalink */
		1  => sprintf( __( 'Project updated. <a target="_blank" href="%s">View Project</a>', 'wordplate' ), esc_url( $permalink ) ),
		2  => __( 'Custom field updated.', 'wordplate' ),
		3  => __( 'Custom field deleted.', 'wordplate' ),
		4  => __( 'Project updated.', 'wordplate' ),
		/* translators: %s: date and time of the revision */
		5  => isset( $_GET['revision'] ) ? sprintf( __( 'Project restored to revision from %s', 'wordplate' ), wp_post_revision_title( (int) $_GET['revision'], false ) ) : false,
		/* translators: %s: post permalink */
		6  => sprintf( __( 'Project published. <a href="%s">View Project</a>', 'wordplate' ), esc_url( $permalink ) ),
		7  => __( 'Project saved.', 'wordplate' ),
		/* translators: %s: post permalink */
		8  => sprintf( __( 'Project submitted. <a target="_blank" href="%s">Preview Project</a>', 'wordplate' ), esc_url( add_query_arg( 'preview', 'true', $permalink ) ) ),
		/* translators: 1: Publish box date format, see https://secure.php.net/date 2: Post permalink */
		9  => sprintf( __( 'Project scheduled for: <strong>%1$s</strong>. <a target="_blank" href="%2$s">Preview Project</a>', 'wordplate' ),
		date_i18n( __( 'M j, Y @ G:i' ), strtotime( $post->post_date ) ), esc_url( $permalink ) ),
		/* translators: %s: post permalink */
		10 => sprintf( __( 'Project draft updated. <a target="_blank" href="%s">Preview Project</a>', 'wordplate' ), esc_url( add_query_arg( 'preview', 'true', $permalink ) ) ),
	);

	return $messages;
}
add_filter( 'post_updated_messages', 'project_updated_messages' );
