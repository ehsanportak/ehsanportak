<div class="wrap">
    <h2>آپلود فایل</h2>
    <?php
    if(isset($_POST['epnm_new_massage_sub'])){
        $get=get_post_meta( 120 , '_ep_upload' , true);
        array_push( $get ,  $_POST['ep_file'] ,  $_POST['ep_tozih']);
        update_post_meta( 120 , '_ep_upload' , $get );
       
    }
    ?>
    <form action="" method="POST">
        <p>
            <label for="epnm_new_massage">فایل</label>
            <input type="text" id="ep_file" name="ep_file"></input>
            <input type="button" value="انتخاب فایل" class="button-secondary" id="ep_select_file"/><br>
        </p>
        <p>
            <label for="epnm_new_massage_sub">توضیح کوتاه</label>
            <input type="text" id="ep_tozih" name="ep_tozih"></input><br><br>
        </p>
        <p>
            <input type="submit" value="ارسال" name="epnm_new_massage_sub" id="epnm_new_massage_sub" class="">
        </p>
    </form>
</div>