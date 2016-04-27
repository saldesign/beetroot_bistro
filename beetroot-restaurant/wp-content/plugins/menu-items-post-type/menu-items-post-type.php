<?php 

/*
Plugin Name: Menu Item Post Type
Description: Adds the "Menu Items" post types for the menu section
Author: Christian Saldarriaga
Author URI: csaldesign.com
Liscence: GPLv3
Version: 0.1
 */


/**
 * Create the post type
 */

add_action('init', 'menu_register_cpt' );
function menu_register_cpt(){
	register_post_type('menu item', array(
		'public'			=> true, //visible to users
		'has_archive'	=> true, //all menu items archived on one page
		'menu_position'=> 5,
		'menu_icon'		=> 'dashicons-carrot',
		'supports'		=> array(
				'title', 'editor', 'thumbnail', 'custom-fields', 'revisions', 'excerpt'
			),
		'labels'			=> array(
				'name'				=> 'Menu Items',
				'singular_name'	=> 'Menu Item',
				'not_found'			=>	'No Menu Items Found',
				'add_new_item'		=> 'Add a new Menu Item',
				'search_items'		=> 'Search the Menu',
				'menu_name'			=>	'Food Menu'
			),
	) );

}//end register menu CPT

/**
 * Flush permalinks when this plugin is activated
 * Prevent 404 errors when viewing CPTs
 */
function menu_flush(){
	menu_register_cpt();
	flush_rewrite_rules( );
}
register_activation_hook(__FILE__,'menu_flush' );

