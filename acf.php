<?php

if(function_exists("register_field_group"))
{
	register_field_group(array (
			'id' => 'acf_about-page',
			'title' => 'About Page',
			'fields' => array (
					array (
							'key' => 'field_56bfae1e23124',
							'label' => 'Sections',
							'name' => 'sections',
							'type' => 'repeater',
							'sub_fields' => array (
									array (
											'key' => 'field_56bfae3523125',
											'label' => 'Heading',
											'name' => 'heading',
											'type' => 'text',
											'required' => 1,
											'column_width' => '',
											'default_value' => '',
											'placeholder' => '',
											'prepend' => '',
											'append' => '',
											'formatting' => 'html',
											'maxlength' => '',
									),
									array (
											'key' => 'field_56bfae5823126',
											'label' => 'Contents',
											'name' => 'contents',
											'type' => 'wysiwyg',
											'column_width' => '',
											'default_value' => '',
											'toolbar' => 'full',
											'media_upload' => 'yes',
									),
							),
							'row_min' => '',
							'row_limit' => 8,
							'layout' => 'table',
							'button_label' => 'Add Row',
					),
			),
			'location' => array (
					array (
							array (
									'param' => 'page',
									'operator' => '==',
									'value' => '60',
									'order_no' => 0,
									'group_no' => 0,
							),
					),
			),
			'options' => array (
					'position' => 'normal',
					'layout' => 'no_box',
					'hide_on_screen' => array (
							0 => 'the_content',
					),
			),
			'menu_order' => 0,
	));
	register_field_group(array (
			'id' => 'acf_event',
			'title' => 'Event',
			'fields' => array (
					array (
							'key' => 'field_564863d85cbce',
							'label' => 'Time',
							'name' => 'time',
							'type' => 'text',
							'instructions' => 'What time is the event?',
							'required' => 1,
							'conditional_logic' => array (
									'status' => 1,
									'rules' => array (
											array (
													'field' => 'field_564863a95cbcd',
													'operator' => '!=',
													'value' => '1',
											),
									),
									'allorany' => 'all',
							),
							'default_value' => '',
							'placeholder' => '',
							'prepend' => '',
							'append' => '',
							'formatting' => 'html',
							'maxlength' => '',
					),
			),
			'location' => array (
					array (
							array (
									'param' => 'post_type',
									'operator' => '==',
									'value' => 'event',
									'order_no' => 0,
									'group_no' => 0,
							),
					),
			),
			'options' => array (
					'position' => 'acf_after_title',
					'layout' => 'no_box',
					'hide_on_screen' => array (
							0 => 'excerpt',
							1 => 'custom_fields',
							2 => 'discussion',
							3 => 'comments',
							4 => 'revisions',
							5 => 'slug',
							6 => 'author',
							7 => 'format',
							8 => 'featured_image',
							9 => 'categories',
							10 => 'tags',
							11 => 'send-trackbacks',
					),
			),
			'menu_order' => 0,
	));
	register_field_group(array (
			'id' => 'acf_member',
			'title' => 'Member',
			'fields' => array (
					array (
							'key' => 'field_56991c9325670',
							'label' => 'Startups',
							'name' => 'startups',
							'type' => 'relationship',
							'return_format' => 'object',
							'post_type' => array (
									0 => 'startup',
							),
							'taxonomy' => array (
									0 => 'all',
							),
							'filters' => array (
									0 => 'search',
							),
							'result_elements' => array (
									0 => 'post_type',
									1 => 'post_title',
							),
							'max' => '',
					),
			),
			'location' => array (
					array (
							array (
									'param' => 'post_type',
									'operator' => '==',
									'value' => 'member',
									'order_no' => 0,
									'group_no' => 0,
							),
					),
			),
			'options' => array (
					'position' => 'normal',
					'layout' => 'no_box',
					'hide_on_screen' => array (
							0 => 'permalink',
							1 => 'the_content',
							2 => 'excerpt',
							3 => 'custom_fields',
							4 => 'discussion',
							5 => 'comments',
							6 => 'revisions',
							7 => 'slug',
							8 => 'author',
							9 => 'format',
							10 => 'featured_image',
							11 => 'categories',
							12 => 'tags',
							13 => 'send-trackbacks',
					),
			),
			'menu_order' => 0,
	));
	register_field_group(array (
			'id' => 'acf_opportunity',
			'title' => 'Opportunity',
			'fields' => array (
					array (
							'key' => 'field_56991ea4e4287',
							'label' => 'Required by',
							'name' => 'required_by',
							'type' => 'date_picker',
							'date_format' => 'yymmdd',
							'display_format' => 'dd/mm/yy',
							'first_day' => 1,
					),
			),
			'location' => array (
					array (
							array (
									'param' => 'post_type',
									'operator' => '==',
									'value' => 'opportunity',
									'order_no' => 0,
									'group_no' => 0,
							),
					),
			),
			'options' => array (
					'position' => 'acf_after_title',
					'layout' => 'no_box',
					'hide_on_screen' => array (
							0 => 'permalink',
							1 => 'excerpt',
							2 => 'custom_fields',
							3 => 'discussion',
							4 => 'comments',
							5 => 'revisions',
							6 => 'slug',
							7 => 'author',
							8 => 'format',
							9 => 'featured_image',
							10 => 'categories',
							11 => 'tags',
							12 => 'send-trackbacks',
					),
			),
			'menu_order' => 0,
	));
	register_field_group(array (
			'id' => 'acf_resources',
			'title' => 'Resources',
			'fields' => array (
					array (
							'key' => 'field_5699352d84262',
							'label' => 'Description',
							'name' => 'description',
							'type' => 'textarea',
							'default_value' => '',
							'placeholder' => '',
							'maxlength' => '',
							'rows' => '',
							'formatting' => 'br',
					),
			),
			'location' => array (
					array (
							array (
									'param' => 'post_type',
									'operator' => '==',
									'value' => 'resources',
									'order_no' => 0,
									'group_no' => 0,
							),
					),
			),
			'options' => array (
					'position' => 'normal',
					'layout' => 'no_box',
					'hide_on_screen' => array (
							0 => 'permalink',
							1 => 'the_content',
							2 => 'excerpt',
							3 => 'custom_fields',
							4 => 'discussion',
							5 => 'comments',
							6 => 'revisions',
							7 => 'slug',
							8 => 'author',
							9 => 'format',
							10 => 'featured_image',
							11 => 'categories',
							12 => 'tags',
							13 => 'send-trackbacks',
					),
			),
			'menu_order' => 0,
	));
	register_field_group(array (
			'id' => 'acf_startup',
			'title' => 'Startup',
			'fields' => array (
					array (
							'key' => 'field_56991d452ec5c',
							'label' => 'Members',
							'name' => 'members',
							'type' => 'relationship',
							'return_format' => 'object',
							'post_type' => array (
									0 => 'member',
							),
							'taxonomy' => array (
									0 => 'all',
							),
							'filters' => array (
									0 => 'search',
							),
							'result_elements' => array (
									0 => 'post_type',
									1 => 'post_title',
							),
							'max' => '',
					),
			),
			'location' => array (
					array (
							array (
									'param' => 'post_type',
									'operator' => '==',
									'value' => 'startup',
									'order_no' => 0,
									'group_no' => 0,
							),
					),
			),
			'options' => array (
					'position' => 'normal',
					'layout' => 'no_box',
					'hide_on_screen' => array (
							0 => 'permalink',
							1 => 'the_content',
							2 => 'excerpt',
							3 => 'custom_fields',
							4 => 'discussion',
							5 => 'comments',
							6 => 'revisions',
							7 => 'slug',
							8 => 'author',
							9 => 'format',
							10 => 'featured_image',
							11 => 'categories',
							12 => 'tags',
							13 => 'send-trackbacks',
					),
			),
			'menu_order' => 0,
	));
}