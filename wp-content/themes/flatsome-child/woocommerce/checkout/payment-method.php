<?php

/**
 * Output a single payment method
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/checkout/payment-method.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see         https://docs.woocommerce.com/document/template-structure/
 * @package     WooCommerce\Templates
 * @version     3.5.0
 */
if (!defined('ABSPATH')) {
	exit;
}
?>
<?php

if ($gateway->id == 'mecom_stripe' || $gateway->id == 'stripe') { ?>
	<li class="wc_payment_method payment_method_<?php echo esc_attr($gateway->id); ?>">
		<label class="method-tab" for="payment_method_<?php echo esc_attr($gateway->id); ?>">
			<div class="headding-method">
				<input id="payment_method_<?php echo esc_attr($gateway->id); ?>" type="radio" class="input-radio" name="payment_method" value="<?php echo esc_attr($gateway->id); ?>" <?php checked($gateway->chosen, true); ?> data-order_button_text="<?php echo esc_attr($gateway->order_button_text); ?>" />
				<span for="payment_method_<?php echo esc_attr($gateway->id); ?>">
					<?php echo $gateway->get_title(); /* phpcs:ignore WordPress.XSS.EscapeOutput.OutputNotEscaped */ ?>
					<?php // echo $gateway->get_icon(); /* phpcs:ignore WordPress.XSS.EscapeOutput.OutputNotEscaped */ ?>
				</span>
			</div>
			<div class="list-example-method">
				<div class="item"><img src="<?php echo get_stylesheet_directory_uri() . '/img/admin/icon-payment/visa.svg'; ?>" /></div>
				<div class="item"><img src="<?php echo get_stylesheet_directory_uri() . '/img/admin/icon-payment/mastercard.svg'; ?>" /></div>
				<div class="item"><img src="<?php echo get_stylesheet_directory_uri() . '/img/admin/icon-payment/amex.svg'; ?>" /></div>
				<div class="item more-card"><span>+2</span></div>
			</div>
		</label>
		<?php if ($gateway->has_fields() || $gateway->get_description()) : ?>
			<div class="payment_box payment_method_<?php echo esc_attr($gateway->id); ?>" <?php if (!$gateway->chosen) : /* phpcs:ignore Squiz.ControlStructures.ControlSignature.NewlineAfterOpenBrace */ ?>style="display:none;" <?php endif; /* phpcs:ignore Squiz.ControlStructures.ControlSignature.NewlineAfterOpenBrace */ ?>>
				<?php $gateway->payment_fields(); ?>
			</div>
		<?php endif; ?>
	</li>
<?php } else if ($gateway->id == 'mecom_paypal' || $gateway->id == 'meshcheckout_paypal') { ?>
	<li class="wc_payment_method payment_method_<?php echo esc_attr($gateway->id); ?>">
		<label class="method-tab" for="payment_method_<?php echo esc_attr($gateway->id); ?>">
			<div class="headding-method">
				<input id="payment_method_<?php echo esc_attr($gateway->id); ?>" type="radio" class="input-radio" name="payment_method" value="<?php echo esc_attr($gateway->id); ?>" <?php checked($gateway->chosen, true); ?> data-order_button_text="<?php echo esc_attr($gateway->order_button_text); ?>" />
				<span for="payment_method_<?php echo esc_attr($gateway->id); ?>">
					<?php echo $gateway->get_title(); /* phpcs:ignore WordPress.XSS.EscapeOutput.OutputNotEscaped */ ?> 
				</span>
			</div>
			<div class="list-example-method">
				<span for="payment_method_<?php echo esc_attr($gateway->id); ?>">
					<?php echo $gateway->get_icon(); /* phpcs:ignore WordPress.XSS.EscapeOutput.OutputNotEscaped */ ?>
				</span>
			</div>
		</label>
		<?php if ($gateway->has_fields() || $gateway->get_description()) : ?>
			<div class="payment_box payment_method_<?php echo esc_attr($gateway->id); ?>" <?php if (!$gateway->chosen) : /* phpcs:ignore Squiz.ControlStructures.ControlSignature.NewlineAfterOpenBrace */ ?>style="display:none;" <?php endif; /* phpcs:ignore Squiz.ControlStructures.ControlSignature.NewlineAfterOpenBrace */ ?>>
				<?php $gateway->payment_fields(); ?>
				<!-- <p style="margin-bottom: 15px;">After clicking “Pay with PayPal”, you will be redirected to PayPal to complete your purchase securely.</p> -->
				<?php mecom_paypal_add_button_credit();?>
			</div>
		<?php endif; ?>
	</li>
<?php } else { ?>
	<li class="wc_payment_method payment_method_<?php echo esc_attr($gateway->id); ?>">
		<label class="method-tab" for="payment_method_<?php echo esc_attr($gateway->id); ?>">
			<div class="headding-method">
				<input id="payment_method_<?php echo esc_attr($gateway->id); ?>" type="radio" class="input-radio" name="payment_method" value="<?php echo esc_attr($gateway->id); ?>" <?php checked($gateway->chosen, true); ?> data-order_button_text="<?php echo esc_attr($gateway->order_button_text); ?>" />
				<span for="payment_method_<?php echo esc_attr($gateway->id); ?>">
					<?php echo $gateway->get_title(); /* phpcs:ignore WordPress.XSS.EscapeOutput.OutputNotEscaped */ ?> <?php echo $gateway->get_icon(); /* phpcs:ignore WordPress.XSS.EscapeOutput.OutputNotEscaped */ ?>
				</span>
			</div>
		</label>
		<?php if ($gateway->has_fields() || $gateway->get_description()) : ?>

			<div class="payment_box payment_method_<?php echo esc_attr($gateway->id); ?>" <?php if (!$gateway->chosen) : /* phpcs:ignore Squiz.ControlStructures.ControlSignature.NewlineAfterOpenBrace */ ?>style="display:none;" <?php endif; /* phpcs:ignore Squiz.ControlStructures.ControlSignature.NewlineAfterOpenBrace */ ?>>
				<?php $gateway->payment_fields(); ?>
			</div>
		<?php endif; ?>
	</li>
<?php } ?>