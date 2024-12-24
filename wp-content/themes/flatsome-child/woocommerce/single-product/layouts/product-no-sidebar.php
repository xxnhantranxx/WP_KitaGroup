<?php

/**
 * Product with no sidebar.
 *
 * @package          Flatsome/WooCommerce/Templates
 * @flatsome-version 3.19.0
 */

?>
<div class="product-container">
    <section class="section about_us_1 sumary-product">
        <div class="section-bg fill"></div>
        <div class="_6smy section-content relative">
            <div class="BannerWebsite full-height">
                <div class="banner-view">
                    <div class="image-bn">
                        <img decoding="async" src="<?php echo home_url();?>/wp-content/uploads/2024/12/Subtract.png">
                    </div>
                </div>
                <div class="_5pca content-banner">
                    <div class="content-inner">
                        <div class="product-main">
                            <div class="row content-row mb-0 align-middle">
                                <div class="product-gallery col large-<?php echo flatsome_option('product_image_width'); ?>">
                                    <?php flatsome_sticky_column_open('product_sticky_gallery'); ?>
                                    <?php
                                    /**
                                     * woocommerce_before_single_product_summary hook
                                     *
                                     * @hooked woocommerce_show_product_sale_flash - 10
                                     * @hooked woocommerce_show_product_images - 20
                                     */
                                    do_action('woocommerce_before_single_product_summary');
                                    ?>
                                    <?php flatsome_sticky_column_close('product_sticky_gallery'); ?>
                                </div>

                                <div class="product-info summary col-fit col entry-summary RemovePaddingBottom <?php flatsome_product_summary_classes(); ?>">

                                    <?php
                                    /**
                                     * woocommerce_single_product_summary hook
                                     *
                                     * @hooked woocommerce_template_single_title - 5
                                     * @hooked woocommerce_template_single_rating - 10
                                     * @hooked woocommerce_template_single_price - 10
                                     * @hooked woocommerce_template_single_excerpt - 20
                                     * @hooked woocommerce_template_single_add_to_cart - 30
                                     * @hooked woocommerce_template_single_meta - 40
                                     * @hooked woocommerce_template_single_sharing - 50
                                     */
                                    do_action('woocommerce_single_product_summary');
                                    ?>
                                </div>

                                <div id="product-sidebar" class="mfp-hide">
                                    <div class="sidebar-inner">
                                        <?php
                                        do_action('flatsome_before_product_sidebar');
                                        /**
                                         * woocommerce_sidebar hook
                                         *
                                         * @hooked woocommerce_get_sidebar - 10
                                         */
                                        if (is_active_sidebar('product-sidebar')) {
                                            dynamic_sidebar('product-sidebar');
                                        } else if (is_active_sidebar('shop-sidebar')) {
                                            dynamic_sidebar('shop-sidebar');
                                        }
                                        ?>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <div class="product-footer">
        <div class="container">
            <?php
            /**
             * woocommerce_after_single_product_summary hook
             *
             * @hooked woocommerce_output_product_data_tabs - 10
             * @hooked woocommerce_upsell_display - 15
             * @hooked woocommerce_output_related_products - 20
             */
            do_action('woocommerce_after_single_product_summary');
            ?>
        </div>
    </div>
</div>