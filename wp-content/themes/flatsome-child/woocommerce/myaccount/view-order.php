<?php

/**
 * View Order
 *
 * Shows the details of a particular order on the account page.
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/myaccount/view-order.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.0.0
 */

defined('ABSPATH') || exit;

// $notes = $order->get_customer_order_notes();
echo do_shortcode('[block id="banner-order"]');
?>
<section class="_7rnz section">
    <div class="section-bg fill"></div>
    <div class="section-content relative">
        <div class="_9dgm row row-small">
            <div class="_6yvq col large-12 medium-12 small-12">
                <div class="col-inner">
                    <div class="_4oho">
                        <div class="_9mcu">
                            <div class="_7asd"><?php echo esc_html(wc_get_order_status_name($order->get_status())); ?></div>
                        </div>
                        <div class="_1jjf">
                            <div class="_8bdp">
                                <div class="_4zsr">Ngày đặt hàng</div>
                                <div class="_6pyq"><?php echo esc_html(wc_format_datetime($order->get_date_created())); ?></div>
                            </div>
                            <div class="_8bdp">
                                <div class="_4zsr">Tên người nhận</div>
                                <div class="_6pyq"><?php echo esc_html($order->get_billing_first_name() . ' ' . $order->get_billing_last_name()); ?></div>
                            </div>
                            <div class="_8bdp">
                                <div class="_4zsr">Địa chỉ email</div>
                                <div class="_6pyq"><?php echo esc_html($order->get_billing_email()); ?></div>
                            </div>
                            <div class="_8bdp">
                                <div class="_4zsr">Số điện thoại</div>
                                <div class="_6pyq"><?php echo esc_html($order->get_billing_phone()); ?></div>
                            </div>
                            <div class="_8bdp">
                                <div class="_4zsr">Phương thức thanh toán</div>
                                <div class="_6pyq"><?php echo esc_html($order->get_payment_method_title()); ?></div>
                            </div>
                            <div class="_8bdp">
                                <div class="_4zsr">Ngày giao hàng dự kiến</div>
                                <div class="_6pyq">
                                    <p class="_8syk">
                                        <?php
                                        $estimated_delivery_start = wc_format_datetime($order->get_date_created()->modify('+3 days'));
                                        $estimated_delivery_end = wc_format_datetime($order->get_date_created()->modify('+5 days'));
                                        echo esc_html("3-5 ngày kể từ ngày đặt hàng ($estimated_delivery_start – $estimated_delivery_end).");
                                        ?>
                                    </p>
                                    <p class="_9hab">Lưu ý: Thời gian giao hàng có thể thay đổi tùy thuộc vào đơn vị vận chuyển.</p>
                                </div>
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
                        <div class="_4zpb">
                            <div class="_1lbv">
                                <div class="_7yzv">Tạm tính</div>
                                <div class="_8smw">
                                    <?php 
                                    $subtotal = $order->get_subtotal();
                                    echo wc_price( $subtotal );
                                    ?>
                                </div> <!-- Tạm tính -->
                            </div>
                            <div class="_1lbv">
                                <div class="_7yzv">Phí vận chuyển</div>
                                <div class="_8smw">
                                    <?php 
                                    $shipping_total = $order->get_shipping_total();
                                    echo wc_price( $shipping_total ); 
                                    ?>
                                </div> <!-- Phí vận chuyển -->
                            </div>
                            <div class="_1lbv">
                                <div class="_7yzv">Mã giảm giá</div>
                                <div class="_8smw">
                                    <?php 
                                    $discount_total = $order->get_discount_total();
                                    echo esc_html( $discount_total > 0 ? '- ' . wc_price( $discount_total ) : 'Không có mã giảm giá' );
                                    ?>
                                </div> <!-- Mã giảm giá -->
                            </div>
                            <div class="_1lbv">
                                <div class="_7yzv">Phương thức thanh toán</div>
                                <div class="_8smw"><?php echo esc_html( $order->get_payment_method_title() ); ?></div> <!-- Phương thức thanh toán -->
                            </div>
                        </div>
                        <div class="_5riw">
                            <div class="_1sdu">Thành tiền</div>
                            <div class="_2wla">
                                <div class="_3eih"><?php echo $order->get_formatted_order_total(); ?></div>
                                <div class="_3xdw">
                                    <?php
                                    $status = $order->get_status(); // Lấy trạng thái đơn hàng (ví dụ: pending, processing, completed, ...)
                                    if ( $status === 'completed') : ?>
                                        <span style="color: #006B10;">Đã thanh toán</span>
                                        <i class="fa-solid fa-square-check" style="color: #006B10;"></i>
                                    <?php else : ?>
                                        <span style="color: #990000;">Chưa thanh toán</span>
                                        <i class="fa-solid fa-square-xmark" style="color: #990000;"></i>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php echo do_shortcode('[block id="san-pham"]'); //do_action('woocommerce_view_order', $order_id); ?>