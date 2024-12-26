<?php
function Rating($atts, $content)
{
    extract(shortcode_atts(array(
        'class' => '',
    ), $atts));
    ob_start();
?>
    <div class="rating <?php echo $class; ?>">
        <ul class="list-rounded list-rating">
            <?php echo do_shortcode($content); ?>
        </ul>
    </div>
<?php
    $contentShortcode = ob_get_contents();
    ob_end_clean();
    return $contentShortcode;
}

add_shortcode('Rating', 'Rating');
