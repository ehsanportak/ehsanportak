<?php
/*
plugin name:random_adv
author:ehsanportak
author uri://ehsanportak@gmail.com
version:1.0.0
description:این یک افزونه برای تبلیغات تصادفی است
licence:GPLv2
*/
add_action('wp_footer','ep_rnd_adv',99);
function ep_rnd_adv(){
    $advs=array(
        array('image'=> 'adv1.jpg','link'=> 'www.google.com', 'title'=> 'تبلیغ 1'),
        array('image'=> 'adv2.jpg','link'=> 'www.google.com', 'title'=> 'تبلیغ 2'),
        array('image'=> 'adv3.jpg','link'=> 'www.google.com', 'title'=> 'تبلیغ 3'));
    $imgindex=rand(0,2);
    $image=plugins_url('img/'. $advs[$imgindex]['image'] ,__FILE__);
    $link=$advs[$imgindex]['link'];
    $title=$advs[$imgindex]['title'];
$html=<<<HTML
<a href="$link" title="$title" style='position:fixed ; width:100px; height:200px; top:0;left:0'>
<img src="$image">
</a>
HTML;
echo $html;
};
?>