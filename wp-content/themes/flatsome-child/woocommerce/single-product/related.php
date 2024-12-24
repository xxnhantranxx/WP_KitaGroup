<?php
/**
 * Related Products
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/related.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see              https://docs.woocommerce.com/document/template-structure/
 * @package          WooCommerce/Templates
 * @version          3.9.0
 * @flatsome-version 3.16.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

// Get Type.
$type             = get_theme_mod( 'related_products', 'slider' );
$repeater_classes = array();

if ( $type == 'hidden' ) return;
if ( $type == 'grid' ) $type = 'row';

 if ( get_theme_mod('category_force_image_height' ) ) $repeater_classes[] = 'has-equal-box-heights product_home';
 if ( get_theme_mod('equalize_product_box' ) ) $repeater_classes[] = 'equalize-box product_home';

$repeater['type']         = $type;
$repeater['columns']      = get_theme_mod( 'related_products_pr_row', 4 );
$repeater['columns__md']  = get_theme_mod( 'related_products_pr_row_tablet', 3 );
$repeater['columns__sm']  = get_theme_mod( 'related_products_pr_row_mobile', 2 );
$repeater['class']        = implode( ' ', $repeater_classes );
$repeater['slider_style'] = 'reveal';
$repeater['row_spacing']  = 'small';

if ( class_exists('WPSEO_Primary_Term') ){
    $wpseo_primary_term = new WPSEO_Primary_Term( 'product_cat', get_the_id() );
    $wpseo_primary_term = $wpseo_primary_term->get_primary_term();
    $term = get_term( $wpseo_primary_term );
    $idProduct = get_the_id();
    if (is_wp_error($term)) {
        if ( $related_products ) : ?>
        <div class="related related-products-wrapper product-section">
            <div class="row row-small relate-head" id="row-1061404952">
                <div id="col-599962196" class="col relate-head RemovePaddingBottom small-12 large-12">
                    <div class="col-inner">
                        <div class="title_home" style="text-align:left">
                            <h2 class="title">Có thể bạn sẽ thích</h2>
                        </div>
                    </div>
                </div>
            </div>
            <?php get_flatsome_repeater_start( $repeater ); ?>
            <?php foreach ( $related_products as $related_product ) :
                    $post_object = get_post( $related_product->get_id() );
                    setup_postdata( $GLOBALS['post'] =& $post_object ); 
                    // phpcs:ignore WordPress.WP.GlobalVariablesOverride.Prohibited, Squiz.PHP.DisallowMultipleAssignments.Found
                    wc_get_template_part( 'content', 'product' );
                endforeach;
            ?>
            <?php get_flatsome_repeater_end( $repeater ); ?>
        </div>
        <?php
        endif;
        wp_reset_postdata();
    } else {
        // Yoast Primary category
        $category_display = $term->name;
        $category_link = get_category_link( $term->term_id );
        ?>
    <div class="ProductsCategories">
        <div class="item-product center-flex headding-category">
            <div class="block_text_title">
                <h2>Có thể bạn sẽ thích</h2>
            </div>
            <div class="cntt-navigation">
                <div class="cntt-button-prev cntt-button"><img src="<?php echo home_url(); ?>/wp-content/themes/flatsome-child/img/arrow_left.png"></div>
                <div class="cntt-button-next cntt-button"><img src="<?php echo home_url(); ?>/wp-content/themes/flatsome-child/img/arrow_right.png"></div>
            </div>
        </div>
        <div class="HomeSlideProduct swiper">
            <div class="swiper-wrapper">
                <?php
                $args = array(
                    'posts_per_page' => 20,
                    'orderby'        => 'date',
                    'order'          => 'desc',
                    'tax_query' => array(                     //(array) - Lấy bài viết dựa theo taxonomy
                        'relation' => 'AND',                      //(string) - Mối quan hệ giữa các tham số bên trong, AND hoặc OR
                        array(
                            'taxonomy' => 'product_cat',
                            'field' => 'id',
                            'terms' => $wpseo_primary_term,
                            'include_children' => false,
                            'operator' => 'IN'
                        )
                    ),
                    'post_type' => 'product',
                    'post__not_in' => array($idProduct),
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
</div>
<?php
    }
}else{
    if ( $related_products ) : ?>
    <div class="related related-products-wrapper product-section">
        <div class="row row-small relate-head" id="row-1061404952">
            <div id="col-599962196" class="col relate-head RemovePaddingBottom small-12 large-12">
                <div class="col-inner">
                    <div class="title_home" style="text-align:left">
                        <h2 class="title">YOU MAY ALSO LIKE</h2>
                        <div class="slick-control">
                            <span class="iconfont iconfont-left"><i class="fa fa-angle-left" aria-hidden="true"></i></span>
                            <span class="iconfont iconfont-right"><i class="fa fa-angle-right" aria-hidden="true"></i></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php get_flatsome_repeater_start( $repeater ); ?>
        <?php foreach ( $related_products as $related_product ) :
                $post_object = get_post( $related_product->get_id() );
                setup_postdata( $GLOBALS['post'] =& $post_object ); 
                // phpcs:ignore WordPress.WP.GlobalVariablesOverride.Prohibited, Squiz.PHP.DisallowMultipleAssignments.Found
                wc_get_template_part( 'content', 'product' );
            endforeach;
        ?>
        <?php get_flatsome_repeater_end( $repeater ); ?>
    </div>
    <?php
    endif;
    wp_reset_postdata();
 }