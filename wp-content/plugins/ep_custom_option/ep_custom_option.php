<?php
/*
plugin name:تنظیمات دلخواه
plugin uri://www.google.com
author:ehsanportak
author uri:ehsanportak@gmail.com
version:1.0.0
description:این افزونه تنظیمات دلخواه شما را در وردپرس اعمال میکند
licence:GPLv2
*/
defined('ABSPATH')|| exit;
define('ep_view' , plugin_dir_path(__FILE__). 'view/');
add_action('admin_menu' , function(){
    add_options_page('صفحه ورود','صفحه ورود','manage_options','ep_custom', function(){
        require(ep_view . 'settings.php');
    });
});
add_action('admin_init' , function(){
    add_settings_section(
        'ep_setting',
        'تنظیمات صفحه ورودی',
        'ep_setting_callback',
        'general'
    );
    add_settings_field(
        'ep_setting_url',
        'تنظیمات لاگین',
        'ep_setting_url_callback',
        'general',
        'ep_setting',
        array(
            'با کلیک روی لینک به آدرس میروید'
        )

    );
    add_settings_field(
        'ep_custom_titile',
        'لوگو سفارشی',
        'ep_title_callback',
        'general',
        'ep_setting',
        array(
            'با نگه داشتن ماوس روی لوگو به آدرس میروید'
        )

    );
    // register_setting(
    //     'general',
    //     'ep_setting_url',
    //     'esc_url_raw'
    // );
    $args = array(
        'type' => 'string', 
        'sanitize_callback' => 'sanitize_text_field',
        'default' => NULL,
        );
    register_setting( 'general', 'ep_setting_url',     $args = array(
        'type' => 'string', 
        'sanitize_callback' => 'sanitize_text_field',
        'default' => NULL,
        )); 
    register_setting(
        'general',
        'ep_custom_titile',
        $arg=array (
            'key1' => 'some value',
            'key2' => 'some other value'
        )
    );
});
function ep_setting_callback(){
    echo '<p>شما میتوانید تنظیمات صفحه لاگین را دستکاری کنید</p>';
}
function ep_setting_url_callback($args){
    echo '<input type="text" class="ltr regular_text name="ep_setting_url" id="ep_setting_url" value="'. get_option('ep_setting_url') .'"/>';
    echo '<p class="description"> ' . $args[0] . ' </p>';
}
function ep_title_callback($args){
    echo '<input type="text" class="ltr regular_text name="ep_custom_titile" id="ep_custom_titile" value="'. get_option('ep_custom_titile') .'"/>';
    echo '<p class="description"> ' . $args['key1'] . ' </p>';
}
