<?php
	
if(function_exists("register_field_group"))
{
	register_field_group(array (
		'id' => 'acf_event',
		'title' => 'Event',
		'fields' => array (
			array (
				'key' => 'field_5648637d5cbcc',
				'label' => 'Date',
				'name' => 'date',
				'type' => 'date_picker',
				'instructions' => 'Select a date of the event',
				'required' => 1,
				'date_format' => 'yymmdd',
				'display_format' => 'dd/mm/yy',
				'first_day' => 1,
			),
			array (
				'key' => 'field_564863a95cbcd',
				'label' => 'All day event?',
				'name' => 'all_day_event',
				'type' => 'true_false',
				'required' => 1,
				'message' => '',
				'default_value' => 0,
			),
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
}
