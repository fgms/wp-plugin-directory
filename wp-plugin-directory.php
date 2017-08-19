<?php
/**
 * Plugin Name: Guest Directory
 * Plugin URI: https://github.com/sturple/wp-plugin-directory/
 * Description: Create Guest Directory
 * Version: 0.0.1
 * Author: Shawn Turple
 * Author URI: http://turple.ca
 * License: GPL-3.0
 * Plugin Type: Piklist
 */
if ( file_exists( $composer_autoload = __DIR__ . '/vendor/autoload.php' ) /* check in self */
    || file_exists( $composer_autoload = WP_CONTENT_DIR.'/vendor/autoload.php') /* check in wp-content */
    || file_exists( $composer_autoload = WP_CONTENT_DIR .'/../vendor/autoload.php') /* check in root directory */
    || file_exists( $composer_autoload = plugin_dir_path( __FILE__ ).'vendor/autoload.php') /* check in plugin directory */
    || file_exists( $composer_autoload = get_stylesheet_directory().'/vendor/autoload.php') /* check in child theme */
    || file_exists( $composer_autoload = get_template_directory().'/vendor/autoload.php') /* check in parent theme */
) {

    require_once $composer_autoload;
    require_once __DIR__ .'/shortcodes/guest-directory.php';
}
call_user_func(function () {
    $controller=new \Fgms\Directory\Controller(new \Fgms\WordPress\WordPressImpl());
});
/*
if (class_exists('WPLessPlugin')){
	$lessConfig = WPLessPlugin::getInstance()->getConfiguration();

	// compiles in the active theme, in a ‘compiled-css’ subfolder
	$lessConfig->setUploadDir(plugin_dir_path( __FILE__ ) . 'assets/less');
	$lessConfig->setUploadUrl(plugin_dir_url() . 'assets/css/');
}*/
function setTimeStampMetaDataDir($field,$id){
  if (! empty($_POST['_post_meta'][$field])){
    $date = $_POST['_post_meta'][$field];
    $timestamp_field = str_replace('date','timestamp', $field);
    if (!empty($date)){
      $datetime = new DateTime( $date );
      update_post_meta( $id, $timestamp_field, $datetime->getTimestamp() );
    }
  }
}

add_action( 'pre_get_posts', function($query){
  if ($query->get('post_type') == 'media-clip'){
    $query->set('orderby' ,'meta_value');
    $query->set('meta_key','fg-timestamp');
  }
});
add_action( 'save_post', function($post_id){
  // create another custom meta data fg-timestamp for all date fields.
  $whitelist = ['media-clip', 'newsletter','award','testimonial','special'];
  if ( (!empty($_POST['post_type'])) && (in_array($_POST['post_type'],$whitelist)) ){
    if ($_POST['post_type'] == 'special'){
      setTimeStampMetaDataDir('fg-start-date',$post_id);
      setTimeStampMetaDataDir('fg-end-date',$post_id);
      setTimeStampMetaDataDir('fg-booking-start-date',$post_id);
      setTimeStampMetaDataDir('fg-booking-end-date',$post_id);
    }
    else {
      setTimeStampMetaDataDir('fg-date',$post_id);
    }
  }
});


add_filter('fg_theme_master_twig_locations', function($timberLocationsArray){
  $a = [];
  $a[] = __DIR__ .'/twig-templates';
  return array_merge($a,$timberLocationsArray);
});

add_filter('piklist_admin_pages', function($pages){
  $pages[] = [
   'page_title' => __('Guest Directory Settings')
   ,'menu_title' => __('Guest Directory', 'piklist')
   ,'sub_menu' => 'options-general.php'
   ,'capability' => 'manage_options'
   ,'menu_slug' => 'directory_settings'
   ,'setting' => 'directory_settings'
   ,'single_line' => true
   ,'save_text' => 'Save Settings'
  ];
  return $pages;
});

add_post_type_support( 'dir-activity', 'dir-dining', 'dir-announcement','page-attributes' );

add_action( 'wp_enqueue_scripts', function(){
  $options = get_option('directory_settings');
  $gdirID = empty($options['gd_index']) ? 0 : intval($options['gd_index']);
  if (get_the_ID() == $gdirID ):
    wp_enqueue_style( 'wp-plugin-directory-style', plugin_dir_url( __FILE__ ) . 'assets/css/style.css' );
    wp_enqueue_script('wp-plugin-directory-script',  plugin_dir_url( __FILE__ ) .'assets/js/script.js');
    wp_deregister_style('theme-less');
    wp_deregister_style('master-style-less');
    wp_deregister_style('theme');
    wp_deregister_style('ubermenu');
    wp_deregister_style('ubermenu-white');
    wp_deregister_script('fg-script');
    wp_deregister_script('theme-master-script');
  endif;

}, 35);
