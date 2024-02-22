<?php
add_action( 'init', 'register_cpt_slides' );

function register_cpt_slides() {

	$labels = array( 
		'name' => _x( 'slides', 'slides' ),
		'singular_name' => _x( 'slides', 'slides' ),
		'add_new' => _x( 'Add a New Slide', 'slides' ),
		'add_new_item' => _x( 'Add New Slide', 'slides' ),
		'edit_item' => _x( 'Edit Slide', 'slides' ),
		'new_item' => _x( 'New Slide', 'slides' ),
		'view_item' => _x( 'View Slide', 'slides' ),
		'search_items' => _x( 'Search slides', 'slides' ),
		'not_found' => _x( 'No slides found', 'slides' ),
		'not_found_in_trash' => _x( 'No slides found in Trash', 'slides' ),
		'parent_item_colon' => _x( 'Parent:', 'slides' ),
		'menu_name' => _x( 'slides', 'slides' ),
	);

	$args = array( 
		'labels' => $labels,
		'hierarchical' => false,
		
		'supports' => array( 'title', 'revisions', 'editor', 'exerpt', 'comments' ),
		'show_in_menu' => true,
		'show_ui' => true,
		'public' => true,
		
		'menu_icon' => get_bloginfo('template_directory') . '/admin/img/slides.png',
		'exclude_from_search' => true,
		'show_in_nav_menus' => true,
		'publicly_queryable' => true,
		'has_archive' => true,
		'can_export' => true,
		'query_var' => true,
		
		
		'rewrite' => true,
		'capability_type' => 'slides',
		  'capabilities' => array( 
		   'publish_posts' => 'publish_slides', 
		   'edit_posts' => 'edit_slides', 
		   'edit_others_posts' => 'edit_others_slides', 
		   'delete_posts' => 'delete_slides', 
		   'delete_others_posts' => 'delete_others_slides', 
		   'read_private_posts' => 'read_private_slides', 
		   
		   'edit_post' => 'edit_Slide', 
		   'delete_post' => 'delete_Slide', 
		   'read_post' => 'read_Slide' 
		  ) 
	);

	register_post_type( 'slides', $args );
}

?>