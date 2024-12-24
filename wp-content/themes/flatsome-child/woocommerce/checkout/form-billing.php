<?php
/**
 * Checkout billing information form
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/checkout/form-billing.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.6.0
 * @global WC_Checkout $checkout
 */

defined( 'ABSPATH' ) || exit;
?>
<div class="_0cdo woocommerce-billing-fields">
	<div class="_2teh">
        <h3 class="_8spt">Thông tin đặt hàng</h3>
        <p class="_2idb">Tác phẩm nghệ thuật của bạn sẽ yêu cầu chữ ký khi giao hàng, vui lòng đảm bảo bạn cung cấp địa chỉ nơi có người có thể nhận hàng.</p>
    </div>
	<?php  do_action( 'woocommerce_before_checkout_billing_form', $checkout ); ?>

	<div class="woocommerce-billing-fields__field-wrapper">
		<?php
		$fields = $checkout->get_checkout_fields( 'billing' );
		foreach ( $fields as $key => $field ) {
			woocommerce_form_field( $key, $field, $checkout->get_value( $key ) );
		}
		?>
	</div>
	<?php do_action( 'woocommerce_after_checkout_billing_form', $checkout ); ?>
	<div id="lozola"></div>
</div>
<div class="_0cdo">
    <div class="_2teh">
        <h3 class="_8spt">Phương thức thanh toán</h3>
    </div>
    <div class="_6vzn">
        <div class="_1veo">
            <div class="_9alq"><img src="<?php echo home_url(); ?>/wp-content/themes/flatsome-child/img/cod.png"></div>
            <div class="_2nfw">
                <div class="_4ujd">Thanh toán bằng tiền mặt</div>
                <div class="_8udn">Giao hàng trong vòng 2-5 ngày làm việc</div>
            </div>
        </div>
        <div class="_1veo">
            <div class="_9alq"><img src="<?php echo home_url(); ?>/wp-content/themes/flatsome-child/img/stripe.png"></div>
            <div class="_2nfw">
                <div class="_4ujd">Thanh toán qua Stripe</div>
                <div class="_8udn">Giao hàng trong vòng 2-5 ngày làm việc</div>
            </div>
        </div>
    </div>
</div>
<?php if ( ! is_user_logged_in() && $checkout->is_registration_enabled() ) : ?>
	<div class="woocommerce-account-fields">
		<?php if ( ! $checkout->is_registration_required() ) : ?>

			<p class="form-row form-row-wide create-account">
				<label class="woocommerce-form__label woocommerce-form__label-for-checkbox checkbox">
					<input class="woocommerce-form__input woocommerce-form__input-checkbox input-checkbox" id="createaccount" <?php checked( ( true === $checkout->get_value( 'createaccount' ) || ( true === apply_filters( 'woocommerce_create_account_default_checked', false ) ) ), true ); ?> type="checkbox" name="createaccount" value="1" /> <span><?php esc_html_e( 'Create an account?', 'woocommerce' ); ?></span>
				</label>
			</p>

		<?php endif; ?>

		<?php do_action( 'woocommerce_before_checkout_registration_form', $checkout ); ?>

		<?php if ( $checkout->get_checkout_fields( 'account' ) ) : ?>

			<div class="create-account">
				<?php foreach ( $checkout->get_checkout_fields( 'account' ) as $key => $field ) : ?>
					<?php woocommerce_form_field( $key, $field, $checkout->get_value( $key ) ); ?>
				<?php endforeach; ?>
				<div class="clear"></div>
			</div>

		<?php endif; ?>

		<?php do_action( 'woocommerce_after_checkout_registration_form', $checkout ); ?>
	</div>
<?php endif; ?>
