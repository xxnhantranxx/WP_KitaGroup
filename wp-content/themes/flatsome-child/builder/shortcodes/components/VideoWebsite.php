<?php
function VideoWebsite($atts, $content)
{
    extract(shortcode_atts(array(
        'link' => '',
        'text' => '',
        'label' => '',
        'link_button' => '',
        'text_headding' => '',
        'class' => '',
    ), $atts));
    ob_start();
?>
    <div class="VideoWebsite <?php echo $class; ?>">
        <div class="banner-video">
            <video class="video-hero" preload playsinline autoplay muted loop>
                <source src="<?php echo $link; ?>" type="video/mp4">
            </video>
            <div class="hero-text">
                <div class="headding-hero"><?php echo $text; ?></div>
                <div class="button-hero">
                    <a href="<?php echo $link_button; ?>" class="link-button-hero">
                        <span><?php echo $label; ?></span>
                        <i class="fa-regular fa-arrow-up-right"></i>
                    </a>
                </div>
            </div>
        </div>
        <div class="headding-hero-bottom">
            <video class="video-hero-bg" preload playsinline autoplay muted loop>
                <source src="<?php echo $link; ?>" type="video/mp4">
            </video>
            <div class="inner-text-hero">
                <?php echo $text_headding; ?>
            </div>
        </div>
    </div>
<?php
    $contentShortcode = ob_get_contents();
    ob_end_clean();
    return $contentShortcode;
}

add_shortcode('VideoWebsite', 'VideoWebsite');
