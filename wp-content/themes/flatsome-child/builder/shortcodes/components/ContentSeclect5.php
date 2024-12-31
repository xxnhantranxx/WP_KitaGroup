<?php
// Shortcode build
function ContentSeclect5($atts, $content)
{
    extract(shortcode_atts(array(
        'class' => '',
    ), $atts));
    ob_start();
?>
    <div class="_3ryo row row-small s5_r2" style="max-width: 1300px;">
        <div class="_3ayf col s5_r2_c1 RemovePaddingBottom medium-6 small-12 large-6">
            <div class="_8fnc col-inner">
                <div class="_6ycd text block_text_s5_content">
                    <?php echo do_shortcode($content); ?>
                </div>
                <div class="_5rxg">
                    <div class="ContentSeclect5 swiper <?php echo $class; ?>">
                        <?php
                        // Check rows exists.
                        if( have_rows('slide_select_5', 'option') ):?>
                        <div class="_6kbg swiper-wrapper">
                            <?php 
                            // Loop through rows.
                            while( have_rows('slide_select_5', 'option') ) : the_row();
                            // Load sub field value.
                            $image_slide_5 = get_sub_field('image_slide_5', 'option');
                            ?>
                            <div class="_1dfp swiper-slide">
                                <div class="_0jdg img_background">
                                    <img src="<?php echo $image_slide_5; ?>">
                                </div>
                            </div>
                            <?php endwhile;?>
                        </div>
                    </div>
                    <?php
                    // No value.
                    else :
                        // Do something...
                    endif;?>
                </div>
            </div>
        </div>
        <div class="_7mlc col s5_r2_c2 RemovePaddingBottom medium-6 small-12 large-6 hide-for-small">
            <div class="_2jfj col-inner">
                <div class="_2pjn">
                    <div class="ContentSeclect5thumb swiper <?php echo $class; ?>">
                            <?php
                            // Check rows exists.
                            if( have_rows('slide_select_5', 'option') ):?>
                            <div class="_6kbg swiper-wrapper">
                                <?php 
                                // Loop through rows.
                                while( have_rows('slide_select_5', 'option') ) : the_row();
                                // Load sub field value.
                                $image_slide_5 = get_sub_field('image_slide_5', 'option');
                                ?>
                                <div class="_1dfp swiper-slide">
                                    <div class="_0jdg img_background">
                                        <img src="<?php echo $image_slide_5; ?>">
                                    </div>
                                </div>
                                <?php endwhile;?>
                            </div>
                        </div>
                        <?php
                        // No value.
                        else :
                            // Do something...
                        endif;?>
                </div>
            </div>
        </div>
    </div>
    <?php 
    $contentShortcode = ob_get_contents();
    ob_end_clean();
    return $contentShortcode;
}

add_shortcode('ContentSeclect5', 'ContentSeclect5');
