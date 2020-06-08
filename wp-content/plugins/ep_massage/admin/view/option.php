<div class="wrap">
    <h2>تنظیمات</h2>
    <form action="" method="POST">
        <table class="form-table">
            <tr >
                <th scope="row">
                    <label for="epnm_welcome_message">پیام خوش امد گویی</label>
                </th>
                <td>
                    <textarea name="epnm_welcome_message" id="epnm_welcome_message" class="widefat" rows="10"></textarea>
                </td>
            </tr>
            
<?php
// دستور شرطی زیر دسترسی یک قسمت از صفحه را ا کاربر میگیرد
// if(current_user_can('administrator')): return ?>
            <tr >
                <th scope="row">
                    <label for="epnm_welcome_message">تنظیمات رنگ</label>
                </th>
                <td>
                    <input type="text" name="epnm_welcome_message" id="epnm_welcome_message"></input>
                </td>
            </tr>
    <?php// endif ; ?>
        </table>
    </form>
</div>