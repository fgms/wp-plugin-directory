<?php
/*
Title: Settings.
Setting: directory_settings
Order: 10
Tab: Enables
*/

piklist('field',[
    'type' => 'checkbox',
    'field' => 'gd-announcements-enable',
    'label' => __('Directory Announcements:'),
    'description' => _(''),
    'choices' => [
      'enable' => 'Enable'
    ],
    'value' => 'disable'
]);
piklist('field',[
    'type' => 'checkbox',
    'field' => 'gd-activities-enable',
    'label' => __('Directory Activities:'),
    'description' => _(''),
    'choices' => [
      'enable' => 'Enable'
    ],
    'value' => 'disable'
]);
piklist('field',[
    'type' => 'checkbox',
    'field' => 'gd-dining-enable',
    'label' => __('Directory Dining:'),
    'description' => _(''),
    'choices' => [
      'enable' => 'Enable '
    ],
    'value' => 'disable'
]);
