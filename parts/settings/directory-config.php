<?php
/*
Title: Configuration and Styles
Setting: directory_settings
Order: 10
Tab: Configuration
*/


piklist('field', [
    'type' => 'file',
    'field' => 'dir-logo',
    'label' => 'Logo',
    'options' => array('button' => 'Add Logo'),
    'columns' => 12
]);
piklist('field',[
  'type' => 'text',
  'label' => __('Directory Title'),
  'field' => 'dir-title',
  'columns' => 12
]);
piklist('field',[
  'type' => 'textarea',
  'field' => 'css-general',
  'label' => __('General CSS'),
  'description'=> __(''),
  'attributes' => [
    'rows' => 10,
    'columns' => 60,
    'class' => 'large-text'
  ],
  'value' => "test {\n}"
]);
piklist('field',[
  'type' => 'textarea',
  'field' => 'css-introduction',
  'label' => __('Introduction CSS'),
  'description'=> __(''),
  'attributes' => [
    'rows' => 10,
    'columns' => 60,
    'class' => 'large-text'
  ],
  'value' => "test {\n}"
]);
piklist('field',[
  'type' => 'textarea',
  'field' => 'css-mod-light',
  'label' => __('Module Light CSS'),
  'description'=> __(''),
  'attributes' => [
    'rows' => 10,
    'columns' => 60,
    'class' => 'large-text'
  ],
  'value' => "test {\n}"
]);
piklist('field',[
  'type' => 'textarea',
  'field' => 'css-mod-dark',
  'label' => __('Module Dark CSS'),
  'description'=> __(''),
  'attributes' => [
    'rows' => 10,
    'columns' => 60,
    'class' => 'large-text'
  ],
  'value' => "test {\n}"
]);
