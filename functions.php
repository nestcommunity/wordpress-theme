<?php
/**
* ----------------------------
* The Wordpress functions file
* ----------------------------
*/

//Remove ACF
define('ACF_LITE', false);

//Include plugins
require_once('plugins/custom-permalinks/custom-permalinks.php');
require_once('plugins/advanced-custom-fields/acf.php');
require_once('acf.php');

/**
* Change the admin footer
*/
add_filter('admin_footer_text', 'remove_footer_admin');
function remove_footer_admin (){
    echo '<span id="footer-thankyou">Developed by the nest builders</span>';
}

/**
* Change the admin bar
*/
add_action( 'admin_bar_menu', 'clean_admin_toolbar', 999 );
function clean_admin_toolbar( $wp_toolbar ) {
	$wp_toolbar->remove_node( 'wp-logo' );
	$wp_toolbar->remove_node('comments');
	$wp_toolbar->remove_node('new-content');
	$wp_toolbar->remove_node('wpseo-menu');
	$wp_toolbar->remove_node('search');
}

/**
* Add a custom login logo
*/
add_action('login_head',  'my_custom_login_logo');
function my_custom_login_logo()
{
    echo '<style  type="text/css"> h1 a {  background-image:url("/wp-content/themes/nest-community/images/login.png")  !important; width:200px !important; height: 150px !important; background-size: 200px !important; } </style>';
}

/**
* Remove menu items
*/
add_action( 'admin_menu', 'remove_menus' );
function remove_menus(){
	remove_menu_page( 'edit.php' );
	remove_menu_page( 'edit-comments.php' );
	remove_menu_page( 'upload.php' );
}

/**
* Register even custom post type
*/
add_action('init', 'portfolio_post_type', 0);
function portfolio_post_type() {

	$labels = array(
		'name'                => _x( 'Event', 'Post Type General Name', 'text_domain' ),
		'singular_name'       => _x( 'Event', 'Post Type Singular Name', 'text_domain' ),
		'menu_name'           => __( 'Events', 'text_domain' ),
		'parent_item_colon'   => __( '', 'text_domain' ),
		'all_items'           => __( 'All Events', 'text_domain' ),
		'view_item'           => __( 'View Event', 'text_domain' ),
		'add_new_item'        => __( 'Add New Event', 'text_domain' ),
		'add_new'             => __( 'New Event', 'text_domain' ),
		'edit_item'           => __( 'Edit Event', 'text_domain' ),
		'update_item'         => __( 'Update Event', 'text_domain' ),
		'search_items'        => __( 'Search events', 'text_domain' ),
		'not_found'           => __( 'No events found', 'text_domain' ),
		'not_found_in_trash'  => __( 'No events found in bin', 'text_domain' ),
	);
	$rewrite = array(
		'slug'                => 'event',
		'with_front'          => true,
		'pages'               => false,
		'feeds'               => false,
	);
	$args = array(
		'label'               => __( 'event', 'text_domain' ),
		'description'         => __( 'nest events', 'text_domain' ),
		'labels'              => $labels,
		'supports'            => array( 'title', 'editor'),
		'hierarchical'        => false,
		'public'              => true,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'show_in_nav_menus'   => true,
		'show_in_admin_bar'   => false,
		'menu_position'       => 20,
		'menu_icon'           => 'dashicons-calendar-alt',
		'can_export'          => true,
		'has_archive'         => false,
		'exclude_from_search' => false,
		'publicly_queryable'  => true,
		'query_var'           => 'event',
		'rewrite'             => $rewrite,
		'capability_type'     => 'page',
	);
	register_post_type( 'event', $args );

}
