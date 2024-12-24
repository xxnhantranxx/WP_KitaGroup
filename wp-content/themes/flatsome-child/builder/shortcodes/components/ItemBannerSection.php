<?php
function ItemBannerSection($atts){
    extract(shortcode_atts(array(
        'icon' => '',
        'text_title' => '',
        'text_link' => '',
    ), $atts));
    ob_start();
    ?>
    <div class="home-header__link">
        <a href="<?php echo $text_link; ?>" class="d-block">
            <div class="icon"><i class="<?php echo $icon; ?>"></i></div>
            <p class="live-title"><?php echo $text_title; ?></p>
            <div class="icon-chevron-down"><i class="fa-solid fa-chevron-right"></i></div>
        </a>
    </div>
    <?php
    $contentShortcode = ob_get_contents();
    ob_end_clean();
    return $contentShortcode;
}
add_shortcode('ItemBannerSection', 'ItemBannerSection');