<?php 
/*
	Plugin Name: ACF Options Page
	Description: Create standard options page for ACF Theme Options (Needs ACF installed). Must be activated before all other ACF dependent plugins.
	Author: Marktime Media
	Version: 1.2
	Author URI: http://marktimemedia.com
 */

define( 'MTM_OPTIONS_PLUGIN_DIR', plugin_dir_path( __FILE__ ) );

require_once( MTM_OPTIONS_PLUGIN_DIR . 'lib/mtm_options_page_acf_fields.php' ); 
require_once( MTM_OPTIONS_PLUGIN_DIR . 'lib/helpers.php' );


// Register Theme Options Pages
function mtm_options_page() {

	if ( false !== mtm_acf_check() ) {
		
		acf_add_options_page( array(
			'page_title' 	=> 'Theme General Settings',
			'menu_title'	=> 'Theme Settings',
			'menu_slug' 	=> 'theme-general-settings',
			'capability'	=> 'edit_posts',
			'redirect'		=> true // false gives this its own page
		) );
		
		acf_add_options_sub_page( array(
			'page_title' 	=> 'Theme Header Settings',
			'menu_title'	=> 'Header',
			'parent_slug'	=> 'theme-general-settings',
		) );

		acf_add_options_sub_page( array(
			'page_title' 	=> 'Theme Default Settings',
			'menu_title'	=> 'Defaults',
			'parent_slug'	=> 'theme-general-settings',
		) );
		
		acf_add_options_sub_page( array(
			'page_title' 	=> 'Theme Footer Settings',
			'menu_title'	=> 'Footer',
			'parent_slug'	=> 'theme-general-settings',
		) );
	}	
}

add_action( 'init', 'mtm_options_page' );
