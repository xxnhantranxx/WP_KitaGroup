<?php
/**
 * Category layout with no sidebar.
 *
 * @package          Flatsome/WooCommerce/Templates
 * @flatsome-version 3.16.0
 */
?>
<?php echo do_shortcode('[block id="banner-tac-pham"]'); ?>
<div class="row category-page-row">
    <div class="col large-3 widget-filter">
        <div class="col-inner">
            <div class="_7zcl">Bộ lọc</div>
            <div class="_3elh show-for-small filter-modal-button">
                <?php // echo do_shortcode('[yith_wcan_mobile_modal_opener]'); ?>
                <?php // echo do_shortcode('[fe_open_button]'); ?>
            </div>
            <div class="_0rib filter">
                <div class="filter_label">
                    <?php // echo do_shortcode('[yith_wcan_active_filters_labels]'); ?>
                    <?php echo do_shortcode('[fe_chips]'); ?>
                </div>
                <div class="_4jxx filter-pick">
                    <?php //echo do_shortcode('[yith_wcan_filters slug="default-preset"]'); ?>
                    <?php echo do_shortcode('[fe_widget]'); ?>
                </div>
            </div>
        </div>
    </div>
	<div class="col large-9 product_cate">
        <div class="_4khk">
            <div class="_7bsv">
                <?php
                    global $wp_query;

                    $paged = max( 1, get_query_var( 'paged' ) ); // Lấy trang hiện tại
                    $posts_per_page = $wp_query->get( 'posts_per_page' ); // Số sản phẩm mỗi trang
                    $total_posts = $wp_query->found_posts; // Tổng số sản phẩm

                    $start = ( $paged - 1 ) * $posts_per_page + 1; // Sản phẩm bắt đầu
                    $end = min( $paged * $posts_per_page, $total_posts ); // Sản phẩm kết thúc

                    if ( $total_posts > 0 ) {
                        echo '<div class="woocommerce-product-count">';
                        printf( __( 'Hiển thị %d - %d trong tổng số %d tác phẩm', 'woocommerce' ), $start, $end, $total_posts );
                        echo '</div>';
                    }
                ?>
            </div>
            <div class="_3vky">
                <?php
                // Hiển thị dropdown Order By của WooCommerce
                woocommerce_catalog_ordering();
                ?>
            </div>
        </div>
		<?php
		do_action('flatsome_products_before');
		/**
		 * Hook: woocommerce_before_main_content.
		 *
		 * @hooked woocommerce_output_content_wrapper - 10 (outputs opening divs for the content)
		 * @hooked woocommerce_breadcrumb - 20 (FL removed)
		 * @hooked WC_Structured_Data::generate_website_data() - 30
		 */
		do_action('woocommerce_before_main_content');
		?>
		<?php
		if (woocommerce_product_loop()) {
			/**
			 * Hook: woocommerce_before_shop_loop.
			 *
			 * @hooked wc_print_notices - 10
			 * @hooked woocommerce_result_count - 20 (FL removed)
			 * @hooked woocommerce_catalog_ordering - 30 (FL removed)
			 */

			//do_action('woocommerce_before_shop_loop'); //Ẩn nút Filter Modal mặc định

			woocommerce_product_loop_start();
			if (wc_get_loop_prop('total')) {
				while (have_posts()) {
					the_post();
					/**
					 * Hook: woocommerce_shop_loop.
					 *
					 * @hooked WC_Structured_Data::generate_product_data() - 10
					 */
					do_action('woocommerce_shop_loop');
					wc_get_template_part('content', 'product');
				}
			}
			woocommerce_product_loop_end();
			/**
			 * Hook: woocommerce_after_shop_loop.
			 *
			 * @hooked woocommerce_pagination - 10
			 */
			do_action('woocommerce_after_shop_loop');
		} else {
			/**
			 * Hook: woocommerce_no_products_found.
			 *
			 * @hooked wc_no_products_found - 10
			 */
			do_action('woocommerce_no_products_found');
		}
		?>
		<?php
		/**
		 * Hook: flatsome_products_after.
		 *
		 * @hooked flatsome_products_footer_content - 10
		 */
		do_action('flatsome_products_after');
		/**
		 * Hook: woocommerce_after_main_content.
		 *
		 * @hooked woocommerce_output_content_wrapper_end - 10 (outputs closing divs for the content)
		 */
		do_action('woocommerce_after_main_content');
		?>
	</div>
</div>
<?php echo do_shortcode('[block id="conatct"]'); ?>