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
	register_post_type('menuitem', array(
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

	//Register the "menuitemcat" taxonomy
	register_taxonomy('menuitemcat', 'menuitem', array(
 		'hierarchical'			=> true,
 		'show_admin_column'	=> true,
 		'labels'					=> array(
 				'name'				=>	'Menu Item Categories',
 				'singular_name'	=> 'Menu Item Category',
 				'add_new_item'		=>	'Add Item Category',
 				'search_items'		=> 'Search Item Categories',
 				'not_found'			=>	'No Item Categories Found'
 			),
	));

	//Register the "dietarypref" taxonomy
	register_taxonomy('dietarypref', 'menuitem', array(
			'hierarchical' => true,
			'show_admin_column' => true,
			'labels' => array(
					'name' => 'Dietary Preferences',
					'singular_name' => 'Dietary Preference',
					'add_new_item' => 'Add Preference',
					'search_items' => 'Search Dietary Preferences',
					'not_found' => 'No Preferences found'
				),
		));

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

