<?php
function InfoFooter($atts, $content)
{
    extract(shortcode_atts(array(
        'hotline' => '',
        'email' => '',
        'address' => '',
    ), $atts));
    ob_start();
?>
    <div class="InfoFooter">
        <div class="_2nkx">
            <div class="_6yjs">
                <i class="fa-solid fa-phone"></i>
                <span>Hotline</span>
            </div>
            <div class="_6ras">
                <a href="tel:<?php echo $hotline; ?>" class="_9kpf"><?php echo $hotline; ?></a>
            </div>
        </div>
        <div class="_2nkx">
            <div class="_6yjs">
                <i class="fa-solid fa-envelope"></i>
                <span>Email</span>
            </div>
            <div class="_6ras">
                <a href="mailto:<?php echo $hotline; ?>" class="_1dgy"><?php echo $email; ?></a>
            </div>
        </div>
        <?php if($address): ?>
        <div class="_2nkx">
            <div class="_6yjs">
                <i class="fa-solid fa-location-dot"></i>
                <span>Địa chỉ</span>
            </div>
            <div class="_6ras">
                <a href="javascript:void(0)" class="_1dgy"><?php echo $address; ?></a>
            </div>
        </div>
        <?php endif; ?>
    </div>
<?php
    $contentShortcode = ob_get_contents();
    ob_end_clean();
    return $contentShortcode;
}

add_shortcode('InfoFooter', 'InfoFooter');
