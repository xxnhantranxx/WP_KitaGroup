<?php
function BoxWebsite($atts, $content)
{
    extract(shortcode_atts(array(
        'align' => 'left',
        'img' => '',
        'img_support' => '',
        'position_x' => '0',
        'position_y' => '0',
        'is_image_auxiliary' => false,
        'class' => '',
    ), $atts));
    if (empty($img)) {
        return '<div class="uxb-no-content uxb-image">Upload Image...</div>';
    }
    ob_start();
?>
    <div class="BoxWebsite <?php echo $class; ?> <?php echo $align; ?>">
        <?php if ($align == 'left') { ?>
            <div class="image-box-website">
                <div class="image-main">
                    <img src="<?php echo wp_get_attachment_image_url($img, 'full'); ?>">
                </div>
                <?php if ($is_image_auxiliary) { ?>
                    <div class="image-sup" style="left: <?php echo $position_x; ?>; top: <?php echo $position_y; ?>">
                        <img src="<?php echo wp_get_attachment_image_url($img_support, 'full'); ?>">
                    </div>
                <?php } ?>
            </div>
        <?php } ?>
        <div class="text-box-website">
            <div class="inner-box">
                <?php echo do_shortcode($content); ?>
            </div>
        </div>
        <?php if ($align == 'right') { ?>
            <div class="image-box-website">
                <div class="image-main">
                    <img src="<?php echo wp_get_attachment_image_url($img, 'full'); ?>">
                </div>
                <?php if ($is_image_auxiliary) { ?>
                    <div class="image-sup" style="left: <?php echo $position_x; ?>; top: <?php echo $position_y; ?>">
                        <img src="<?php echo wp_get_attachment_image_url($img_support, 'full'); ?>">
                    </div>
                <?php } ?>
            </div>
        <?php } ?>
    </div>
<?php
    $contentShortcode = ob_get_contents();
    ob_end_clean();
    return $contentShortcode;
}

add_shortcode('BoxWebsite', 'BoxWebsite');
