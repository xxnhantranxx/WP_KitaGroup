<?php
function BoxProject($atts, $content)
{
    extract(shortcode_atts(array(
        'img' => '',
        'text' => '',
        'link' => '',
        'class' => '',
    ), $atts));
    if (empty($img)) {
        return '<div class="uxb-no-content uxb-image">Upload Image...</div>';
    }
    ob_start();
?>
    <div class="BoxProject <?php echo $class; ?>">
        <div class="box-image has-hover">
            <div class="image-zoom">
                <img src="<?php echo wp_get_attachment_image_url($img,'full'); ?>">
            </div>
            <div class="view-details">
                <a class="inner-view" href="<?php echo $link; ?>">
                    View Project
                </a>
            </div>
        </div>
        <div class="box-text">
            <div class="inner-text"><?php echo $text; ?></div>
        </div>
    </div>
<?php
    $contentShortcode = ob_get_contents();
    ob_end_clean();
    return $contentShortcode;
}

add_shortcode('BoxProject', 'BoxProject');
