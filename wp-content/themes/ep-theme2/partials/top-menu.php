<!--Top Bar-->
<div id="top-bar">
    <div class="container">
        <nav id="top-right-menu">
            <?php if( has_nav_menu('top-bar-menu') ): ?>
                <?php  wp_nav_menu(array('theme_location' =>'top-bar-menu' ));  ?>
            <?php else: ?>
                <div class="top-bar-menu-no-item">لطفا برای این قسمت یک منو انتخاب کنید</div>
            <?php endif; ?>
<!--            <ul>-->
<!--                <li><a href="#"><i class="fa fa-file-text-o"></i>وبلاگ</a></li>-->
<!--                <li><a href="#"><i class="fa fa-list-alt"></i>شغل ها</a></li>-->
<!--                <li><a href="#"><i class="fa fa-bullhorn"></i>پشتیبانی</a></li>-->
<!--                <li><a href="#"><i class="fa fa-globe"></i>فارسی</a></li>-->
<!--            </ul>-->
        </nav>
        <div id="top-left-social">
            <ul>
                <li><a href="#"><i class="fa fa-facebook-official"></i></a></li>
                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
            </ul>
        </div>
    </div>
</div>
<!--End Top Bar-->