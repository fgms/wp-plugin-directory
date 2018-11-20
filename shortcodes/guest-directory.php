<?php
call_user_func(function () {
	add_shortcode('guest_directory', function ($atts, $content)  {
		$data = ['config' =>get_transient('fg_config')];
		$options = get_option('directory_settings');
        $template = dirname(__FILE__) .'/includes/guest-directory-base.php';
		
        ob_start();
        include_once $template;
        $retr=ob_get_contents();
        ob_end_clean();
		return $retr ;
	});
});
?>
