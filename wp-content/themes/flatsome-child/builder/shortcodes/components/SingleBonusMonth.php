<?php
function SingleBonusMonth($atts, $content)
{
    extract(shortcode_atts(array(
        'title' => '',
    ), $atts));
    ob_start();
?>
    <div class="single-bonus-month">
    <h2 class="fw-bold"><span> <?php echo $title; ?> </span></h2>
    <div class="border-grey-light">
        <?php echo do_shortcode($content); ?>
    </div>
</div>
<?php
    $contentShortcode = ob_get_contents();
    ob_end_clean();
    return $contentShortcode;
}

add_shortcode('SingleBonusMonth', 'SingleBonusMonth');
