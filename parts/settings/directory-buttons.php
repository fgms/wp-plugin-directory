<?php
/*
Title: Nav Buttons
Setting: directory_settings
Order: 10
Tab: Buttons
*/

piklist('field',[
  'type' => 'group',
  'label' => __('Directory Buttons'),
  'field' => 'dir-buttons',
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
      'field'   => 'url',
      'label'   => 'URL',
      'columns' => 6
    ]

  ]
]);
