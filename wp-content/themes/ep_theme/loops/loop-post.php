<?php
$all_posts_args= array(
    'post_type' => array('post'),
    'posts_per_page' => 9
);

$all_posts= new WP_Query($all_posts_args);

if ($all_posts->have_posts()): ?>

    <?php while($all_posts->have_posts()):$all_posts->the_post();?>
        <a class="post-link" href="<?php the_permalink(); ?>">
            <div class="post">
            <div class="post-inner">
                <div class="post-type">
                <?php echo get_the_post_thumbnail($all_posts->post->ID , 'main-thumbail')?>
                </div>
                <span class="post-title"><?php echo get_the_title($all_posts->post->ID ) ?></span>
            </div>
            <div class="post-meta">
                <span><i class="fa fa-clock-o"></i><?php echo get_the_date('Y-m-d',$all_posts->post->ID); ?></span>
                <span><i class="fa fa-user"></i><?php echo get_the_author();?></span>
                <span><i class="fa fa-thumbs-o-up"></i>107</span>
                <span><i class="fa fa-eye"></i><?php echo get_post_view(get_the_ID()); ?></span>
            </div>
            </div>
        </a>
    <?php endwhile; ?>
<?php endif; ?>