<?php
/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package Sonho
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function sonho_body_classes( $classes ) {
	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}

	// Adds a class of no-sidebar when there is no sidebar present.
	if ( ! is_active_sidebar( 'sidebar-1' ) ) {
		$classes[] = 'no-sidebar';
	}

	return $classes;
}
add_filter( 'body_class', 'sonho_body_classes' );

/**
 * Add a pingback url auto-discovery header for single posts, pages, or attachments.
 */
function sonho_pingback_header() {
	if ( is_singular() && pings_open() ) {
		printf( '<link rel="pingback" href="%s">', esc_url( get_bloginfo( 'pingback_url' ) ) );
	}
}
add_action( 'wp_head', 'sonho_pingback_header' );

/**
 * Function for add  project custom post type.
 */
function sonho_init_callback() {
	$labels = array(
		'name'                  => _x( 'Projects', 'Projects General Name', 'project' ),
		'singular_name'         => _x( 'Project', 'Projects Singular Name', 'project' ),
		'menu_name'             => __( 'Projects', 'project' ),
		'name_admin_bar'        => __( 'Projects', 'project' ),
		'archives'              => __( 'Project Archives', 'project' ),
		'attributes'            => __( 'Project Attributes', 'project' ),
		'parent_item_colon'     => __( 'Parent Project:', 'project' ),
		'all_items'             => __( 'All Project', 'project' ),
		'add_new_item'          => __( 'Add New Project', 'project' ),
		'add_new'               => __( 'Add New', 'project' ),
		'new_item'              => __( 'New Project', 'project' ),
		'edit_item'             => __( 'Edit Project', 'project' ),
		'update_item'           => __( 'Update Project', 'project' ),
		'view_item'             => __( 'View Project', 'project' ),
		'view_items'            => __( 'View Project', 'project' ),
		'search_items'          => __( 'Search Project', 'project' ),
		'not_found'             => __( 'Not found', 'project' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'project' ),
		'featured_image'        => __( 'Featured Image', 'project' ),
		'set_featured_image'    => __( 'Set featured image', 'project' ),
		'remove_featured_image' => __( 'Remove featured image', 'project' ),
		'use_featured_image'    => __( 'Use as featured image', 'project' ),
		'insert_into_item'      => __( 'Insert into Project', 'project' ),
		'uploaded_to_this_item' => __( 'Uploaded to this Project', 'project' ),
		'items_list'            => __( 'Workshops list', 'project' ),
		'items_list_navigation' => __( 'Projects list navigation', 'project' ),
		'filter_items_list'     => __( 'Filter Projects list', 'project' ),
	);
	$args   = array(
		'label'               => __( 'Project', 'project' ),
		'description'         => __( 'Its custom post type of workshop', 'project' ),
		'labels'              => $labels,
		'supports'            => array( 'title', 'editor', 'author', 'thumbnail', 'revisions', 'custom-fields', 'page-attributes', 'post-formats' ),
		'taxonomies'          => array( 'project_category' ),
		'hierarchical'        => false,
		'public'              => true,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'menu_position'       => 5,
		'menu_icon'           => 'dashicons-welcome-view-site',
		'show_in_admin_bar'   => true,
		'show_in_nav_menus'   => true,
		'can_export'          => true,
		'has_archive'         => true,
		'exclude_from_search' => false,
		'publicly_queryable'  => true,
		'capability_type'     => 'page',
		'show_in_rest'        => true,
	);
	register_post_type( 'project', $args );

	$labels = array(
		'name'                       => _x( 'Project Categories', 'Taxonomy General Name', 'project_category' ),
		'singular_name'              => _x( 'Project Category', 'Taxonomy Singular Name', 'project_category' ),
		'menu_name'                  => __( 'Project Categories', 'project_category' ),
		'all_items'                  => __( 'All Project Categories', 'project_category' ),
		'parent_item'                => __( 'Parent Project Category', 'project_category' ),
		'parent_item_colon'          => __( 'Parent Project Category:', 'project_category' ),
		'new_item_name'              => __( 'New Project Category Name', 'project_category' ),
		'add_new_item'               => __( 'Add New Project Category', 'project_category' ),
		'edit_item'                  => __( 'Edit Project Category', 'project_category' ),
		'update_item'                => __( 'Update Project Category', 'project_category' ),
		'view_item'                  => __( 'View Project Category', 'project_category' ),
		'separate_items_with_commas' => __( 'Separate Project Categories with commas', 'project_category' ),
		'add_or_remove_items'        => __( 'Add or remove Project Categories', 'project_category' ),
		'choose_from_most_used'      => __( 'Choose from the most used', 'project_category' ),
		'popular_items'              => __( 'Popular Project Categories', 'project_category' ),
		'search_items'               => __( 'Search Project Categories', 'project_category' ),
		'not_found'                  => __( 'Not Found', 'project_category' ),
		'no_terms'                   => __( 'No Project Categories', 'project_category' ),
		'items_list'                 => __( 'Project Categories list', 'project_category' ),
		'items_list_navigation'      => __( 'Project Categories list navigation', 'project_category' ),
	);
	$args   = array(
		'labels'            => $labels,
		'hierarchical'      => false,
		'public'            => true,
		'show_ui'           => true,
		'show_admin_column' => true,
		'show_in_nav_menus' => true,
		'show_tagcloud'     => true,
		'show_in_rest'      => true,
	);
	register_taxonomy( 'project_category', array( 'project' ), $args );
}
add_action( 'init', 'sonho_init_callback' );
