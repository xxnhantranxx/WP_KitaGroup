<?php
function CardCodeSingle($atts, $content)
{
    extract(shortcode_atts(array(
        'background' => '',
        'logo' => '',
        'star_count' => 5,
        'title' => '',
        'catch' => '',
        'code' => '',
        'flag' => '',
        'tested' => '',
        'coupon' => '',
        'description' => '',
        'button' => '',
        'button_link' => '',
    ), $atts));
    ob_start();
?>
    <div class="card-code" style="background: <?php echo $background; ?>;">
        <div class="row row-small">
            <div class="col large-6 small-12 col-card-left">
                <div class="col-inner">
                    <div class="heading-card">
                        <div class="logo-card">
                            <img src="<?php echo wp_get_attachment_image_url($logo, 'full'); ?>">
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
                        <div class="name-card"><?php echo $title; ?></div>
                    </div>
                    <div class="catch-line"><span><?php echo $catch; ?></span></div>
                </div>
            </div>
            <div class="col large-6 small-12 col-card-right">
                <div class="col-inner">
                    <div class="input-code">
                        <input class="copyValue form-control rounded-start-2 text-uppercase fw-bold border-white" type="text" readonly="" value="<?php echo $code; ?>" id="copyvalue">
                        <button class="btn text-uppercase fw-bold rounded-end-2 copyButton">copy code</button>
                    </div>
                    <div class="infos">
                        <span class="small flex">
                            <img width="20" height="15" src="<?php echo wp_get_attachment_image_url($flag, 'full'); ?>" alt="gb">
                            <span><?php echo $tested; ?></span>
                        </span>
                        <span class="small"><i class="fa-thin fa-money-bill"></i><span><?php echo $coupon; ?>
                    </div>
                    <div class="conditions">
                        <small><?php echo $description; ?></small>
                    </div>
                    <a href="<?php echo $button_link; ?>" class="btn btn-nhacai"><?php echo $button; ?></a>
                </div>
            </div>
            <div class="col large-12 canh-bao">
                <p style="font-size:14px;text-align: center;margin: 0;"><small class="advert" style="text-align:center;font-size: small !important;"><small>18+ | Commercial Content | T&amp;Cs apply | Begambleaware.org</small></small></p>
            </div>
        </div>
    </div>

<?php
    $contentShortcode = ob_get_contents();
    ob_end_clean();
    return $contentShortcode;
}

add_shortcode('CardCodeSingle', 'CardCodeSingle');
