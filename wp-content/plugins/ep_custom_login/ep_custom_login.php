<?php
/*
plugin name:تنظیمات دستی
plugin uri://www.google.com
author:ehsanportak
author uri:ehsanportak@gmail.com
version:1.0.0
description:این افزونه برای تنظیمات دستی صفحه لاگین است
licence:GPLV2
*/
defined('ABSPATH') || exit;
add_action('admin_menu' , function(){
    add_options_page(
        'تنظیمات دستی',
        'تنظیمات دستی',
        'administrator',
        'ep_setting_page',
        function(){
            require(plugin_dir_path(__FILE__) . 'view/setting.php');
        }
    );
});
add_action('admin_init',function(){
    add_settings_section(
        'ep_setting',
        'تنظیمات دستی',
        'ep_setting_callback',
        'general'
    );
    add_settings_field(
        'ep_setting_field',
        'یییییییییییییی',
        'ep_callback',
        'general',
        'ep_setting',
        array(
            'dddddddddddd'
        )
    );
    register_setting(
        'general',
        'ep_setting_field',
        'esc_url_raw'
    );
});
function ep_setting_callback(){
    echo '<p>ssssssssssssssssssssssssss</p>';
}
function ep_callback($args){
    echo '<input type="text" class="ltr regular-text" name="ep_callback" id="ep_callback" value=""/>';
    echo '<p class="description">'.$args[0].'</p>';
}