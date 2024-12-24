<?php

function ProductsCategories($atts, $content)
{
    extract(shortcode_atts(array(
        'cat' => '',
        'offset' => 0,
        'count' => 6,
        'style' => 'nav',
        'link' => '',
        'label' => '',
    ), $atts));
    ob_start();
    $terms = get_terms(array(
        'taxonomy' => 'product_cat',
        'hide_empty' => false, // để hiển thị cả những term không có bài viết nào
    ));
    $cat_ids = array();
    foreach ($terms as $term) {
        $cat_ids[] = $term->term_id;
    }
    if ($cat == '') {
        $cat =  $cat_ids;
    }

?>
    <div class="ProductsCategories">
        <div class="item-product center-flex headding-category">
            <?php echo do_shortcode($content); ?>
            <?php
            if($style == 'nav'){?>
                <div class="cntt-navigation">
                    <div class="cntt-button-prev cntt-button"><img src="<?php echo home_url(); ?>/wp-content/themes/flatsome-child/img/arrow_left.png"></div>
                    <div class="cntt-button-next cntt-button"><img src="<?php echo home_url(); ?>/wp-content/themes/flatsome-child/img/arrow_right.png"></div>
                </div>
            <?php }else{?>
                <div class="_9kid">
                    <a href="<?php echo $link; ?>" class="button-flex button myButton">
                        <span><?php echo $label; ?></span>
                        <img src="<?php echo home_url(); ?>/wp-content/themes/flatsome-child/img/arrow_right.png">
                    </a>
                </div>
            <?php } ?>
        </div>
        <div class="HomeSlideProduct swiper">
            <div class="swiper-wrapper">
                <?php
                $args = array(
                    'post_type' => 'product',
                    'tax_query' => array(                     //(array) - Lấy bài viết dựa theo taxonomy
                        'relation' => 'AND',                      //(string) - Mối quan hệ giữa các tham số bên trong, AND hoặc OR
                        array(
                            'taxonomy' => 'product_cat',
                            'field' => 'id',
                            'terms' => $cat,
                        )
                    ),
                    'posts_per_page' => $count,
                    'offset' => $offset,
                    'order' => 'DESC',
                    'orderby' => 'date',
                );
                $the_query = new WP_Query($args);
            
                // The Loop
                if ($the_query->have_posts()) :
                    while ($the_query->have_posts()) : $the_query->the_post(); ?>

                        <div class="item-product swiper-slide">
                            <a href="<?php the_permalink(); ?>" class="link-product">
                                <?php global $product; ?>
                                <div class="box-image-product">
                                    <div class="brd-top"></div>
                                    <div class="has-hover">
                                        <div class="image-zoom">
                                            <img src="<?php echo wp_get_attachment_url($product->get_image_id()); ?>" />
                                        </div>
                                    </div>
                                    <div class="brd-bottom"></div>
                                </div>
                                <div class="box-product">
                                    <div class="_7tei">
                                        <div class="_4hcl textLine-1"><?php the_title(); ?></div>
                                        <?php if(get_field('kich_thuoc')): ?>
                                        <div class="_5vld textLine-1"><?php the_field('kich_thuoc'); ?></div>
                                        <?php endif; ?>
                                    </div>
                                    <div class="_5cyg"><?php echo $product->get_price_html(); ?></div>
                                </div>
                            </a>
                        </div>
                <?php
                    endwhile;
                endif;

                // Reset Post Data
                wp_reset_postdata();
                ?>
            </div>
        </div> 
    </div>
<?php
    $contentShortcode = ob_get_contents();
    ob_end_clean();
    return $contentShortcode;
}

add_shortcode('ProductsCategories', 'ProductsCategories');
