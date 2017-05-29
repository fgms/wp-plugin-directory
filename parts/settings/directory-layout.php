<?php
/*
Title: Modules
Setting: directory_settings
Order: 20
Tab: Modules
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
  'type' => 'group',
  'field' => 'home-section',
  'description' => __('Home Section'),
  'add_more' => true,
  'fields' => [
    [
      'type' => 'select',
      'label' => __('Type'),
      'field' => 'type',
      'choices' => [
        'announcements'   => 'Announcements',
        'services'        => 'Services',
        'activities'      => 'Activities',
        'dining'          => 'Dining',
        'transportation'  => 'Transportation',
        'realestate'      => 'Real-estate',
        'contact'         => 'Contact',
        'custom'          => 'Custom'
      ],
      'columns' => 4
    ],
    [
      'type' => 'text',
      'label' => 'Title',
      'field' => 'title',
      'columns' => 4
    ],

    [
      'type' => 'editor',
      'field' => 'content',
      'label' => __('Content'),
      'description'=> __(''),
      'options' => $piklist_editor_options

    ]
  ]
]);

piklist('field',[
  'type' => 'group',
  'field' => 'sections',
  'description' => __('Sections'),
  'add_more' => true,
  'fields' => [
    [
      'type' => 'select',
      'label' => __('Type'),
      'field' => 'type',
      'choices' => [
        'announcements'   => 'Announcements',
        'services'        => 'Services',
        'activities'      => 'Activities',
        'dining'          => 'Dining',
        'transportation'  => 'Transportation',
        'realestate'      => 'Real-estate',
        'contact'         => 'Contact',
        'custom'          => 'Custom'
      ],
      'columns' => 4
    ],
    [
      'type' => 'text',
      'label' => 'Title',
      'field' => 'title',
      'columns' => 4
    ],
    [
      'type' => 'select',
      'label' => 'Module Type',
      'field' => 'module-type',
      'choices' => [
        ''      => '',
        'light' => 'Light',
        'dark'  => 'Dark'
      ],
      'columns' => 4
    ],    
    [
      'type' => 'editor',
      'field' => 'content',
      'label' => __('Content'),
      'description'=> __(''),
      'options' => $piklist_editor_options
    ]
  ]
]);
