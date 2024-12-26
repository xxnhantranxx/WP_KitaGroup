<?php
//Add css/js login page
function my_login_stylesheet() {
  wp_enqueue_style( 'custom-login', get_stylesheet_directory_uri() . '/css/admin/style-login.css' );
  wp_enqueue_script( 'custom-login', get_stylesheet_directory_uri() . '/js/admin/style-login.js' );
}
add_action( 'login_enqueue_scripts', 'my_login_stylesheet' );

//Add css admin page
add_action( 'admin_enqueue_scripts', 'load_admin_style' );
function load_admin_style() {
    wp_enqueue_style( 'admin_css', get_stylesheet_directory_uri() . '/css/admin/admin-style.css', false, '1.0.0' );
    wp_register_script( 'admin_js', get_stylesheet_directory_uri() . '/js/admin/admin.js');
    wp_enqueue_script('admin_js');
}

// Add All Css header
function style_core_devmd()
{
  wp_register_style('css_screen_first', get_stylesheet_directory_uri() . '/css/web/header.css');
  wp_enqueue_style('css_screen_first');
  wp_register_style('css_fw6', get_stylesheet_directory_uri() .'/asset/css/fontawesome-all.css');
  wp_enqueue_style('css_fw6');
  wp_register_style('css_select_2', get_stylesheet_directory_uri() .'/asset/css/select2.min.css');
  wp_enqueue_style('css_select_2');
  wp_register_style('style_swiper', get_stylesheet_directory_uri() . '/asset/css/swiper-bundle.min.css');
  wp_enqueue_style('style_swiper');
  // wp_register_style('fancybox', get_stylesheet_directory_uri() . '/asset/css/jquery.fancybox.min.css');
  // wp_enqueue_style('fancybox');
  // wp_register_style('wheel', get_stylesheet_directory_uri() . '/asset/css/wheel.css');
  // wp_enqueue_style('wheel');
  wp_register_style('animation', get_stylesheet_directory_uri() . '/asset/css/animate.css');
  wp_enqueue_style('animation');
  wp_register_style('style_system', get_stylesheet_directory_uri() . '/css/web/system-core.css');
  wp_enqueue_style('style_system');
  wp_register_style('checkout', get_stylesheet_directory_uri() . '/css/web/survey-style.css');
  wp_enqueue_style('checkout');
  wp_register_style('intlTelInput', get_stylesheet_directory_uri() . '/asset/css/intlTelInput.min.css');
  wp_enqueue_style('intlTelInput');
  wp_register_style('checkout_res', get_stylesheet_directory_uri() . '/css/web/survey-responsive-style.css');
  wp_enqueue_style('checkout_res');
  wp_register_style('style_footer', get_stylesheet_directory_uri() . '/css/web/footer.css');
  wp_enqueue_style('style_footer');
  wp_register_style('style_customize', get_stylesheet_directory_uri() . '/css/web/customize.css');
  wp_enqueue_style('style_customize');
  wp_register_style('css_responsive', get_stylesheet_directory_uri() . '/css/web/responsive.css');
  wp_enqueue_style('css_responsive');
}
add_action('wp_enqueue_scripts', 'style_core_devmd', 101);

//Add All CSS AND SCRIPT TO FOOTER
function prefix_add_footer_styles()
{
  // wp_register_script('fontawesome_6', get_stylesheet_directory_uri() . '/asset/js/fontawesome-all.js');
  // wp_enqueue_script('fontawesome_6');
  wp_register_script('select2js', get_stylesheet_directory_uri() . '/asset/js/select2.min.js');
  wp_enqueue_script('select2js');
  wp_register_script('swiperjs', get_stylesheet_directory_uri() . '/asset/js/swiper-bundle.min.js');
  wp_enqueue_script('swiperjs');
  // wp_register_script('fancyboxjs', get_stylesheet_directory_uri() . '/asset/js/jquery.fancybox.min.js');
  // wp_enqueue_script('fancyboxjs');
  // wp_register_script('wheeljs', get_stylesheet_directory_uri() . '/asset/js/wheel.js');
  // wp_enqueue_script('wheeljs');
    wp_register_script('checkout_js', get_stylesheet_directory_uri() . '/js/web/layout.js');
    wp_enqueue_script('checkout_js');
    wp_register_script('wowjs', get_stylesheet_directory_uri() . '/asset/js/wow.js');
    wp_enqueue_script('wowjs');
    // if ( is_checkout() ){
    //     wp_register_script('intlTelInputWithUtils', get_stylesheet_directory_uri() . '/asset/js/intlTelInputWithUtils.min.js');
    //     wp_enqueue_script('intlTelInputWithUtils');

    //     wp_register_script('phoneInputWithUtils', get_stylesheet_directory_uri() . '/js/web/phoneInputWithUtils.js');
    //     wp_enqueue_script('phoneInputWithUtils');   
    // }
  wp_register_script('SwiperCustomize', get_stylesheet_directory_uri() . '/js/web/SwiperCustomize.js');
  wp_enqueue_script('SwiperCustomize');
  // wp_register_script('color', get_stylesheet_directory_uri() . '/js/web/color-change.js');
  // wp_enqueue_script('color');
  
  wp_register_script('MyJs', get_stylesheet_directory_uri() . '/js/web/MyJs.js');
  wp_enqueue_script('MyJs');
};
add_action('get_footer', 'prefix_add_footer_styles');

