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
require_once('plugins/acf-repeater/acf-repeater.php');
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
 * Remove the admin bar
 */
add_filter('show_admin_bar', '__return_false');

/**
 * Register menus
 */
function register_my_menus() {
	register_nav_menus(
		array(
			'top-menu' => __( 'Top Menu' ),
		)
	);
}
add_action( 'init', 'register_my_menus' );

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
* Register event custom post type
*/
add_action('init', 'event_post_type', 0);
function event_post_type() {

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


/**
* Register startup custom post type
*/
add_action('init', 'startup_post_type', 0);
function startup_post_type() {

	$labels = array(
		'name'                => _x( 'Startup', 'Post Type General Name', 'text_domain' ),
		'singular_name'       => _x( 'Startup', 'Post Type Singular Name', 'text_domain' ),
		'menu_name'           => __( 'Startups', 'text_domain' ),
		'parent_item_colon'   => __( '', 'text_domain' ),
		'all_items'           => __( 'All Startups', 'text_domain' ),
		'view_item'           => __( 'View Startup', 'text_domain' ),
		'add_new_item'        => __( 'Add New Startup', 'text_domain' ),
		'add_new'             => __( 'New Startup', 'text_domain' ),
		'edit_item'           => __( 'Edit Startup', 'text_domain' ),
		'update_item'         => __( 'Update Startup', 'text_domain' ),
		'search_items'        => __( 'Search Startups', 'text_domain' ),
		'not_found'           => __( 'No startups found', 'text_domain' ),
		'not_found_in_trash'  => __( 'No startups found in bin', 'text_domain' ),
	);
	$rewrite = array(
		'slug'                => 'startup',
		'with_front'          => true,
		'pages'               => false,
		'feeds'               => false,
	);
	$args = array(
		'label'               => __( 'startup', 'text_domain' ),
		'description'         => __( 'nest startups', 'text_domain' ),
		'labels'              => $labels,
		'supports'            => array( 'title', 'editor'),
		'hierarchical'        => false,
		'public'              => true,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'show_in_nav_menus'   => true,
		'show_in_admin_bar'   => false,
		'menu_position'       => 20,
		'menu_icon'           => 'dashicons-store',
		'can_export'          => true,
		'has_archive'         => false,
		'exclude_from_search' => false,
		'publicly_queryable'  => true,
		'query_var'           => 'startup',
		'rewrite'             => $rewrite,
		'capability_type'     => 'page',
	);
	register_post_type( 'startup', $args );

}

/**
* Register members custom post type
*/
add_action('init', 'member_post_type', 0);
function member_post_type() {

	$labels = array(
		'name'                => _x( 'Member', 'Post Type General Name', 'text_domain' ),
		'singular_name'       => _x( 'Member', 'Post Type Singular Name', 'text_domain' ),
		'menu_name'           => __( 'Members', 'text_domain' ),
		'parent_item_colon'   => __( '', 'text_domain' ),
		'all_items'           => __( 'All Members', 'text_domain' ),
		'view_item'           => __( 'View Member', 'text_domain' ),
		'add_new_item'        => __( 'Add New Member', 'text_domain' ),
		'add_new'             => __( 'New Member', 'text_domain' ),
		'edit_item'           => __( 'Edit Member', 'text_domain' ),
		'update_item'         => __( 'Update Member', 'text_domain' ),
		'search_items'        => __( 'Search Members', 'text_domain' ),
		'not_found'           => __( 'No members found', 'text_domain' ),
		'not_found_in_trash'  => __( 'No members found in bin', 'text_domain' ),
	);
	$rewrite = array(
		'slug'                => 'member',
		'with_front'          => true,
		'pages'               => false,
		'feeds'               => false,
	);
	$args = array(
		'label'               => __( 'member', 'text_domain' ),
		'description'         => __( 'nest members', 'text_domain' ),
		'labels'              => $labels,
		'supports'            => array( 'title', 'editor'),
		'hierarchical'        => false,
		'public'              => true,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'show_in_nav_menus'   => true,
		'show_in_admin_bar'   => false,
		'menu_position'       => 20,
		'menu_icon'           => 'dashicons-groups',
		'can_export'          => true,
		'has_archive'         => false,
		'exclude_from_search' => false,
		'publicly_queryable'  => true,
		'query_var'           => 'member',
		'rewrite'             => $rewrite,
		'capability_type'     => 'page',
	);
	register_post_type( 'member', $args );

}


/**
* Register opportunites custom post type
*/
add_action('init', 'opportunity_post_type', 0);
function opportunity_post_type() {

	$labels = array(
		'name'                => _x( 'Opportunity', 'Post Type General Name', 'text_domain' ),
		'singular_name'       => _x( 'Opportunity', 'Post Type Singular Name', 'text_domain' ),
		'menu_name'           => __( 'Opportunities', 'text_domain' ),
		'parent_item_colon'   => __( '', 'text_domain' ),
		'all_items'           => __( 'All Opportunities', 'text_domain' ),
		'view_item'           => __( 'View Opportunity', 'text_domain' ),
		'add_new_item'        => __( 'Add New Opportunity', 'text_domain' ),
		'add_new'             => __( 'New Opportunity', 'text_domain' ),
		'edit_item'           => __( 'Edit Opportunity', 'text_domain' ),
		'update_item'         => __( 'Update Opportunity', 'text_domain' ),
		'search_items'        => __( 'Search Opportunities', 'text_domain' ),
		'not_found'           => __( 'No opportunities found', 'text_domain' ),
		'not_found_in_trash'  => __( 'No opportunities found in bin', 'text_domain' ),
	);
	$rewrite = array(
		'slug'                => 'opportunity',
		'with_front'          => true,
		'pages'               => false,
		'feeds'               => false,
	);
	$args = array(
		'label'               => __( 'member', 'text_domain' ),
		'description'         => __( 'nest members', 'text_domain' ),
		'labels'              => $labels,
		'supports'            => array( 'title', 'editor'),
		'hierarchical'        => false,
		'public'              => true,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'show_in_nav_menus'   => true,
		'show_in_admin_bar'   => false,
		'menu_position'       => 20,
		'menu_icon'           => 'dashicons-smiley',
		'can_export'          => true,
		'has_archive'         => false,
		'exclude_from_search' => false,
		'publicly_queryable'  => true,
		'query_var'           => 'opportunity',
		'rewrite'             => $rewrite,
		'capability_type'     => 'page',
	);
	register_post_type( 'opportunity', $args );

}


/**
* Register resources custom post type
*/
add_action('init', 'resource_post_type', 0);
function resource_post_type() {

	$labels = array(
		'name'                => _x( 'Resource', 'Post Type General Name', 'text_domain' ),
		'singular_name'       => _x( 'Resource', 'Post Type Singular Name', 'text_domain' ),
		'menu_name'           => __( 'Resources', 'text_domain' ),
		'parent_item_colon'   => __( '', 'text_domain' ),
		'all_items'           => __( 'All Resources', 'text_domain' ),
		'view_item'           => __( 'View Resource', 'text_domain' ),
		'add_new_item'        => __( 'Add New Resource', 'text_domain' ),
		'add_new'             => __( 'New Resource', 'text_domain' ),
		'edit_item'           => __( 'Edit Resource', 'text_domain' ),
		'update_item'         => __( 'Update Resource', 'text_domain' ),
		'search_items'        => __( 'Search Resources', 'text_domain' ),
		'not_found'           => __( 'No resources found', 'text_domain' ),
		'not_found_in_trash'  => __( 'No resources found in bin', 'text_domain' ),
	);
	$rewrite = array(
		'slug'                => 'resource',
		'with_front'          => true,
		'pages'               => false,
		'feeds'               => false,
	);
	$args = array(
		'label'               => __( 'resources', 'text_domain' ),
		'description'         => __( 'nest resources', 'text_domain' ),
		'labels'              => $labels,
		'supports'            => array( 'title', 'editor'),
		'hierarchical'        => false,
		'public'              => true,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'show_in_nav_menus'   => true,
		'show_in_admin_bar'   => false,
		'menu_position'       => 20,
		'menu_icon'           => 'dashicons-admin-links',
		'can_export'          => true,
		'has_archive'         => false,
		'exclude_from_search' => false,
		'publicly_queryable'  => true,
		'query_var'           => 'resources',
		'rewrite'             => $rewrite,
		'capability_type'     => 'page',
	);
	register_post_type( 'resources', $args );

}

/**
* Register programmes custom post type
*/
add_action('init', 'programme_post_type', 0);
function programme_post_type() {

	$labels = array(
		'name'                => _x( 'Programme', 'Post Type General Name', 'text_domain' ),
		'singular_name'       => _x( 'Programme', 'Post Type Singular Name', 'text_domain' ),
		'menu_name'           => __( 'Programmes', 'text_domain' ),
		'parent_item_colon'   => __( '', 'text_domain' ),
		'all_items'           => __( 'All Programmes', 'text_domain' ),
		'view_item'           => __( 'View Programme', 'text_domain' ),
		'add_new_item'        => __( 'Add New Programme', 'text_domain' ),
		'add_new'             => __( 'New Programme', 'text_domain' ),
		'edit_item'           => __( 'Edit Programme', 'text_domain' ),
		'update_item'         => __( 'Update Programme', 'text_domain' ),
		'search_items'        => __( 'Search Programmes', 'text_domain' ),
		'not_found'           => __( 'No programmes found', 'text_domain' ),
		'not_found_in_trash'  => __( 'No programmes found in bin', 'text_domain' ),
	);
	$rewrite = array(
		'slug'                => 'programme',
		'with_front'          => true,
		'pages'               => false,
		'feeds'               => false,
	);
	$args = array(
		'label'               => __( 'programme', 'text_domain' ),
		'description'         => __( 'nest programme', 'text_domain' ),
		'labels'              => $labels,
		'supports'            => array( 'title', 'editor'),
		'hierarchical'        => false,
		'public'              => true,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'show_in_nav_menus'   => true,
		'show_in_admin_bar'   => false,
		'menu_position'       => 20,
		'menu_icon'           => 'dashicons-welcome-learn-more',
		'can_export'          => true,
		'has_archive'         => false,
		'exclude_from_search' => false,
		'publicly_queryable'  => true,
		'query_var'           => 'programme',
		'rewrite'             => $rewrite,
		'capability_type'     => 'page',
	);
	register_post_type( 'programme', $args );

}

