<?php
$count = 0;
while (have_posts()) : the_post();
$style = ($count === 0) ? 'style="display:block;"' : 'style="display:none;"';
$class = ($count === 0) ? 'active' : '';
?>
    <div class="item_faq_dropdown <?php echo esc_attr($class); ?>">
        <div class="head_tab">
            <div class="title_faq"><?php the_title(); ?></div>
            <div class="icon_toggle">
                <i class="fa-regular fa-arrow-up-right"></i>
            </div>
        </div>
        <div class="content_tab" <?php echo $style; ?>>
            <?php the_content(); ?>
        </div>
    </div>
<?php $count++; endwhile; ?>