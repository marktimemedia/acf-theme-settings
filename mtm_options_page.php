<?php
/*
	Plugin Name: ACF Site Options & Customizer
	Description: Create standard options page for ACF Theme Options (Needs ACF installed), adds global logo options to customizer. Must be activated before all other ACF dependent plugins.
	Author: Marktime Media
	Version: 2.0
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
			'page_title' 	=> 'Global Text & Settings',
			'menu_title'	=> 'Global Text & Settings',
			'menu_slug' => 'global-text-settings',
			'parent_slug'	=> 'theme-general-settings',
		) );

		acf_add_options_sub_page( array(
			'page_title' 	=> 'Social & Sharing Settings',
			'menu_title'	=> 'Social & Sharing',
			'menu_slug' => 'social-sharing-settings',
			'parent_slug'	=> 'theme-general-settings',
		) );
	}
}

add_action( 'init', 'mtm_options_page' );


// Register Customizer Settings

function mtm_customize_register( $wp_customize ) {

	$custom_logo_args = get_theme_support( 'custom-logo' );

	// Mobile Logo
	$wp_customize->add_setting(
    'mtm_mobile_logo', array(
        'default'      => '',
        'transport'    => 'postMessage'
		  )
	);

	$wp_customize->add_control(
    new WP_Customize_Cropped_Image_Control(
        $wp_customize,
        'mtm_mobile_logo',
        array(
            'label'    => 'Mobile Logo',
            'settings' => 'mtm_mobile_logo',
            'section'  => 'title_tagline',
						'height'        => $custom_logo_args[0]['height'],
						'width'         => $custom_logo_args[0]['width'],
						'flex_height'   => $custom_logo_args[0]['flex-height'],
						'flex_width'    => $custom_logo_args[0]['flex-width']
        )
    )
	);

	// Mobile Logo
	$wp_customize->add_setting(
    'mtm_footer_logo', array(
        'default'      => '',
        'transport'    => 'postMessage'
		  )
	);

	$wp_customize->add_control(
    new WP_Customize_Cropped_Image_Control(
        $wp_customize,
        'mtm_footer_logo',
        array(
            'label'    => 'Footer Logo',
            'settings' => 'mtm_footer_logo',
            'section'  => 'title_tagline',
						'height'        => $custom_logo_args[0]['height'],
						'width'         => $custom_logo_args[0]['width'],
						'flex_height'   => $custom_logo_args[0]['flex-height'],
						'flex_width'    => $custom_logo_args[0]['flex-width']
        )
    )
	);

}
add_action( 'customize_register', 'mtm_customize_register' );
