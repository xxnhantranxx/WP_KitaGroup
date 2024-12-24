<?php

/**
 * Single Product Rating
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/rating.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see              https://docs.woocommerce.com/document/template-structure/
 * @package          WooCommerce/Templates
 * @version          3.6.0
 * @flatsome-version 3.18.0
 */

if (! defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

global $product;
$review_ratings_enabled = wc_review_ratings_enabled();
if (! $review_ratings_enabled) {
    return;
}
$id = $product->get_id();
$style = get_the_terms($id, 'style');
$first_style_id = $style[0]->term_id;

// Kiểm tra xem các dòng tồn tại hay không.
if (have_rows('setting_reviews', 'option')) {
    $arr = get_field('setting_reviews', 'option');
} else {
    // Thực hiện một số hành động nếu không có giá trị.
}

// Khởi tạo một mảng rỗng để chứa ID sản phẩm tương ứng với style.
$id_product_style = array();

// Ví dụ về kết quả của $arr: Array ( [0] => Array ( [style] => 164 [san_pham] => Array ( [0] => 54267 [1] => 11293 ) ) [1] => Array ( [style] => 163 [san_pham] => Array ( [0] => 11829 ) ) )

// Lặp qua mảng $arr để kiểm tra các style và gán ID sản phẩm tương ứng.
if ($arr) {
    foreach ($arr as $item) {
        $style_id = $item['style'];
        $product_ids = $item['san_pham'];
        // Kiểm tra xem ID style của mỗi phần tử có trùng với $first_style_id không.
        if ($style_id == $first_style_id) {
            // Nếu trùng, gán các ID sản phẩm tương ứng vào $id_product_style.
            $id_product_style = implode(',', $product_ids);
            // Dừng vòng lặp sau khi tìm thấy style phù hợp.
            break;
        }
    }
}
if($id_product_style){
    $product_style = wc_get_product( $id_product_style );
    if ( $product_style ) {
        $review_count = $product_style->get_review_count();
        $average      = $product_style->get_average_rating();
        $rating_count = $product_style->get_rating_count();
    } else {
        $rating_count = $product->get_rating_count();
        $review_count = $product->get_review_count();
        $average      = $product->get_average_rating();
    }
}else{
    $product_style = wc_get_product( $id );
    if ( $product_style ) {
        $review_count = $product_style->get_review_count();
        $average      = $product_style->get_average_rating();
        $rating_count = $product_style->get_rating_count();
    } else {
        $rating_count = $product->get_rating_count();
        $review_count = $product->get_review_count();
        $average      = $product->get_average_rating();
    }
}

?>
<div class="wrapper-star-cate">
    <?php
    if ($rating_count > 0) : ?>

        <div class="woocommerce-product-rating">
            <?php echo flatsome_get_rating_html($average, $rating_count, true); // WPCS: XSS ok. 
            ?>
            <?php if (get_theme_mod('product_info_review_count') && get_theme_mod('product_info_review_count_style') != 'tooltip') : ?>
                <?php if (comments_open()) : ?>
                    <?php //phpcs:disable 
                    ?>
                    <a href="#woocommerce-photo-reviews-shortcode-1" class="woocommerce-review-link" rel="nofollow">(<?php printf(_n('%s customer review', '%s customer reviews', $review_count, 'woocommerce'), '<span class="count">' . esc_html($review_count) . '</span>'); ?>)</a>
                    <?php // phpcs:enable 
                    ?>
                <?php endif ?>
            <?php endif; ?>
        </div>

    <?php endif;
    global $post;
    $is_new = get_field('is_new');
    $terms =  get_the_terms($post->ID, 'product_cat'); ?>
    <div class="bage-wrapper-single">
        <?php if ($is_new) { ?>
            <div class="eb-product-badge-type green-bage">
                <span class="best-selling eb-product-title-badge">New</span>
                <span class="eb-product-badge-product-item"></span>
            </div>
        <?php } ?>
        <div class="eb-product-badge-type red-bage">
            <span class="best-selling eb-product-title-badge">
                <?php
                if ($terms && ! is_wp_error($terms)) {
                    echo $terms[0]->name;
                }
                ?>
            </span>
            <span class="eb-product-badge-product-item"></span>
        </div>
    </div>
</div>