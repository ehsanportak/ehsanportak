<?php
/*
plugin name:اپلود فایل
plugin uri://www.google.com
author:ehsanportak
author uri:ehsanportak@gmail.com
version:1.0.0
description:این افزونه برای اپلود فایل است
licence:GPLv2
*/
defined('ABSPATH')|| die ('error');
define('ep_js' , plugins_url('admin/js/' , __FILE__));
define('ep_css' , plugins_url('css/',__FILE__));
register_activation_hook( __file__ , function(){
    $ep_file =array();
        update_post_meta( 120 , '_ep_upload' , $ep_file );
});
register_deactivation_hook( __file__ , function(){
        delete_post_meta( 120 , '_ep_upload' );
});
class ep_test extends WP_Widget
{
    function __construct()
    {
        parent::__construct(
            'epwg_id_construct',
            'نمایش فایل های آپلود شده',
            array(
                'description' => 'فایل های ارسالی',
            )
        );
       
    }
  
   
    function form($instance)
    {
        $title = isset($instance['title']) ? $instance['title'] : 'فایل های ارسالی';
    ?>
    <p>
        <label for="<?php echo  $this->get_field_id('title'); ?>">نام</label>
        <input type="text" id="<?php echo  $this->get_field_id('title'); ?>"name="<?php echo  $this->get_field_name('title'); ?>" value="<?php echo esc_attr($title); ?>" class="widefat">
    </p>
    <?php
    }
    function update($new_instance, $old_instance)
    {
        $instance = $old_instance;
        $instance['title'] = strip_tags($new_instance['title']);
        return $instance;
    }
    function widget($args, $instance)
    {
        $title = isset($instance['title']) ? $instance['title'] : 'فایل های ارسالی';
        extract($args);
        echo $before_witget; 
        echo $before_title . $title . $after_title;
        include(plugin_dir_path(__FILE__) . 'view/view.php');
        echo $after_witget;

    }
}
add_action('widgets_init', function () {

    register_widget('ep_test');
});
add_action('admin_menu','ep_upload_file');
function ep_upload_file(){
    add_menu_page(
        'آپلود فایل',
        'آپلود فایل',
        'administrator',
        'ep_upload_file',
        'ep_upload_file_function'
    );
function ep_upload_file_function(){
    include plugin_dir_path(__FILE__) . 'admin/view/upload_file.php';
}    
}
add_action('wp_enqueue_scripts',function(){
    wp_enqueue_style('epmb_course_information', ep_css . 'style.css');
});
add_action('admin_enqueue_scripts' , function($hook){
      wp_enqueue_style('thickbox');
      wp_enqueue_script('epmb_script' , ep_js . 'upload.js' , array('jquery','media-upload','thickbox'));
  });
?>
