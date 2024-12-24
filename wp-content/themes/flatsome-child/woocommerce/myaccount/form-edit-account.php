<?php
/**
 * Edit account form
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/myaccount/form-edit-account.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 8.7.0
 */

defined( 'ABSPATH' ) || exit;
echo do_shortcode('[block id="banner-tai-khoan"]');
do_action( 'woocommerce_before_edit_account_form' ); ?>
<section class="_7vuu section">
	<div class="section-bg fill"></div>
	<div class="section-content relative">
        <div class="_0uhf row row-small">
            <div class="_8wvz col large-12 medium-12 small-12">
                <div class="col-inner">
                    <form class="woocommerce-EditAccountForm edit-account" action="" method="post" <?php do_action( 'woocommerce_edit_account_form_tag' ); ?> >
                        <?php do_action( 'woocommerce_edit_account_form_start' ); ?>
                        <div class="_2agj">
                            <div class="_6rfy">Họ</div>
                            <div class="_1tem">
                                <input type="text" class="woocommerce-Input woocommerce-Input--text input-text" name="account_first_name" id="account_first_name" autocomplete="given-name" value="<?php echo esc_attr( $user->first_name ); ?>" />
                            </div>
                        </div>
                        <div class="_2agj">
                            <div class="_6rfy">Tên</div>
                            <div class="_1tem">
                                <input type="text" class="woocommerce-Input woocommerce-Input--text input-text" name="account_last_name" id="account_last_name" autocomplete="family-name" value="<?php echo esc_attr( $user->last_name ); ?>" />
                            </div>
                        </div>
                        <div class="_2agj">
                            <div class="_6rfy">Tên hiển thị</div>
                            <div class="_1tem">
                                <input type="text" class="woocommerce-Input woocommerce-Input--text input-text" name="account_display_name" id="account_display_name" value="<?php echo esc_attr( $user->display_name ); ?>" />
                            </div>
                        </div>
                        <div class="_2agj">
                            <div class="_6rfy">Số điện thoại</div>
                            <div class="_1tem">
                                <input type="text" class="woocommerce-Input woocommerce-Input--text input-text" name="account_phone" id="account_phone" value="<?php echo esc_attr( get_user_meta( $user->ID, 'account_phone', true ) ); ?>" />
                            </div>
                        </div>
                        <div class="_2agj">
                            <div class="_6rfy">Địa chỉ</div>
                            <div class="_1tem">
                                <textarea class="woocommerce-Input woocommerce-Input--textarea input-text" name="account_address" id="account_address"><?php echo esc_textarea( get_user_meta( $user->ID, 'account_address', true ) ); ?></textarea>
                            </div>
                        </div>
                        <div class="_2agj">
                            <div class="_6rfy">Địa chỉ email</div>
                            <div class="_1tem">
                                <input type="email" class="woocommerce-Input woocommerce-Input--email input-text" name="account_email" id="account_email" autocomplete="email" value="<?php echo esc_attr( $user->user_email ); ?>" />
                            </div>
                        </div>
                        <?php
                            /**
                             * Hook where additional fields should be rendered.
                             *
                             * @since 8.7.0
                             */
                            do_action( 'woocommerce_edit_account_form_fields' );
                        ?>
                        <fieldset class="_2rlq">
                            <div class="_2agj">
                                <div class="_6rfy">Mật khẩu hiện tại</div>
                                <div class="_1tem">
                                    <input type="password" class="woocommerce-Input woocommerce-Input--password input-text" name="password_current" id="password_current" autocomplete="off" />
                                </div>
                            </div>
                            <div class="_2agj">
                                <div class="_6rfy">Mật khẩu mới</div>
                                <div class="_1tem">
                                    <input type="password" class="woocommerce-Input woocommerce-Input--password input-text" name="password_1" id="password_1" autocomplete="off" />
                                </div>
                            </div>
                            <div class="_2agj">
                                <div class="_6rfy">Nhập lại mật khẩu</div>
                                <div class="_1tem">
                                    <input type="password" class="woocommerce-Input woocommerce-Input--password input-text" name="password_2" id="password_2" autocomplete="off" />
                                </div>
                            </div>
                        </fieldset>
                        <?php
                            /**
                             * My Account edit account form.
                             *
                             * @since 2.6.0
                             */
                            do_action( 'woocommerce_edit_account_form' );
                        ?>
                        <div class="_0dxm">
                            <?php wp_nonce_field( 'save_account_details', 'save-account-details-nonce' ); ?>
                            <button type="submit" class="woocommerce-Button button<?php echo esc_attr( wc_wp_theme_get_element_class_name( 'button' ) ? ' ' . wc_wp_theme_get_element_class_name( 'button' ) : '' ); ?>" name="save_account_details" value="<?php esc_attr_e( 'Save changes', 'woocommerce' ); ?>"><?php esc_html_e( 'Save changes', 'woocommerce' ); ?></button>
                            <input type="hidden" name="action" value="save_account_details" />
                        </div>
                        <?php do_action( 'woocommerce_edit_account_form_end' ); ?>
                    </form>
                </div>
            </div>
        </div>
	</div>
</section>
<?php do_action( 'woocommerce_after_edit_account_form' ); ?>
