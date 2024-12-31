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
                <video class="_6alu video-hero" preload playsinline muted>
                    <source src="<?php echo $link; ?>" type="video/mp4">
                </video>
            <!-- <div class="video-button-wrapper">
                <a href="javascript:void(0)" class="_1blk button icon circle is-outline is-xlarge">
                    <i class="icon-play"></i>
                </a>
            </div> -->
        </div>
    </div>
<?php
    $contentShortcode = ob_get_contents();
    ob_end_clean();
    return $contentShortcode;
}

add_shortcode('VideoWebsite', 'VideoWebsite');
