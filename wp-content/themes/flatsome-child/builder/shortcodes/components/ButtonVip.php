<?php
function ButtonVip($atts, $content)
{
    extract(shortcode_atts(array(
        'label' => '',
        'link' => '',
        'icon' => '',
        'class' => '',
    ), $atts));
    ob_start();
?>
    <div class="ButtonVip <?php echo $class; ?>">
        <div class="_9kid">
            <a href="<?php echo $link; ?>" class="button-flex button myButton">
                <span><?php echo $label; ?></span>
                <?php
                if($icon){?>
                    <img src="<?php echo wp_get_attachment_image_url($icon,'full'); ?>">
                <?php } ?>
            </a>
        </div>
    </div>
<?php
    $contentShortcode = ob_get_contents();
    ob_end_clean();
    return $contentShortcode;
}

add_shortcode('ButtonVip', 'ButtonVip');
