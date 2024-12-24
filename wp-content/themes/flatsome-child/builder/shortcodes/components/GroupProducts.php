<?php
function GroupProducts($atts, $content)
{
    extract(shortcode_atts(array(
        'cat_1' => 15,
        'cat_2' => 15,
        'cat_3' => 15,
        'cat_4' => 15,
        'cat_5' => 15,
        'class' => ''
    ), $atts));
    ob_start();
    $taxonomy = 'product_cat'; // Taxonomy là product_cat
    // Lấy thông tin danh mục
    $term_1 = get_term($cat_1, $taxonomy);
    $term_2 = get_term($cat_2, $taxonomy);
    $term_3 = get_term($cat_3, $taxonomy);
    $term_4 = get_term($cat_4, $taxonomy);
    $term_5 = get_term($cat_5, $taxonomy);

    $thumbnail_url_1 = wp_get_attachment_url(get_term_meta($cat_1, 'thumbnail_id', true));
    $thumbnail_url_2 = wp_get_attachment_url(get_term_meta($cat_2, 'thumbnail_id', true));
    $thumbnail_url_3 = wp_get_attachment_url(get_term_meta($cat_3, 'thumbnail_id', true));
    $thumbnail_url_4 = wp_get_attachment_url(get_term_meta($cat_4, 'thumbnail_id', true));
    $thumbnail_url_5 = wp_get_attachment_url(get_term_meta($cat_5, 'thumbnail_id', true));

    $category_link_1 = get_term_link((int)$cat_1, $taxonomy);
    $category_link_2 = get_term_link((int)$cat_2, $taxonomy);
    $category_link_3 = get_term_link((int)$cat_3, $taxonomy);
    $category_link_4 = get_term_link((int)$cat_4, $taxonomy);
    $category_link_5 = get_term_link((int)$cat_5, $taxonomy);
?>
    <div class="GroupProducts <?php echo $class; ?>">
        <div class="item-stack">
            <div class="banner-bg-stack">
                <a href="<?php echo $category_link_1; ?>" class="_4jtt">
                    <img src="<?php echo $thumbnail_url_1; ?>" alt="<?php echo $term_1->name; ?>">
                </a>
            </div>
            <div class="text_prod">
                <a href="<?php echo $category_link_1; ?>" class="_0iyk">
                    <div class="_8tar"><?php echo $term_1->name; ?></div>
                    <div class="_3fbs"><?php echo $term_1->count; ?> <span>Tác phẩm</span></div>
                </a>
            </div>
        </div>
        <div class="item-stack">
            <div class="banner-bg-stack">
                <a href="<?php echo $category_link_2; ?>" class="_4jtt">
                    <img src="<?php echo $thumbnail_url_2; ?>" alt="<?php echo $term_2->name; ?>">
                </a>
            </div>
            <div class="text_prod">
                <a href="<?php echo $category_link_1; ?>" class="_0iyk">
                    <div class="_8tar"><?php echo $term_2->name; ?></div>
                    <div class="_3fbs"><?php echo $term_2->count; ?> <span>Tác phẩm</span></div>
                </a>
            </div>
        </div>
        <div class="item-stack">
            <div class="banner-bg-stack">
                <a href="<?php echo $category_link_3; ?>" class="_4jtt">
                    <img src="<?php echo $thumbnail_url_3; ?>" alt="<?php echo $term_3->name; ?>">
                </a>
            </div>
            <div class="text_prod">
                <a href="<?php echo $category_link_3; ?>" class="_0iyk">
                    <div class="_8tar"><?php echo $term_3->name; ?></div>
                    <div class="_3fbs"><?php echo $term_3->count; ?> <span>Tác phẩm</span></div>
                </a>
            </div>
        </div>
        <div class="item-stack">
            <div class="banner-bg-stack">
                <a href="<?php echo $category_link_4; ?>" class="_4jtt">
                    <img src="<?php echo $thumbnail_url_4; ?>" alt="<?php echo $term_4->name; ?>">
                </a>
            </div>
            <div class="text_prod">
                <a href="<?php echo $category_link_4; ?>" class="_0iyk">
                    <div class="_8tar"><?php echo $term_4->name; ?></div>
                    <div class="_3fbs"><?php echo $term_4->count; ?> <span>Tác phẩm</span></div>
                </a>
            </div>
        </div>
        <div class="item-stack">
            <div class="banner-bg-stack">
                <a href="<?php echo $category_link_5; ?>" class="_4jtt">
                    <img src="<?php echo $thumbnail_url_5; ?>" alt="<?php echo $term_5->name; ?>">
                </a>
            </div>
            <div class="text_prod">
                <a href="<?php echo $category_link_5; ?>" class="_0iyk">
                    <div class="_8tar"><?php echo $term_5->name; ?></div>
                    <div class="_3fbs"><?php echo $term_5->count; ?> <span>Tác phẩm</span></div>
                </a>
            </div>
        </div>
    </div>
<?php
    $contentShortcode = ob_get_contents();
    ob_end_clean();
    return $contentShortcode;
}

add_shortcode('GroupProducts', 'GroupProducts');
