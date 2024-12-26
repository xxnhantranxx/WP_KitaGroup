<?php
// Shortcode build
function Sun_SliderHero($atts, $content)
{
    extract(shortcode_atts(array(
        'class' => '',
    ), $atts));
    ob_start();
?>
    <div class="HomeBanner swiper <?php echo $class; ?>">
        <?php
        $images = get_field('gallery_section_7', 'option');
        // Check rows exists.
        if( have_rows('gallery_section_7', 'option') ):?>
        <div class="list_homeBanner swiper-wrapper aos-init">
            <?php 
            $totalPages = count($images); // Tính tổng số trang
            $navData = []; // Mảng để lưu nội dung của nav_slide
            // Loop through rows.
            while( have_rows('gallery_section_7', 'option') ) : the_row();
            // Load sub field value.
            $image_slide = get_sub_field('image_slide', 'option');
            $nav_slide = get_sub_field('nav_slide', 'option');
            $navData[] = $nav_slide; // Lưu nội dung vào mảng
            ?>
            <div class="item_homeBanner swiper-slide">
                <div class="img_background">
                    <img src="<?php echo $image_slide; ?>">
                </div>
            </div>
            <?php endwhile;?>
        </div>
        <div class="_0wxo">
            <div class="swiper-pagination"></div>
        </div>
        <div class="_0zzi">
            <div class="_3wfv">Những đặc quyền danh giá kiến tạo</div>
            <div class="_8cfx">GIA22 độc bản</div>
            <div class="nhan-tran-pagination" data-nav="<?php echo htmlspecialchars(json_encode($navData)); ?>"></div>
        </div>
    </div>
    <?php
    // No value.
    else :
        // Do something...
    endif;?>
        
    <?php echo do_shortcode($content);
    $contentShortcode = ob_get_contents();
    ob_end_clean();
    return $contentShortcode;
}

add_shortcode('Sun_SliderHero', 'Sun_SliderHero');