//Khởi tạo menu
function register_settings_link()
{
  register_setting('my-settings-group-2', 'link_video');
  register_setting('my-settings-group-2', 'hidden_plugins');
  register_setting('my-settings-group-2', 'hidden_themes');
  register_setting('my-settings-group-2', 'hidden_acf');
  register_setting('my-settings-group-2', 'hidden_ctf7');
  register_setting('my-settings-group-2', 'hidden_comment');
  register_setting('my-settings-group-2', 'hidden_dgwt');
  register_setting('my-settings-group-2', 'hidden_tool');
  register_setting('my-settings-group-2', 'hidden_block');
  register_setting('my-settings-group-2', 'hidden_itsec');
  register_setting('my-settings-group-2', 'turn_off_update');
}

add_action('admin_init', 'register_settings_link');

/*Xóa widget */
function nt_remove_default_admin_widget_1()
{
  remove_meta_box('dashboard_primary', 'dashboard', 'side');
  remove_meta_box('dashboard_secondary', 'dashboard', 'normal');
  remove_meta_box('dashboard_quick_press', 'dashboard', 'side');
  remove_meta_box('dashboard_recent_drafts', 'dashboard', 'side');
  remove_meta_box('dashboard_recent_comments', 'dashboard', 'normal');
  remove_meta_box('dashboard_right_now', 'dashboard', 'normal');
  remove_meta_box('dashboard_activity', 'dashboard', 'normal'); //since 3.8
  remove_meta_box('dashboard_incoming_links', 'dashboard', 'normal');
  // remove_meta_box('woocommerce_dashboard_recent_reviews', 'dashboard', 'normal');
  remove_meta_box('e-dashboard-overview', 'dashboard', 'normal');
  remove_meta_box('dashboard_site_health', 'dashboard', 'normal');
  remove_meta_box('dashboard_php_nag', 'dashboard', 'normal');
  remove_meta_box('themeisle', 'dashboard', 'normal');
  remove_meta_box('yith_dashboard_blog_news', 'dashboard', 'normal');
  //remove_meta_box('wpseo-dashboard-overview', 'dashboard', 'normal');
  remove_meta_box('yith_dashboard_products_news', 'dashboard', 'normal');
}
add_action('wp_dashboard_setup', 'nt_remove_default_admin_widget_1');

remove_action('welcome_panel', 'wp_welcome_panel'); // Xóa cái ML welcome.
// remove logo
function remove_logo_and_submenu()
{
  global $wp_admin_bar;
  //the following codes is to remove sub menu
  $wp_admin_bar->remove_menu('wp-logo');
  $wp_admin_bar->remove_menu('about');
  $wp_admin_bar->remove_menu('wporg');
  $wp_admin_bar->remove_menu('documentation');
  $wp_admin_bar->remove_menu('support-forums');
  $wp_admin_bar->remove_menu('feedback');
  $wp_admin_bar->remove_menu('comments');
}
add_action('wp_before_admin_bar_render', 'remove_logo_and_submenu');

// hide update notifications
if (get_option('turn_off_update') == 1) {
  function remove_core_updates()
  {
    global $wp_version;
    return (object) array('last_checked' => time(), 'version_checked' => $wp_version,);
  }
  add_filter('pre_site_transient_update_core', 'remove_core_updates'); //hide updates for WordPress itself
  add_filter('pre_site_transient_update_plugins', 'remove_core_updates'); //hide updates for all plugins
  add_filter('pre_site_transient_update_themes', 'remove_core_updates'); //hide updates for all themes
  //add_filter('admin_menu', 'admin_menu_filter',500);
}

