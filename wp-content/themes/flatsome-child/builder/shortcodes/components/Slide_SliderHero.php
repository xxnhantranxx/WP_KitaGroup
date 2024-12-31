<?php
// Shortcode build
function Slide_SliderHero($atts, $content)
{
    extract(shortcode_atts(array(
        'title' => '',
        'subtitle' => '',
        'class' => '',
    ), $atts));
    ob_start();
?>
    <div class="Slide_SliderHero <?php echo $class; ?>">
        <?php
        // Check rows exists.
        if( have_rows('gallery_image_11', 'option') ):?>
        <div class="MainSlide11 swiper _4bck">
            <div class="_0zzi">
                <div class="_7jyw"><?php echo $title; ?></div>
                <div class="_1dxn"><?php echo $subtitle; ?></div>
            </div>
            <div class="_3dqb swiper-wrapper">
                <?php 
                // Loop through rows.
                while( have_rows('gallery_image_11', 'option') ) : the_row();
                // Load sub field value.
                $image_slide = get_sub_field('image_s11', 'option');
                ?>
                <div class="_1fee swiper-slide">
                    <div class="img_background">
                        <img src="<?php echo $image_slide; ?>">
                    </div>
                </div>
                <?php endwhile;?>
            </div>
        </div>
        <div class="_3ndg row">
            <div class="_5frj col large-12 RemovePaddingBottom">
                <div class="col-inner">
                <div class="_6qfc SubSlide11 swiper">
                    <div class="_5tno">
                        <div id="activeHeading" class="_6anf"></div>
                        <div id="activeContent" class="_2kql"></div>
                    </div>
                    <div class="_3dqb swiper-wrapper">
                            <?php 
                            while( have_rows('gallery_image_11', 'option') ) : the_row();
                            // Load sub field value.
                            $image_sub_slide = get_sub_field('image_s11', 'option');
                            $heading_s11 = get_sub_field('heading_s11', 'option');
                            $content_s11 = get_sub_field('content_s11', 'option');
                            ?>
                            <div class="_1fee swiper-slide" data-heading="<?php echo $heading_s11; ?>" data-content="<?php echo $content_s11; ?>">
                                <div class="_5gvw">
                                    <img src="<?php echo $image_sub_slide; ?>">
                                </div>
                            </div>
                            <?php endwhile;?>
                        </div>
                    </div>
                    <div class="_4rdu">
                        <div class="swiper-button-next"></div>
                        <div class="swiper-button-prev"></div>
                    </div>
                </div>
            </div>
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

add_shortcode('Slide_SliderHero', 'Slide_SliderHero');
