<?php
/**
 * Orders
 *
 * Shows orders on the account page.
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/myaccount/orders.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 9.5.0
 */

defined( 'ABSPATH' ) || exit;

do_action( 'woocommerce_before_account_orders', $has_orders ); 
echo do_shortcode('[block id="banner-order"]');
?>

<?php if ( $has_orders ) : ?>
    <section class="_4wue section">
        <div class="section-bg fill"></div>
        <div class="section-content relative">
        <div class="_0vak row row-small">
            <div class="_9bmv col large-12 medium-12 small-12">
                <div class="col-inner">
                    <?php
			        foreach ( $customer_orders->orders as $customer_order ) { 
                        $order      = wc_get_order( $customer_order ); // phpcs:ignore WordPress.WP.GlobalVariablesOverride.Prohibited
				        $item_count = $order->get_item_count() - $order->get_item_count_refunded();
                    ?>
                    <div class="_6vwj">
                        <div class="_0hgg">
                            <div class="_3bds">
                                <div class="_7ygv">
                                    <div class="_8dpe">Đơn hàng</div>
                                    <div class="_8tah"><?php echo esc_html( _x( '#', 'hash before order number', 'woocommerce' ) . $order->get_order_number() ); ?></div>
                                    <div class="_6kbi">(<?php echo $item_count; ?> sản phẩm)</div>
                                </div>
                                <div class="_5adt">Ngày đặt hàng: <?php echo esc_html( wc_format_datetime( $order->get_date_created() ) ); ?></div>
                            </div>
                            <div class="_4vnq">
                                <div class="_7asd"><?php echo esc_html( wc_get_order_status_name( $order->get_status() ) ); ?></div>
                            </div>
                        </div>
                        <div class="_6pad">
                            <?php
                                foreach ( $order->get_items() as $item_id => $item ) {
                                if ( is_a( $item, 'WC_Order_Item_Product' ) ) {
                                    $product = $item->get_product(); // Lấy đối tượng sản phẩm
                                    if ( $product ) {
                                        $product_name = $item->get_name(); // Tên sản phẩm
                                        $product_price = wc_price( $product->get_price() ); // Giá sản phẩm
                                        $product_image = wp_get_attachment_image_src( $product->get_image_id(), 'thumbnail' )[0]; // Ảnh sản phẩm
                                        $product_hoa_si = get_field( 'hoa_si', $product->get_id() );
                                        $product_nam_sang_tac = get_field( 'nam_sang_tac', $product->get_id() );
                                        $product_chat_lieu = get_field( 'chat_lieu', $product->get_id() );
                                        $product_size = get_field( 'kich_thuoc', $product->get_id() );
                                        $product_ty_le = get_field( 'ty_le', $product->get_id() );
                            ?>
                            <div class="_6eua">  <!-- Vòng lặp lấy item sản phẩm -->
                                <div class="_1vfy">
                                    <img src="<?php echo esc_url( $product_image ? $product_image : 'https://placehold.co/130x100' ); ?>" alt="<?php echo esc_attr( $product_name ); ?>"> <!-- Ảnh sản phẩm -->
                                </div>
                                <div class="_9vyx">
                                    <div class="_7mvh">
                                        <div class="_0idc">
                                            <?php echo esc_html( $product_name ); ?>
                                        </div> <!-- Tên sản phẩm -->
                                        <div class="_0uha">
                                            Chất liệu: <?php echo esc_html( $product_chat_lieu ? $product_chat_lieu : 'Không rõ chất liệu' ); ?>
                                        </div>
                                        <div class="_0uha">
                                            Kích thước: <?php echo esc_html( $product_size ? $product_size : 'Không rõ kích thước' ); ?>
                                        </div>
                                        <div class="_0uha">
                                            Tác giả: <?php echo esc_html( $product_hoa_si ? $product_hoa_si : 'Không rõ tác giả' ); ?>
                                        </div>
                                        <div class="_0uha">
                                            Tỷ lệ: <?php echo esc_html( $product_ty_le ? $product_ty_le : 'Không rõ tỷ lệ' ); ?>
                                        </div>
                                    </div>
                                    <div class="_6nbf"><?php echo $product_price; ?></div> <!-- Giá sản phẩm -->
                                </div>
                            </div>
                            <?php } } } ?>
                        </div>
                        <div class="_3qej">
                            <div class="_0jlq">
                                <a href="<?php echo esc_url( $order->get_view_order_url() ); ?>" class="_0ipk button"><span>Xem chi tiết</span></a>
                            </div>
                            <div class="_7hnp"><?php echo $order->get_formatted_order_total(); ?></div>
                        </div>
                    </div>
                    <?php } ?>
                </div>
            </div>
        </div>
        </div>
    </section>
	<?php do_action( 'woocommerce_before_account_orders_pagination' ); ?>

	<?php if ( 1 < $customer_orders->max_num_pages ) : ?>
		<div class="woocommerce-pagination woocommerce-pagination--without-numbers woocommerce-Pagination">
			<?php if ( 1 !== $current_page ) : ?>
				<a class="woocommerce-button woocommerce-button--previous woocommerce-Button woocommerce-Button--previous button<?php echo esc_attr( $wp_button_class ); ?>" href="<?php echo esc_url( wc_get_endpoint_url( 'orders', $current_page - 1 ) ); ?>"><?php esc_html_e( 'Previous', 'woocommerce' ); ?></a>
			<?php endif; ?>

			<?php if ( intval( $customer_orders->max_num_pages ) !== $current_page ) : ?>
				<a class="woocommerce-button woocommerce-button--next woocommerce-Button woocommerce-Button--next button<?php echo esc_attr( $wp_button_class ); ?>" href="<?php echo esc_url( wc_get_endpoint_url( 'orders', $current_page + 1 ) ); ?>"><?php esc_html_e( 'Next', 'woocommerce' ); ?></a>
			<?php endif; ?>
		</div>
	<?php endif; ?>

<?php else : ?>

	<?php wc_print_notice( esc_html__( 'No order has been made yet.', 'woocommerce' ) . ' <a class="woocommerce-Button wc-forward button' . esc_attr( $wp_button_class ) . '" href="' . esc_url( apply_filters( 'woocommerce_return_to_shop_redirect', wc_get_page_permalink( 'shop' ) ) ) . '">' . esc_html__( 'Browse products', 'woocommerce' ) . '</a>', 'notice' ); // phpcs:ignore WooCommerce.Commenting.CommentHooks.MissingHookComment ?>

<?php endif; ?>

<?php do_action( 'woocommerce_after_account_orders', $has_orders ); ?>
