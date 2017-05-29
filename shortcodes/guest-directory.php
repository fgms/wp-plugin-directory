<?php
call_user_func(function () {
	add_shortcode('guest_directory',function ($atts, $content)  {
		$data = ['config' =>get_transient('fg_config')];
		$options = get_option('directory_settings');  
    $template = 'guest-directory-base.twig';
		// check if it is a gallery type post
      try {
        ob_start();
        Timber::render($template,array_merge($data,['options' => $options]));
        $retr=ob_get_contents();
        ob_end_clean();
      } catch (Twig_Error_Loader $e){
        $retr = '<script>console.error("Error Loading twig template '. $template . ' ' .str_replace('"',"'",$e->getMessage()) .'")</script>';
      }
/*
      $retr .= '<pre>';
      $retr .= print_r($gallery, true);
      $retr .= '</pre>';
*/


			return $retr ;
		});
	});
?>
