<?php
$epmb_meta_logo = get_post_meta( get_the_ID() , '_epmb_update_post' , true);
$epmb_meta_modares = get_post_meta(get_the_ID() , '_epmb_modares' , true);
$epmb_meta_ghesmat= get_post_meta(get_the_ID() , '_epmb_ghesmat' , true);
$epmb_meta_sath = get_post_meta(get_the_ID() , '_epmb_sath' , true);
?>
<p>
    <label for="epmb_logo">لوگو</label>
    <input type="text" style="width: 250px" id="epmb_logo" name="epmb_logo" value="<?php echo esc_url($epmb_meta_logo);?>" class="ltr"/>
    <input type="button" value="انتخاب لوگو" class="button-secondary" id="epmb_select_logo"/><br>
    <label for="epmb_modares">مدرس</label>
    <input type="text" style="width: 80px" id="epmb_modares" name="epmb_modares" value="<?php echo esc_attr($epmb_meta_modares);?>"/><br>
    <label for="epmb_ghesmat">تعداد قسمت ها</label>
    <input type="text" style="width: 80px" id="epmb_ghesmat" name="epmb_ghesmat" value="<?php echo esc_attr($epmb_meta_ghesmat);?>"/><br>
    <label for="epmb_sath">سطح دوره</label>
    مبتدی<input type="radio" id="epmb_sath" name="epmb_sath" value="1" <?php checked($epmb_meta_sath , '1');?>/>
    متوسط<input type="radio" id="epmb_sath" name="epmb_sath" value="2"<?php checked($epmb_meta_sath , '2');?>/>
    پیشرفته<input type="radio" id="epmb_sath" name="epmb_sath" value="3"<?php checked($epmb_meta_sath , '3');?>/>

</p>