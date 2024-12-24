<?php
function BoxVideoBanner($atts, $content)
{
    extract(shortcode_atts(array(
        'video_url' => '',
        'text' => '',
        'link' => '',
        'heading' => '',
        'desc' => '',
        'class' => '',
    ), $atts));
    ob_start();
?>
    <div class="BoxVideoBanner <?php echo $class; ?>">
        <div class="inner-videobanner">
            <video class="video-banner" preload playsinline autoplay muted loop>
                <source src="<?php echo $video_url; ?>" type="video/mp4">
            </video>
        </div>
        <div class="ButtonWebsite">
            <a class="button" href="<?php echo $link; ?>">
                <span><?php echo $text; ?></span>
                <i class="fa-regular fa-arrow-up-right"></i>        
            </a>
        </div>
        <?php
        if($heading || $desc){?>
        <div class="content_video">
            <div class="heading">
                <h2><?php echo $heading; ?></h2>
            </div>
            <div class="description">
                <p><?php  echo $desc; ?></p>
            </div>
        </div>
        <?php } ?>
    </div>
<?php
    $contentShortcode = ob_get_contents();
    ob_end_clean();
    return $contentShortcode;
}

add_shortcode('BoxVideoBanner', 'BoxVideoBanner');
