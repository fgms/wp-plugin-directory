<?php
/*
Title: Property Services
Setting: directory_settings
Order: 20
Tab: Services
*/
$piklist_editor_options = array( // Pass any option that is accepted by wp_editor()
      'wpautop' => false,
      'media_buttons' => true,
      'textarea_rows' => 5,
      'editor_height' => 75,
      'shortcode_buttons' => false,
      'teeny' => false,
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
  'field' => 'services',
  'description' => __('Services'),
  'add_more' => true,
  'fields' => [
    [
      'type' => 'text',
      'label' => 'Title',
      'field' => 'title',
      'columns' => 6
    ],
    [
      'type' => 'text',
      'label' => 'Phone',
      'field' => 'phone',
      'columns' => 3,
      'value' => 'Call extension 0'
    ],
    [
      'type' => 'text',
      'label' => 'Online',
      'field' => 'online',
      'columns' => 3
    ],
    [
      'type' => 'editor',
      'field' => 'content',
      'label' => __('Content'),
      'description'=> __(''),
      'attributes' =>[
        'rows' => 3
      ],
      'options' => $piklist_editor_options
    ]
  ]
]);
