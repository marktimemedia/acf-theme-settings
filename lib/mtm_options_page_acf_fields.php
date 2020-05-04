<?php
// Register ACF Fields

if( function_exists('acf_add_local_field_group') ):

acf_add_local_field_group(array (
	'key' => 'group_5683294846afd',
	'title' => 'Social Sharing',
	'fields' => array (
		array (
			'key' => 'field_56a16a776c2b8',
			'label' => 'Social Accounts',
			'name' => 'mtm_default_social_accounts',
			'type' => 'repeater',
			'instructions' => 'Optional: Add all your social networks here. Type the name of the social network and the URL of your profile.',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array (
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'collapsed' => 'field_56a16aaa6c2b9',
			'min' => '',
			'max' => '',
			'layout' => 'block',
			'button_label' => 'Add Social Network',
			'sub_fields' => array (
				array (
					'key' => 'field_56a16aaa6c2b9',
					'label' => 'Social Network Name',
					'name' => 'mtm_default_social_name',
					'type' => 'text',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array (
						'width' => 40,
						'class' => '',
						'id' => '',
					),
					'default_value' => '',
					'placeholder' => 'Twitter',
					'prepend' => '',
					'append' => '',
					'maxlength' => '',
					'readonly' => 0,
					'disabled' => 0,
				),
				array (
					'key' => 'field_56a16ff56c2ba',
					'label' => 'Social Network URL',
					'name' => 'mtm_default_social_url',
					'type' => 'url',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array (
						'width' => 60,
						'class' => '',
						'id' => '',
					),
					'default_value' => '',
					'placeholder' => 'http://twitter.com/marktimemedia',
				),
			),
		),
	),
	'location' => array (
		array (
			array (
				'param' => 'options_page',
				'operator' => '==',
				'value' => 'social-sharing-settings',
			),
		),
	),
	'menu_order' => 0,
	'position' => 'normal',
	'style' => 'seamless',
	'label_placement' => 'top',
	'instruction_placement' => 'label',
	'hide_on_screen' => '',
	'active' => 1,
	'description' => '',
));



acf_add_local_field_group(array (
	'key' => 'group_55fafefc457dc',
	'title' => 'Header Settings',
	'fields' => array (
		array (
			'key' => 'field_56a171cab07fa',
			'label' => 'Header Text',
			'name' => 'mtm_header_text',
			'type' => 'wysiwyg',
			'instructions' => 'Extra text, like a phone number, address, or other information to show in the header. If none is entered, this field will be ignored in the layout.',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array (
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'default_value' => '',
			'tabs' => 'all',
			'toolbar' => 'basic',
			'media_upload' => 0,
		),
	),
	'location' => array (
		array (
			array (
				'param' => 'options_page',
				'operator' => '==',
				'value' => 'global-text-settings',
			),
		),
	),
	'menu_order' => 0,
	'position' => 'normal',
	'style' => 'seamless',
	'label_placement' => 'top',
	'instruction_placement' => 'label',
	'hide_on_screen' => '',
	'active' => 1,
	'description' => '',
));

acf_add_local_field_group(array (
	'key' => 'group_55fb003aad8b7',
	'title' => 'Footer Settings',
	'fields' => array (
		array (
			'key' => 'field_55fb007f2e092',
			'label' => 'Copyright Text',
			'name' => 'mtm_copyright_text',
			'type' => 'text',
			'instructions' => 'Text that will show up next to the copyright year. If none is entered, this field will be ignored in the layout.',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array (
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'default_value' => '',
			'placeholder' => '',
			'prepend' => '',
			'append' => '',
			'maxlength' => '',
			'readonly' => 0,
			'disabled' => 0,
		),
		array (
			'key' => 'field_55fb01cfad6bf',
			'label' => 'Additional Text',
			'name' => 'mtm_additional_text',
			'type' => 'wysiwyg',
			'instructions' => 'Additional text, such as an address, contact info, or disclaimer. If none is entered, this field will be ignored in the layout.',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array (
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'default_value' => '',
			'tabs' => 'all',
			'toolbar' => 'basic',
			'media_upload' => 1,
		),
	),
	'location' => array (
		array (
			array (
				'param' => 'options_page',
				'operator' => '==',
				'value' => 'global-text-settings',
			),
		),
	),
	'menu_order' => 0,
	'position' => 'normal',
	'style' => 'seamless',
	'label_placement' => 'top',
	'instruction_placement' => 'label',
	'hide_on_screen' => '',
	'active' => 1,
	'description' => '',
));

acf_add_local_field_group(array (
	'key' => 'group_5683294846afdsfdgd',
	'title' => 'Post Settings',
	'fields' => array (
		array (
			'key' => 'field_5683294d29566',
			'label' => 'Default Featured Image',
			'name' => 'mtm_default_featured_image',
			'type' => 'image',
			'instructions' => 'Optional: Set a default featured image for all posts without one',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array (
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'return_format' => 'array',
			'preview_size' => 'medium',
			'library' => 'all',
			'min_width' => '',
			'min_height' => '',
			'min_size' => '',
			'max_width' => '',
			'max_height' => '',
			'max_size' => '',
			'mime_types' => '',
		),
	),
	'location' => array (
		array (
			array (
				'param' => 'options_page',
				'operator' => '==',
				'value' => 'global-text-settings',
			),
		),
	),
	'menu_order' => 0,
	'position' => 'normal',
	'style' => 'seamless',
	'label_placement' => 'top',
	'instruction_placement' => 'label',
	'hide_on_screen' => '',
	'active' => 1,
	'description' => '',
));

acf_add_local_field_group(array(
	'key' => 'group_5eaece01479bf',
	'title' => '404 Page',
	'fields' => array(
		array(
			'key' => 'field_5eaece0773a1d',
			'label' => 'Custom 404 Page',
			'name' => 'mtm_custom_404_page',
			'type' => 'post_object',
			'instructions' => 'Select a page to use as your custom 404 page (if the theme supports this feature). If none is selected, the default theme content will be used.',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'post_type' => array(
				0 => 'page',
			),
			'taxonomy' => '',
			'allow_null' => 1,
			'multiple' => 0,
			'return_format' => 'object',
			'ui' => 1,
		),
		array(
			'key' => 'field_5eaed4bb3ce87',
			'label' => 'Enable search',
			'name' => 'mtm_custom_404_page_enable_search',
			'type' => 'true_false',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'message' => 'I would like to show the search bar on the 404 Page',
			'default_value' => 1,
			'ui' => 0,
			'ui_on_text' => '',
			'ui_off_text' => '',
		),
	),
	'location' => array(
		array(
			array(
				'param' => 'options_page',
				'operator' => '==',
				'value' => 'special-pages',
			),
		),
	),
	'menu_order' => 0,
	'position' => 'normal',
	'style' => 'seamless',
	'label_placement' => 'top',
	'instruction_placement' => 'label',
	'hide_on_screen' => '',
	'active' => true,
	'description' => '',
));

endif;
