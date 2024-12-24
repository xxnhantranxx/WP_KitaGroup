<?php
// Add page option
$url_icon = get_site_icon_url();
if( function_exists('acf_add_options_page') ) {
	$linkicon = home_url().'/wp-content/uploads/2023/06/favicon.png';
	acf_add_options_page(array(
		'page_title' 	=> 'Theme Options',
		'menu_title'	=> 'Theme Options',
		'menu_slug' 	=> 'theme-general-settings',
		'capability'	=> 'edit_posts',
		'icon_url' => $url_icon,
		'redirect'		=> false
	));
	acf_add_options_sub_page(array(
		'page_title' 	=> 'SMTP Email',
		'menu_title'	=> 'SMTP Email',
		'parent_slug'	=> 'theme-general-settings',
	));
}