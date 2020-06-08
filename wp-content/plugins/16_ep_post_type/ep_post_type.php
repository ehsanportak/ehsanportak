<?php
/*
plugin name:فصل 16 پست تایپ
plugin uri://www.google.com
author:ehsanportak
author uri:ehsanportak@gmail.com
version:1.0.0
description:این افزونه برای پست تایپ است
licence:GPLV2
*/
// add_action( 'wp_head', function(){
// echo PHP_EOL . print_r(get_post_types()) . PHP_EOL;
// } , 9999);
add_action( 'init', function(){
    $args=array(
        'show_ui'  => true,
        'public'   => true,
        'description' => 'دانلود کتاب دیجیتال...',
        'labels'   => array(
            'name'          => 'کتاب ها',
            'singular_name' => 'کتاب',
            'add_new'           => 'کتاب جدید',
            'not_found'         =>'کتابی یافت نشد',
            'search'            =>'جستجوی کتاب',
            'add_new_item'      => 'افزودن کتاب',
            'view_item'         => 'نمایش کتاب',
            'featured_image'    => 'کاور کتاب',
            'set_featured_image'=> 'مشخص کردن جلد',
            'remove_featured_image'=> 'حذف کردن جلد'
        ),
        'show_in_admin_bar' => false,
        'menu_position'     => 5,
        'supports'          => array(
            'thumbnail',
            'title',
            'editor'
        ),
        //'menu_icon'         =>plugin_dir_url( __FILE__ ) . 'img/tiny-16-512.png'
    );
    register_post_type( 'book' , $args );
});