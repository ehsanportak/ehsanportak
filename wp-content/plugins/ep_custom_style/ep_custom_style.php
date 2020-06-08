<?php
/*
plugin name:ep_custom_style
plugin uri://www.google.com
author:ehsanportak
author uri:ehsanportak@gmail.com
version:1.0.0
description:این افزونه برای تنظیمات دستی است
licence:GPLV2
*/
defined('ABSPATH')|| die ('error');
add_action('admin_menu','epcs_addmenu');
function epcs_addmenu(){
    add_menu_page(
        'تنظیمات سفارشی سایت',
        'تنظیمات سفارشی',
        'administrator',
        'epcs_style_option',
        'epcs_style_function'
    );
function epcs_style_function(){
    include plugin_dir_path(__FILE__) . 'admin/view/style_option.php';
}    
}
?>