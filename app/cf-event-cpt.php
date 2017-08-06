<?php
if ( ! function_exists('event_post_type') ) {

	// Register Custom Post Type
	function event_post_type() {

		$labels = array(
			'name'                  => _x( 'Evenements', 'Post Type General Name', 'sage' ),
			'singular_name'         => _x( 'Evenement', 'Post Type Singular Name', 'sage' ),
			'menu_name'             => __( 'Evenements', 'sage' ),
			'name_admin_bar'        => __( 'Evenements', 'sage' ),
			'archives'              => __( 'Evenements Archives', 'sage' ),
			'attributes'            => __( 'Evenements Attributes', 'sage' ),
			'parent_item_colon'     => __( 'Parent Evenement:', 'sage' ),
			'all_items'             => __( 'All Evenements', 'sage' ),
			'add_new_item'          => __( 'Add New Evenements', 'sage' ),
			'add_new'               => __( 'Add New', 'sage' ),
			'new_item'              => __( 'New Evenement', 'sage' ),
			'edit_item'             => __( 'Edit Evenement', 'sage' ),
			'update_item'           => __( 'Update Evenement', 'sage' ),
			'view_item'             => __( 'View Evenements', 'sage' ),
			'view_items'            => __( 'View Evenements', 'sage' ),
			'search_items'          => __( 'Search Evenement', 'sage' ),
			'not_found'             => __( 'Not found', 'sage' ),
			'not_found_in_trash'    => __( 'Not found in Trash', 'sage' ),
			'featured_image'        => __( 'Featured Image', 'sage' ),
			'set_featured_image'    => __( 'Set featured image', 'sage' ),
			'remove_featured_image' => __( 'Remove featured image', 'sage' ),
			'use_featured_image'    => __( 'Use as featured image', 'sage' ),
			'insert_into_item'      => __( 'Insert into Evenement', 'sage' ),
			'uploaded_to_this_item' => __( 'Uploaded to this Evenement', 'sage' ),
			'items_list'            => __( 'Evenement list', 'sage' ),
			'items_list_navigation' => __( 'Evenements list navigation', 'sage' ),
			'filter_items_list'     => __( 'Filter Evenements list', 'sage' ),
		);
		$args = array(
			'label'                 => __( 'Evenement', 'sage' ),
			'description'           => __( 'Liste d\'evennement d\'octobre à Paris', 'sage' ),
			'labels'                => $labels,
			'supports'              => array( 'title', 'editor', 'thumbnail', 'excerpt' ),
			'taxonomies'            => array( 'category', 'post_tag' ),
			'hierarchical'          => false,
			'public'                => true,
			'show_ui'               => true,
			'show_in_menu'          => true,
			'menu_position'         => 5,
			'menu_icon'             => 'dashicons-calendar-alt',
			'show_in_admin_bar'     => true,
			'show_in_nav_menus'     => true,
			'can_export'            => true,
			'has_archive'           => true,
			'exclude_from_search'   => false,
			'publicly_queryable'    => true,
			'capability_type'       => 'page',
			'show_in_rest'          => true,
		);
		register_post_type( 'event', $args );
	}
	add_action( 'init', 'event_post_type', 0 );

}

?>
