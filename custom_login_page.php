<?php
/**
 * Plugin Name: 定制WP登录logo（Custom WP login logo）
 * Plugin URI: https://heliq.cn
 * Description: 定制WordPress登录界面的logo&Customize the logo of WordPress login screen
 * Version: 1.0
 * Author: 和离
 * Author URI: https://heliq.cn/
 */
 
// 包含插件更新检查器库
require 'update-checker/update-checker.php';

// 初始化更新检查器
$myUpdateChecker = Puc_v4_Factory::buildUpdateChecker(
    'https://github.com/weiyuhl/Custom-login-logo/', // GitHub仓库的URL
    __FILE__, // 插件主文件
    'Custom-login-logo' // 插件的slug
);

// 设置包含稳定发布版本的分支（例如 main）
$myUpdateChecker->setBranch('main');
 
 
function custom_login_page_styles() {
  echo '<style>';
  echo '#login h1 a, .login h1 a {';
  echo 'background-image:url(http://img.heliq.cn/ico_320x320.png);';
  echo 'background-size:contain;';
  echo 'width:180px;';
  echo '}';
  echo '</style>';
}
add_action('login_enqueue_scripts', 'custom_login_page_styles');

function custom_login_header_url() {
  return home_url();
}
add_filter('login_headerurl', 'custom_login_header_url');
