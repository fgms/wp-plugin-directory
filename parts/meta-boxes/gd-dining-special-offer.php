<?php
/*
Title: Guest Directory Dining (Special Offer)
Post Type: dir-dining
Order: 20
Collapse: false
Priority: high
*/
$piklist_editor_options = array( // Pass any option that is accepted by wp_editor()
      'wpautop' => false,
      'media_buttons' => false,
      'shortcode_buttons' => false,
      'teeny' => true,
      'dfw' => false,
      'quicktags' => true,
      'drag_drop_upload' => false,
      'tinymce' => array(
        'resize' => false,
        'wp_autoresize_on' => true
      )
    );
piklist('field',[
  'type' => 'group',
  'label' => __(''),
  'field' => 'fg-offer',
  'add_more' => true,
  'fields' => [
    [
      'type'    => 'text',
      'field'   => 'title',
      'label'   => 'Title',
      'columns' => 12
    ],
    [
      'type' => 'editor',
      'field' => 'fg-summary',
      'label' => __(''),
      'description'=> __(''),
      'options' => $piklist_editor_options
    ]

  ]
]);
