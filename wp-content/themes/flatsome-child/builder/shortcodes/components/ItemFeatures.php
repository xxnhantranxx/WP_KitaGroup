<?php
function ItemFeatures($atts, $content)
{
    extract(shortcode_atts(array(
        'title' => '',
    ), $atts));
    ob_start();
?>
    <li class="item">
        <div class="text-list">
            <i class="fa-light fa-check"></i> <span><?php echo $title; ?></span>
        </div>
        
    </li>
<?php
    $contentShortcode = ob_get_contents();
    ob_end_clean();
    return $contentShortcode;
}

add_shortcode('ItemFeatures', 'ItemFeatures');
