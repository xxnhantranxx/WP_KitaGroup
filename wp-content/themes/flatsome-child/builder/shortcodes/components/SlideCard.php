<?php
// Shortcode build
function Sun_SlideCard($atts, $content)
{
    extract(shortcode_atts(array(
        'class' => '',
    ), $atts));
    ob_start();
?>
    <div class="Sun_SlideCard swiper <?php echo $class; ?>">
        <?php
        // Check rows exists.
        if( have_rows('slide_s12', 'option') ):?>
        <div class="_6kbg swiper-wrapper">
            <?php 
            // Loop through rows.
            while( have_rows('slide_s12', 'option') ) : the_row();
            // Load sub field value.
            $image_s12 = get_sub_field('image_s12', 'option');
            $title_slide_s12 = get_sub_field('title_slide_s12', 'option');
            $desc_slide_s12 = get_sub_field('desc_slide_s12', 'option');
            ?>
            <div class="_4gxe swiper-slide">
                <div class="_3upj img_background">
                    <img src="<?php echo $image_s12; ?>">
                </div>
                <div class="_0blo">
                    <div class="_4ypw"><?php echo $title_slide_s12; ?></div>
                    <div class="_8ehk"><?php echo $desc_slide_s12; ?></div>
                </div>
            </div>
            <?php endwhile;?>
        </div>
        <div class="_0wxo">
            <div class="swiper-pagination"></div>
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

add_shortcode('Sun_SlideCard', 'Sun_SlideCard');
