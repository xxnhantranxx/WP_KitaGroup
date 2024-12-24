<?php

/**
 * Checkout Form
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/checkout/form-checkout.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see              https://docs.woocommerce.com/document/template-structure/
 * @package          WooCommerce/Templates
 * @version          3.5.0
 * @flatsome-version 3.16.0
 */

if (!defined('ABSPATH')) {
    exit;
}
global $woocommerce;
$cart = $woocommerce->cart;
$cart_total = $woocommerce->cart->get_cart_total();
$wrapper_classes = array();
$row_classes     = array();
$main_classes    = array();
$sidebar_classes = array();

$layout = get_theme_mod('checkout_layout');

if (!$layout) {
    $sidebar_classes[] = 'has-border';
}

if ($layout == 'simple') {
    $sidebar_classes[] = 'is-well';
}

$wrapper_classes = implode(' ', $wrapper_classes);
$row_classes     = implode(' ', $row_classes);
$main_classes    = implode(' ', $main_classes);
$sidebar_classes = implode(' ', $sidebar_classes);

do_action('woocommerce_before_checkout_form', $checkout);

// If checkout registration is disabled and not logged in, the user cannot checkout.
if (!$checkout->is_registration_enabled() && $checkout->is_registration_required() && !is_user_logged_in()) {
    echo esc_html(apply_filters('woocommerce_checkout_must_be_logged_in_message', __('You must be logged in to checkout.', 'woocommerce')));
    return;
}

// Social login.
if (flatsome_option('facebook_login_checkout') && get_option('woocommerce_enable_myaccount_registration') == 'yes' && !is_user_logged_in()) {
    wc_get_template('checkout/social-login.php');
}
?>
<div class="woocommerce-NoticeGroup woocommerce-NoticeGroup-checkout show-err-form">
    <ul class="woocommerce-error message-wrapper" role="alert">
        <li>
            <div class="message-container container alert-color medium-text-center">Vui lòng đọc và chấp nhận các điều khoản và điều kiện để tiếp tục đặt hàng.</div>
        </li>
    </ul>
</div>
<form name="checkout" method="post" class="checkout woocommerce-checkout <?php echo esc_attr($wrapper_classes); ?>" action="<?php echo esc_url(wc_get_checkout_url()); ?>" enctype="multipart/form-data">
    <div class="_0gxt row row-collapse pt-0 <?php echo esc_attr($row_classes); ?>">
        <div class="large-7 col  <?php echo esc_attr($main_classes); ?>">
            <div class="inner-col-left woo_method_checkout">
                <?php if ($checkout->get_checkout_fields()) : ?>

                    <?php do_action('woocommerce_checkout_before_customer_details'); ?>

                    <div id="customer_details">
                        <div class="clear">
                            <?php do_action('woocommerce_checkout_billing'); ?>
                        </div>

                        <div class="clear">
                            <?php do_action('woocommerce_checkout_shipping'); ?>
                        </div>
                    </div>

                    <?php do_action('woocommerce_checkout_after_customer_details'); ?>

                <?php endif; ?>

                <?php if (WC()->cart->needs_shipping() && WC()->cart->show_shipping()) : ?>

                    <?php do_action('woocommerce_review_order_before_shipping'); ?>

                    <?php wc_cart_totals_shipping_html(); ?>

                    <?php do_action('woocommerce_review_order_after_shipping'); ?>

                <?php endif; ?>
            </div>
        </div>

        <div class="large-5 col hide-for-small">
            <?php flatsome_sticky_column_open('checkout_sticky_sidebar'); ?>
            <div class="gap-gray"></div>
            <div class="col-inner <?php echo esc_attr($sidebar_classes); ?>">
                <div class="checkout-sidebar sm-touch-scroll">
                    <?php do_action('woocommerce_checkout_before_order_review_heading'); ?>
                    <div class="headding-order-summary">
                        <h3 class="show-for-small" id="order_review_heading"><?php esc_html_e('Tóm tắt đơn', 'woocommerce'); ?> <span>(<?php echo WC()->cart->get_cart_contents_count(); ?>)</span></h3>
                        <div class="show-label show-for-small">
                            <span>Hiện</span>
                            <i class="fa fa-angle-down" aria-hidden="true"></i>
                        </div>
                    </div>
                    <?php do_action('woocommerce_checkout_before_order_review'); ?>
                    <div class="_7ezd">
                        <h3 class="_8akg">Giỏ hàng</h3>
                    </div>
                    <div id="order_review" class="woocommerce-checkout-review-order">
                        <?php do_action('woocommerce_checkout_order_review'); ?>
                    </div>
                    <?php do_action('woocommerce_checkout_after_order_review'); ?>
                    <div class="show-for-small">
                        <button type="submit" class="button alt" name="woocommerce_checkout_place_order" id="place_order" value="Thanh toán ngay" data-value="Thanh toán ngay">Thanh toán ngay</button>
                    </div>
                </div>
            </div>
            <?php flatsome_sticky_column_close('checkout_sticky_sidebar'); ?>
            <div class="gap-gray"></div>
        </div>
    </div>
</form>
<div class="show-for-small top-review-checkout">
    <div class="review-toggle">
        <span class="label"><span>Hiển thị thông tin</span> <i class="fa fa-angle-up" aria-hidden="true"></i></span>
        <span class="total-price"><?php print_r($cart_total); ?></span>
    </div>
    <div class="dropdown-review-layout">
        <?php flatsome_sticky_column_open('checkout_sticky_sidebar'); ?>
        <div class="col-inner <?php echo esc_attr($sidebar_classes); ?>">
            <div class="checkout-sidebar">
                <div id="order_review" class="woocommerce-checkout-review-order">
                    <?php do_action('woocommerce_checkout_order_review'); ?>
                </div>
            </div>
        </div>
    </div>
</div>
<?php do_action('woocommerce_after_checkout_form', $checkout); ?>