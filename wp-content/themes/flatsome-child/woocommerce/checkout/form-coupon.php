<?php
/**
 * Checkout coupon form
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/checkout/form-coupon.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see              https://docs.woocommerce.com/document/template-structure/
 * @package          WooCommerce\Templates
 * @version          7.0.1
 * @flatsome-version 3.16.2
 */

defined( 'ABSPATH' ) || exit;

if ( ! wc_coupons_enabled() ) { // @codingStandardsIgnoreLine.
	return;
}

?>
<form class="checkout_coupon woocommerce-form-coupon has-border is-dashed" method="post">
	<div class="coupon">
		<div class="flex-row medium-flex-wrap">
			<div class="flex-col flex-grow col-one-cp">
				<input type="text" name="coupon_code" class="input-text" placeholder="<?php esc_attr_e( 'Mã giảm giá', 'woocommerce' ); ?>" id="coupon_code" value="" />
			</div>
			<div class="flex-col col-two-cp">
				<button type="submit" class="button expand<?php if ( fl_woocommerce_version_check( '7.0.1' ) ) { echo esc_attr( wc_wp_theme_get_element_class_name( 'button' ) ? ' ' . wc_wp_theme_get_element_class_name( 'button' ) : '' ); } ?>" name="apply_coupon" value="<?php esc_attr_e( 'Apply', 'woocommerce' ); ?>"><?php esc_html_e( 'Apply', 'woocommerce' ); ?></button>
			</div>
		</div>
	</div>
</form>