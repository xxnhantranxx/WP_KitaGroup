<?php
function ItemBetting($atts, $content)
{
    extract(shortcode_atts(array(
        'background' => '',
        'title' => '',
        'logo' => '',
        'star_count' => 5,
        'link' => ''
    ), $atts));
    ob_start();
?>
    <div class="ItemBetting">
        <a href="<?php echo $link; ?>" class="d-blcok">
            <div class="box-card">
                <div class="box-logo-bet" style="background:<?php echo $background; ?>">
                    <img src="<?php echo wp_get_attachment_image_url($logo, 'full'); ?>">
                </div>
                <div class="box-text-bet">
                    <div class="title-card"><?php echo $title; ?></div>
                    <div class="review">
                    <div class="rating">
                        <?php
                        for ($x = 1; $x <= $star_count; $x++) {
                            echo '<i class="fa-solid fa-star"></i>';
                        }
                        ?>
                    </div>
                    <div class="mask-star">
                        <?php
                        for ($i = 1; $i <= 5; $i++) {
                            echo '<i class="fa-regular fa-star"></i>';
                        }
                        ?>
                    </div>
                </div>
                </div>
            </div>
            <i class="fa-solid fa-chevron-right"></i>
        </a>
    </div>
    <?php echo do_shortcode($content); ?>
<?php
    $contentShortcode = ob_get_contents();
    ob_end_clean();
    return $contentShortcode;
}

add_shortcode('ItemBetting', 'ItemBetting');
