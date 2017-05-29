<?php
/*
Title: Sidebar Images and Ads
Setting: directory_settings
Order: 30
Tab: Sidebar
*/

piklist('field',[
  'type' => 'group',
  'field' => 'ads',
  'description' => __(''),
  'add_more' => true,
  'fields' => [
    [
        'type' => 'file',
        'field' => 'image',
        'label' => 'Image',
        'options' => array('button' => 'Add Image'),
        'columns' => 6
    ],
    [
      'type' => 'text',
      'label' => __('Url'),
      'field' => 'url',
      'columns' => 6
    ]
  ]
]);
