<?php
function ItemRating($atts, $content)
{
    extract(shortcode_atts(array(
        'title' => '',
        'desc' => '',
        'count' => 1,
        'type_display' => 'is_count',
        'img' => '',
        'reverse' => false,
        'link' => 'javascript:void(0)'
    ), $atts));
    ob_start();

    if ($type_display == "is_image") {
        $class_style = 'image';
    } else {
        $class_style = 'number';
    }
    if($reverse){
        $class_reverse = 'reverse';
    }else{
        $class_reverse = '';
    }
?>
    <div class="box-count style-<?php echo $class_style; ?>">
        <div class="<?php echo $class_style; ?>">
            <?php
            if($type_display == "is_count"){?>
                <span><?php echo sprintf("%02d", $count); ?></span>
            <?php }else{?>
                <img src="<?php echo wp_get_attachment_image_url($img,'full'); ?>">
            <?php } ?>
        </div>
        <div class="text-count <?php echo $class_reverse; ?>">
            <?php
            if($type_display == "is_count"){?>
                <div class="title-count"><?php echo $title; ?></div>
            <?php }else{?>
                <div class="title-count"><a href="<?php echo $link; ?>"><?php echo $title; ?></a></div>
            <?php } ?>
            <div class="desc-count"><?php echo $desc; ?></div>
        </div>
    </div>
<?php
    $contentShortcode = ob_get_contents();
    ob_end_clean();
    return $contentShortcode;
}

add_shortcode('ItemRating', 'ItemRating');
