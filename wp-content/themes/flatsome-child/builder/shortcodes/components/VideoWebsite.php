<?php
function VideoWebsite($atts, $content)
{
    extract(shortcode_atts(array(
        'link' => '',
        'img' => '',
        'class' => '',
    ), $atts));
    ob_start();
?>
    <div class="VideoWebsite <?php echo $class; ?>">
        <div class="banner-video">
            <img class="_7pyy" src="<?php echo wp_get_attachment_image_url($img,'full'); ?>">
            <div class="video-button-wrapper">
                <a href="<?php echo $link; ?>" class="button open-video icon circle is-outline is-xlarge">
                    <i class="icon-play"></i>
                </a>
            </div>
        </div>
    </div>
<?php
    $contentShortcode = ob_get_contents();
    ob_end_clean();
    return $contentShortcode;
}

add_shortcode('VideoWebsite', 'VideoWebsite');
