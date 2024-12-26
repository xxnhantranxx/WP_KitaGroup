<?php
function ItemRating($atts, $content)
{
    extract(shortcode_atts(array(
        'title' => '',
        'number' => '',
    ), $atts));
    ob_start();
?>
    <div class="box-count">
        <div class="_9eev"><?php echo $number; ?></div>
        <div class="_5tpg"><?php echo $title; ?></div>
    </div>
<?php
    $contentShortcode = ob_get_contents();
    ob_end_clean();
    return $contentShortcode;
}

add_shortcode('ItemRating', 'ItemRating');
