<?php
/*
Title: Guest Directory Activites.
Post Type: dir-activity
Order: 10
Collapse: false
Priority: high
*/
$piklist_editor_options = array( // Pass any option that is accepted by wp_editor()
      'wpautop' => false,
      'media_buttons' => true,
      'shortcode_buttons' => true,
      'teeny' => true,
      'dfw' => false,
      'quicktags' => true,
      'drag_drop_upload' => true,
      'tinymce' => array(
        'resize' => false,
        'wp_autoresize_on' => true
      )
    );

piklist('field',[
  'type' => 'text',
  'label' => __('Website'),
  'field' => 'fg-website',
  'columns' => 12
]);

piklist('field',[
  'type' => 'text',
  'label' => __('Facebook'),
  'field' => 'fg-facebook',
  'columns' => 12
]);
piklist('field',[
  'type' => 'text',
  'label' => __('TripAdvisor'),
  'field' => 'fg-tripadvisor',
  'columns' => 12
]);
piklist('field',[
  'type' => 'text',
  'label' => __('Google+'),
  'field' => 'fg-googleplus',
  'columns' => 12
]);

piklist('field',[
  'type' => 'group',
  'label' => __('Phone'),
  'field' => 'fg-phone',
  'fields' => [
    [
      'type'    => 'text',
      'field'   => 'office',
      'label'   => 'Phone',
      'columns' => 12
    ],
    [
      'type'    => 'text',
      'field'   => 'toll',
      'label'   => 'Toll',
      'columns' => 12
    ],
    [
      'type'    => 'text',
      'field'   => 'mobile',
      'label'   => 'Mobile',
      'columns' => 12
    ],
  ]
]);
piklist('field',[
  'type' => 'group',
  'label' => __('Contact(s)'),
  'field' => 'fg-contact',
  'add_more' => true,
  'columns' => 8,
  'fields' => [
    [
      'type'    => 'text',
      'field'   => 'email',
      'label'   => 'Email',
      'columns' => 12
    ]

  ]
]);
piklist('field',[
  'type' => 'editor',
  'field' => 'fg-summary',
  'label' => __('Body'),
  'description'=> __(''),
  'options' => $piklist_editor_options
]);
piklist('field', [
    'type' => 'file',
    'field' => 'fg-image',
    'label' => 'Activity Images',
    'options' => array('button' => 'Add Image'),
    'columns' => 12
]);
