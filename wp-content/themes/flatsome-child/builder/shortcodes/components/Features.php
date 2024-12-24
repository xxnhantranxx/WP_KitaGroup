<?php
function Features($atts, $content)
{
    extract(shortcode_atts(array(
        'title' => '',
    ), $atts));
    ob_start();
?>
    <div class="features">
        <p class="h5 fw-bold"><?php echo $title; ?></p>
        <ul class="list-features list-rounded">
            <?php echo do_shortcode($content); ?>
        </ul>
    </div>
<?php
    $contentShortcode = ob_get_contents();
    ob_end_clean();
    return $contentShortcode;
}

add_shortcode('Features', 'Features');
