<?php
/*
plugin name:ep_widjet_test
plugin uri://www.google.com
author:ehsanportak
author uri:ehsanportak@gmail.com
version:1.0.0
description:این افزونه یک ابزارک اراعه میدهد
licence:GPLv2
*/
defined( 'ABSPATH' ) || exit;
define( 'epwg_css' , plugins_url('css/' , __FILE__));
define( 'epwg_js' , plugins_url('js/' , __FILE__));
class epwg_test extends WP_Widget{
    function __construct()
    {
        parent :: __construct(
            'epwg_id_construct',
            'نویسندگان برتر',
            array(
                'description' => 'سابقه نویسندگان برتر',
                'classname'   => 'epwg_form_class'
            )
        );
        if(is_active_widget(false , false , $this->id_base)){
            add_action('wp_enqueue_scripts' , array(&$this, 'script')); 
            add_action('admin_enqueue_scripts' , array(&$this, 'upload_script'));
        }
    }
    function upload_script(){
        wp_enqueue_script('epwg_upload_image' , epwg_js . 'upload.js' , array('jquery' , 'media_upload' , 'thickbox'));
    }
    function script(){
        wp_enqueue_style('epwg_style' , epwg_css . 'style.css');
        wp_enqueue_style('thickbox');
    }
    function form($instance)
    {
        $title = (! isset($instance['title']) || $instance['title'] == '' )? 'نویسندگان برتر' : $instance['title'];
        $order_by = (! isset($instance['order_by']) || $instance['order_by'] == '' )? 'نویسندگان برتر' : $instance['order_by'];
        $order = (! isset($instance['order']) || $instance['order'] == '' )? 'نویسندگان برتر' : $instance['order'];
        $count = (! isset($instance['count']) || $instance['count'] == '' )? 'نویسندگان برتر' : $instance['count'];

        ?>
        <p>
            <label for="<?php echo  $this->get_field_id('title'); ?>">نام</label>
            <input type="text" id="<?php echo  $this->get_field_id('title'); ?>" name="<?php echo  $this->get_field_name('title'); ?>" value="<?php echo esc_attr($title); ?>" class="widefat">
        </p>
        <p>
            <label for="<?php echo $this->get_field_id('order_by'); ?>">بر اساس</label>
            <select value="<?php echo esc_attr($order_by); ?>" id="<?php echo $this->get_field_id('order_by'); ?>"  name="<?php echo $this->get_field_name('order_by');?>">
                <option value="registered" <?php selected($order_by , 'regestered'); ?>>تاریخ ثبت نام </option>
                <option value="post_conmt" <?php selected($order_by , 'post_count'); ?>>  تعداد مطلب </option>
                <option value="display_name" <?php selected($order_by , 'display_name'); ?>> حروف الفبا </option>
            </select>
        </p>
        <p>
            <input type="button" id="upload_imag_button button_primary" value="آپلود تصویر"/>
        </p>
        <?php
    }
    function update($new_instance, $old_instance)
    {
        $instance=$old_instance;
        $instance['title']= strip_tags($new_instance['title']);
        return $instance;
        
    }
    function widget($args, $instance)
    {
        $title = (! isset($instance['title']) || $instance['title'] == '' )? 'نویسندگان برتر' : $instance['title'];
        $title = (! isset($instance['order_by']) || $instance['order_by'] == '' )? 'register' : $instance['order_by'];
        $title = (! isset($instance['order']) || $instance['order'] == '' )? 'register' : $instance['order'];
        $title = (! isset($instance['count']) || $instance['count'] == '' )? 'register' : $instance['count'];
        $title = (! isset($instance['header']) || $instance['header'] == '' )? 'register' : $instance['header'];

        extract($args);
        echo $before_witget . $before_title . $title . $after_title;
        $user =new WP_User_Query(array(
            'order_by'  => 'post_count',
            'order'     => 'desc',
            'fields'    => array('display_name' , 'user_email' , 'id'),
            'number'    => 10
        ));
        foreach($user->get_results() as $user){
            echo '<div>';
            echo '<a href"' .get_author_posts_url($user->id). '">'. $user->display_name .' ('.count_user_posts($user->id).') </a>';
            echo '</div>';
        }
        echo $after_witget;
    }
}
add_action('widgets_init' , function(){
    register_widget('epwg_test');
});
add_action('wp_dashboard_setup' , function(){
    // global $wp_meta_baxes;
    // // ob_start();
    // // echo '<pre style="text-align:left; direction:ltr;">';
    // // print_r($wp_meta_baxes);
    // // echo '</pre>';
    // // wp_die(ob_get_clean()); 
    wp_add_dashboard_widget(
        'epwg_dashboard_new',
        'اخبار ورزشی',
        'epwg_dashboard_new_func'
    );
});
function epwg_dashboard_new_func(){
    $rssurl = 'https://www.cbi.ir/NewsRss.aspx?ln=fa';
    wp_widget_rss_output(array(
        'url'           => $rssurl,
        'items'         => 5,
        'show_summary'  => true
    ));
}
?>