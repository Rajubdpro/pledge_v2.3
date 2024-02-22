<?php
add_action( 'init', 'register_cpt_projects' );
add_action( 'init', 'create_project_taxonomies', 0 );



add_filter( 'manage_edit-projects_columns', 'my_edit_projects_columns' ) ;

function my_edit_projects_columns( $columns ) {

	$columns = array(
		'cb' => '<input type="checkbox" />',
		'title' => __( 'Project' ),
		'author' => __( 'Author' ),
		'comments'=> __( '' ),
		'date' => __('Date'),
	);
	return $columns;
}

function register_cpt_projects() {

	$labels = array(
		'name' => _x( 'Projects', 'projects' ),
		'singular_name' => _x( 'Projects', 'projects' ),
		'add_new' => _x( 'Add a New Project', 'projects' ),
		'add_new_item' => _x( 'Add New Project', 'projects' ),
		'edit_item' => _x( 'Edit Project', 'projects' ),
		'new_item' => _x( 'New Project', 'projects' ),
		'view_item' => _x( 'View Project', 'projects' ),
		'search_items' => _x( 'Search Projects', 'projects' ),
		'not_found' => _x( 'No Projects found', 'projects' ),
		'not_found_in_trash' => _x( 'No Projects found in Trash', 'projects' ),
		'parent_item_colon' => _x( 'Parent:', 'projects' ),
		'menu_name' => _x( 'Projects', 'projects' ),
	);

	$args = array(
		'labels' => $labels,
		'hierarchical' => false,

		'supports' => array( 'title', 'revisions', 'editor', 'exerpt', 'comments' ),
		'taxonomies' => array( 'projects_cats' ),
		'show_in_menu' => true,
		'show_ui' => true,
		'public' => true,

		'menu_icon' => get_bloginfo('template_directory') . '/admin/img/projects.png',
		'exclude_from_search' => true,
		'show_in_nav_menus' => true,
		'publicly_queryable' => true,
		'has_archive' => true,
		'can_export' => true,
		'query_var' => true,


		'rewrite' => true,
		'capability_type' => 'projects',
			'capabilities' => array(
				'publish_posts' => 'publish_projects',
				'edit_posts' => 'edit_projects',
				'edit_others_posts' => 'edit_others_projects',
				'delete_posts' => 'delete_projects',
				'delete_others_posts' => 'delete_others_projects',
				'read_private_posts' => 'read_private_projects',

				'edit_post' => 'edit_project',
				'delete_post' => 'delete_project',
				'read_post' => 'read_project'
			)
		);

	register_post_type( 'projects', $args );
}



function create_project_taxonomies() {
    register_taxonomy(
        'projects_category',
        'projects',
        array(
            'labels' => array(
                'name' => 'Category',
                'add_new_item' => 'Add New Category',
                'new_item_name' => "New Category"
            ),
            'show_ui' => true,
            'show_tagcloud' => false,
            'hierarchical' => false
        )
    );

}



?>
