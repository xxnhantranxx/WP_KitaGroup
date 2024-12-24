<?php
function CardBetting($atts, $content)
{
    extract(shortcode_atts(array(
        'background' => '',
        'number' => '',
        'logo' => '',
        'star_count' => 5,
        'title' => '',
        'description' => '',
        'button_betnow' => '',
        'button_more' => '',
    ), $atts));
    ob_start();
?>
    <div class="CardBetting">
        <div class="card-header" style="background:<?php echo $background; ?>">
            <div class="badge"><span class="lh-base"><?php echo $number; ?></span></div>
            <div class="logo-bet">
                <img src="<?php echo wp_get_attachment_image_url($logo, 'full'); ?>">
            </div>
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
        <div class="card-body">
            <div class="title-card"><?php echo $title; ?></div>
            <div class="description-card">
            <?php echo $description; ?>
            </div>
        </div>
        <div class="card-footer">
            <div class="buton-bet-footer button-bet-now"><a href="<?php echo $button_betnow; ?>" class="btn"><span>Bet Now</span></a></div>
            <div class="buton-bet-footer button-more"><a href="<?php echo $button_more; ?>" class="btn"><span>Read more</span></a></div>
        </div>
    </div>
    <?php echo do_shortcode($content); ?>
<?php
    $contentShortcode = ob_get_contents();
    ob_end_clean();
    return $contentShortcode;
}

add_shortcode('CardBetting', 'CardBetting');
