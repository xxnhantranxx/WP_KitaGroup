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
        $images = get_field('thu_vien_anh', 'option');
        // Check rows exists.
        if( have_rows('thu_vien_anh', 'option') ):?>
        <div class="list_homeBanner swiper-wrapper aos-init">
            <?php 
            $totalPages = count($images); // Tính tổng số trang
            // Loop through rows.
            while( have_rows('thu_vien_anh', 'option') ) : the_row();
            // Load sub field value.
            $image = get_sub_field('image', 'option');
            $tieu_de = get_sub_field('tieu_de', 'option');
            $description = get_sub_field('description', 'option');
            $call_to_action = get_sub_field('call_to_action', 'option');
            $link_cta = get_sub_field('link_cta', 'option');?>
            <div class="item_homeBanner swiper-slide">
                    <div class="img_background">
                        <img src="<?php echo $image; ?>">
                    </div>
                    <div class="_4wlf">
                        <div class="_9ujj"><?php echo $tieu_de; ?></div>
                        <div class="_1bsz"><?php echo $description; ?></div>
                        <div class="_9kid">
                            <a href="<?php echo $link_cta; ?>" class="button-flex button myButton">
                                <span><?php echo $call_to_action; ?></span>
                                <img src="<?php echo home_url(); ?>/wp-content/themes/flatsome-child/img/arrow_right.png">
                            </a>
                        </div>
                    </div>
                </div>
            <?php endwhile;?>
        </div>
        <div class="swiper-pagination"></div>
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
