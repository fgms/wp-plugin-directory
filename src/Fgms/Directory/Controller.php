<?php
namespace Fgms\Directory;
class Controller
{
    private $wp;
    private $post_type;
    private $domain;
    private $posttypes = array();
    public function __construct (\Fgms\WordPress\WordPress $wp)
    {
        $post_type_array = [];
        if ($this->is_enabled('gd-announcements-enable' )){
          $post_type_array[] = [
            'name'          =>'GD Updates',
            'singular_name' =>'GD Update',
            'post_type'     =>'dir-announcement',
            'domain'        =>'fgms-dir-announcement',
            'menu_icon'     =>'dashicons-index-card',
            'supports'      => array('title', 'editor'),
            'exclude_from_search'        => true,
            'public'        => false
          ];
        }
        if ($this->is_enabled('gd-activities-enable' )){
          $post_type_array[] = [
            'name'          =>'GD Activities',
            'singular_name' =>'GD Activity',
            'post_type'     =>'dir-activity',
            'domain'        =>'fgms-activity',
            'menu_icon'     =>'dashicons-index-card',
            'supports'      => array('title'),
            'exclude_from_search'        => true,
            'public'        => false
          ];
        }
        if ($this->is_enabled('gd-dining-enable' )){
          $post_type_array[] = [
            'name'          =>'GD Dining',
            'singular_name' =>'GD Dining',
            'post_type'     =>'dir-dining',
            'domain'        =>'fgms-dining',
            'menu_icon'     =>'dashicons-index-card',
            'supports'      => array('title'),
            'exclude_from_search'        => true,
            'public'        => false
          ];
        }
        $this->posttypes = $post_type_array;
        $this->wp=$wp;
        //	Attach hooks
        $this->wp->add_action('init',[$this,'registerPostType']);
    }

    private function is_enabled($opt, $default=false){
      $theme_options = get_option('directory_settings');
      if (!empty($theme_options[$opt])){
        return ($theme_options[$opt] == 'enable');
      }
      return $default;
    }

    public function registerPostType()
    {
        foreach($this->posttypes as $posttype){
          $this->wp->register_post_type($posttype['post_type'],[
              'labels'          => [
                  'name' => $this->wp->__($posttype['name'],$posttype['domain']),
                  'singular_name' => $this->wp->__($posttype['singular_name'],$posttype['domain']),
                  'add_new_item' => $this->wp->__('Add New '. $posttype['singular_name'], $posttype['domain']),
                  'edit_item' => $this->wp->__('Edit '. $posttype['singular_name'], $posttype['domain']),
                  'new_item' => $this->wp->__('New '. $posttype['singular_name'], $posttype['domain']),
              ],
              'taxonomies'          => empty($posttype['taxonomies']) ? array(): $posttype['taxonomies'],
              'public'              => empty($posttype['public']) ? true : $posttype['public'] ,
              'exclude_from_search' => empty($posttype['exclude_from_search']) ? false :$posttype['exclude_from_search'],
              'menu_icon'           =>$posttype['menu_icon'],
              'has_archive'         => empty($posttype['has_archive']) ? true : $posttype['has_archive'] ,
              'hierarchical'        => true,
              'rewrite'             => ['with_front' => false],
              'supports'            => empty($posttype['supports']) ? array('title','editor','page-attributes','revisions','excerpt','thumbnail') : $posttype['supports']
          ]);
        }
    }
}
