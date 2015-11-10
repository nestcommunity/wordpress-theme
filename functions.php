<?php
/**
* The Wordpress functions file
*/

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