function wcs_remove_submenus()
{
  global $submenu;
  global $menu;
  // dashboard menu
  unset($submenu['index.php'][10]); // removes updates
  unset($submenu['themes.php'][5]); // removes themes
  unset($submenu['themes.php'][15]); // removes theme installer
  unset($submenu['themes.php'][6]); // Xoá Cutomize
  unset($submenu['themes.php'][20]);
  $menu[26][0] = 'Blocks';
}
add_action('admin_menu', 'wcs_remove_submenus');

//xóa menu p1
function remove_menus()
{
  remove_menu_page('jetpack');
                    //Jetpack*
  if (get_option('hidden_comment') == 1) {
    remove_menu_page('edit-comments.php');          //Comments
  }

  if (get_option('hidden_plugins') == 1) {
    remove_menu_page('plugins.php');                //Plugins
  }

  if (get_option('hidden_tool') == 1) {
    remove_menu_page('tools.php');                           //Tools
  }

  if (get_option('hidden_acf') == 1) {
    remove_menu_page('edit.php?post_type=acf-field-group'); // Customfield
  }
  if (get_option('hidden_block') == 1) {
    remove_menu_page('edit.php?post_type=blocks'); // Block
  }
  if (get_option('hidden_themes') == 1) {
    remove_menu_page('themes.php');                //Themes
  }
}

add_action('admin_menu', 'remove_menus');
// Xóa menu
function wpse_136059_remove_menu_pages()

{
  remove_menu_page('edit.php?post_type=acf');
  remove_menu_page('flatsome-panel');
  if (get_option('hidden_dgwt')) {
    remove_menu_page('dgwt_jg_settings');
  }
  if (get_option('hidden_ctf7')) {
    remove_menu_page('wpcf7');
  }
  if (get_option('hidden_itsec')) {
    remove_menu_page('itsec');
  }
}

add_action('admin_init', 'wpse_136059_remove_menu_pages');   //Flatsome Panel
//remove woocommerce
function plt_hide_woocommerce_menus()
{
  //Hide "Marketing".
  //remove_menu_page('wc-admin&path=/marketing');
  //Hide "Analytics".
  //remove_menu_page('wc-admin&path=/analytics/revenue');
  //Hide "Analytics → Revenue".
}
add_action('admin_menu', 'plt_hide_woocommerce_menus', 71);

// Remove Editor 5.1.1
add_filter('use_block_editor_for_post', '__return_false');


// Chuyển font chữ soạn thảo sang px
if (!function_exists('hiepdesign_mce_text_sizes')) {
  function hiepdesign_mce_text_sizes($initArray)
  {
    $initArray['fontsize_formats'] = "9px 10px 12px 13px 14px 16px 17px 18px 19px 20px 21px 24px 28px 32px 36px";
    return $initArray;
  }
  add_filter('tiny_mce_before_init', 'hiepdesign_mce_text_sizes', 99);
}

//Change option link
function option_customize()
{
  global $wp_admin_bar;
  $icon_style = 'font: normal 20px/1 \'dashicons\';-webkit-font-smoothing: antialiased;padding-right: 4px;margin-top:3px;';
  $flatsome_icon = '<span class="dashicons dashicons-art" style="' . $icon_style . 'margin-top:6px;"></span>';
  $wp_admin_bar->add_menu(array(
    'id' => 'flatsome_panel',
    'title' => $flatsome_icon . ' Tuỳ Chọn',
  ));
  $wp_admin_bar->add_menu(array(
    'id' => 'theme_options',
    'title' => '<span class="dashicons dashicons-admin-generic" style="' . $icon_style . '"></span> Tuỳ Biến',
  ));
  $wp_admin_bar->add_menu(array(
    'id' => 'options_advanced',
    'title' => '<span class="dashicons dashicons-admin-tools" style="' . $icon_style . '"></span> Nâng Cao',
  ));
  $wp_admin_bar->remove_node('flatsome_panel_license');
  $wp_admin_bar->remove_node('flatsome_panel_support');
  $wp_admin_bar->remove_node('flatsome_panel_changelog');
  $wp_admin_bar->remove_node('flatsome_panel_setup_wizard');
  $wp_admin_bar->remove_node('flatsome-activate');
}
add_action('admin_bar_menu', 'option_customize', 40);
//Old widget
function example_theme_support() {
  remove_theme_support( 'widgets-block-editor' );
}
add_action( 'after_setup_theme', 'example_theme_support' );
// Support SVG
// Add SVG to allowed file uploads
function add_file_types_to_uploads($file_types){
  $new_filetypes = array();
  $new_filetypes['svg'] = 'image/svg';
  $file_types = array_merge($file_types, $new_filetypes );
  return $file_types;
}
add_action('upload_mimes', 'add_file_types_to_uploads');