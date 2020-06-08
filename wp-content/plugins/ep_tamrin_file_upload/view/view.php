<?php
$image= get_post_meta(120 , '_ep_upload' , true);
echo '<table>';
foreach($image as $x => $value){
    echo '<tr>';
    if(strlen($value)>50){
        echo '<td>';
        echo '<img src='.$value.' style="width:100px;height:100px;">';
        echo '</td>';
    }else{
        echo '<td>';
        echo $value;
        echo '</td>';
    }
    echo '</tr>';
}
echo '</table>';