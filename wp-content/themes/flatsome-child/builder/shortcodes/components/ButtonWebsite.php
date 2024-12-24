<?php
function ButtonWebsite($atts, $content)
{
    extract(shortcode_atts(array(
        'text' => '',
        'link' => 'javascript:void(0)',
        'icon' => '',
        'blank' => false,
        'class' => '',
    ), $atts));
    ob_start();
    if($blank){
        $target = "_blank";
    }else{
        $target = "_self";
    }
?>
    <div class="ButtonWebsite">
        <a class="button <?php echo $class; ?>" href="<?php echo $link; ?>">
            <span><?php echo $text; ?></span>
            <?php echo $icon; ?>
        </a>
    </div>
<?php
    $contentShortcode = ob_get_contents();
    ob_end_clean();
    return $contentShortcode;
}

add_shortcode('ButtonWebsite', 'ButtonWebsite');
