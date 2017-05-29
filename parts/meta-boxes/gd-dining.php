<?php
/*
Title: Guest Directory Dining
Post Type: dir-dining
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
  'type' => 'radio',
  'label' => __('Restaurant Type'),
  'field' => 'fg-restaurant-type',
  'choices' => [
    'onsite' => 'On Site Restaurant',
    'feature' => 'Feature Restaurant',
    'other' => 'Other Restarant'
  ],
  'value' =>'feature',
  'columns' => 8
]);
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
  'label' => __('Address'),
  'field' => 'fg-address',
  'fields' => [
    [
      'type'    => 'textarea',
      'field'   => 'address',
      'label'   => 'Address',
      'columns' => 12
    ],
    [
      'type'    => 'text',
      'field'   => 'city',
      'label'   => 'Dining City',
      'columns' => 12
    ],
    [
      'type'    => 'text',
      'field'   => 'postal',
      'label'   => 'Postal',
      'columns' => 12
    ],
    [
      'type'    => 'text',
      'field'   => 'country',
      'label'   => 'Country',
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
      'field'   => 'name',
      'label'   => 'Name',
      'columns' => 6
    ],
    [
      'type'    => 'text',
      'field'   => 'email',
      'label'   => 'Email',
      'columns' => 6
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
    'label' => 'Dining Images',
    'options' => array('button' => 'Add Image'),
    'columns' => 12
]);
