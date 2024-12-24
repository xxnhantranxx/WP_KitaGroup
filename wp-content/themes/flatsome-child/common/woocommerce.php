<?php
if ( ! function_exists( 'flatsome_woocommerce_shop_loop_category' ) ) {
	/**
	 * Add and/or Remove Categories
	 */
	function flatsome_woocommerce_shop_loop_category() {
		if ( ! flatsome_option( 'product_box_category' ) ) {
			return;
		} ?>
		<p class="category is-smaller no-text-overflow product-cat op-7">
			<?php
			global $product;
			$product_cats = wc_get_product_category_list( get_the_ID(), '\n', '', '' );
			$product_cats = strip_tags( $product_cats );

			if ( $product_cats ) {
				list( $first_part ) = explode( '\n', $product_cats );
				echo esc_html( apply_filters( 'flatsome_woocommerce_shop_loop_category', $first_part, $product ) );
			}
			?>
		</p>
	<?php
	}
}
add_action( 'woocommerce_shop_loop_item_title', 'flatsome_woocommerce_shop_loop_category', 12 );

add_action( 'flatsome_woocommerce_shop_loop_images', 'flatsome_woocommerce_get_alt_product_thumbnail', 11 );

if ( ! function_exists( 'woocommerce_template_loop_product_title' ) ) {
	/**
	 * Fix WooCommerce Loop Title
	 */
	function woocommerce_template_loop_product_title() {
		echo '<p class="name product-title ' . esc_attr( apply_filters( 'woocommerce_product_loop_title_classes', 'woocommerce-loop-product__title' ) ) . '">';
		woocommerce_template_loop_product_link_open();
        $is_new = get_field('is_new');
        if($is_new){?>
            <span class="new eb-product-title-badge">New!</span>
        <?php }
		echo get_the_title();  // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
		woocommerce_template_loop_product_link_close();
		echo '</p>';
	}
}

// custom fields check out woocommecere customize
add_filter('woocommerce_checkout_fields', 'custom_override_checkout_fields');
function custom_override_checkout_fields($fields)
{
  unset($fields['billing']['billing_company']);
  return $fields;
}

add_filter('woocommerce_billing_fields', 'remove_required_fields');
function remove_required_fields($fields)
{
  $fields['billing_email']['required'] = true;
  $fields['billing_first_name']['required'] = false;
  $fields['billing_state']['required'] = false;
  $fields['billing_address_2']['required'] = false;
  $fields['billing_last_name']['required'] = true;
  $fields['billing_company']['required'] = false;
  // $fields['billing_country']['required'] = false;
  $fields['billing_city']['required'] = false;
  return $fields;
}

add_filter('woocommerce_default_address_fields', 'override_address_fields');
function override_address_fields($address_fields)
{
  $address_fields['first_name']['placeholder'] = 'Họ (optional)';
  $address_fields['last_name']['placeholder'] = 'Tên';
  $address_fields['address_1']['placeholder'] = 'Địa chỉ';
  $address_fields['city']['placeholder'] = 'Tỉnh/Thành phố';
  $address_fields['state']['placeholder'] = 'Bang';
  $address_fields['postcode']['placeholder'] = 'Mã zipcode';
  return $address_fields;
}

add_filter('woocommerce_checkout_fields', 'override_billing_checkout_fields', 20, 1);
function override_billing_checkout_fields($fields)
{
  $fields['billing']['billing_email']['placeholder'] = 'Email';
  return $fields;
}

/*
 * Remove Yoast SEO Filters
 */
function custom_remove_yoast_seo_admin_filters() {
    global $wpseo_meta_columns;
    if ($wpseo_meta_columns) {
        remove_action('restrict_manage_posts', array($wpseo_meta_columns, 'posts_filter_dropdown'));
        remove_action('restrict_manage_posts', array($wpseo_meta_columns, 'posts_filter_dropdown_readability'));
    }
}
add_action('admin_init', 'custom_remove_yoast_seo_admin_filters', 20);


function wpa104537_filter_products_by_featured_status() {

    global $typenow, $wp_query;
    $output = '';
   if ($typenow=='product') :


       // Featured/ Not Featured
       $output .= "<select name='featured_status' id='dropdown_featured_status'>";
       $output .= '<option value="">'.__( 'Featured Statuses', 'woocommerce' ).'</option>';

       $output .="<option value='featured' ";
       if ( isset( $_GET['featured_status'] ) ) $output .= selected('featured', $_GET['featured_status'], false);
       $output .=">".__( 'Featured', 'woocommerce' )."</option>";

       $output .="<option value='normal' ";
       if ( isset( $_GET['featured_status'] ) ) $output .= selected('normal', $_GET['featured_status'], false);
       $output .=">".__( 'Not Featured', 'woocommerce' )."</option>";

       $output .="</select>";

       echo $output;
   endif;
}

add_action('restrict_manage_posts', 'wpa104537_filter_products_by_featured_status');
/**
 * Filter the products in admin based on options
 *
 * @access public
 * @param mixed $query
 * @return void
 */
function wpa104537_featured_products_admin_filter_query( $query ) {
    global $typenow;

    if ( $typenow == 'product' ) {

        // Subtypes
        if ( ! empty( $_GET['featured_status'] ) ) {
            if ( $_GET['featured_status'] == 'featured' ) {
                $query->query_vars['tax_query'][] = array(
                    'taxonomy' => 'product_visibility',
                    'field'    => 'slug',
                    'terms'    => 'featured',
                );
            } elseif ( $_GET['featured_status'] == 'normal' ) {
                $query->query_vars['tax_query'][] = array(
                    'taxonomy' => 'product_visibility',
                    'field'    => 'slug',
                    'terms'    => 'featured',
                    'operator' => 'NOT IN',
                );
            }
        }

    }

}
add_filter( 'parse_query', 'wpa104537_featured_products_admin_filter_query' );

// Replate price variation
add_action( 'woocommerce_before_single_product', 'move_variations_single_price', 1 );
function move_variations_single_price(){
  global $product, $post;
  if($product->is_type( 'variable' )){
    $min_price_for_display = $product->get_variation_price('min', true);
    $max_price_for_display = $product->get_variation_price('max', true);
    add_action( 'woocommerce_single_product_summary', 'replace_variation_single_price', 10 );
  }
}

function replace_variation_single_price() {
  ?>
<style>
.woocommerce-variation-price {
    display: none;
}
</style>
<script>
jQuery(document).ready(function($) {
    
    var priceselector = '.product p.price';
    var originalprice = $(priceselector).html();
    $(document).on('show_variation', function() {
        var hasMutiPrice = $('.single_variation .woocommerce-variation-price');
        if(!hasMutiPrice.is(':empty')){
            $(priceselector).html($('.single_variation .woocommerce-variation-price').html());
        }
    });
    $(document).on('hide_variation', function() {
        $(priceselector).html(originalprice);
    });
});
</script>
<?php
}


/** Remove product data tabs */

add_filter( 'woocommerce_product_tabs', 'my_remove_product_tabs', 98 );
function my_remove_product_tabs( $tabs ) {
  unset( $tabs['additional_information'] ); // To remove the additional information tab
  unset($tabs['reviews']);
  return $tabs;
}

function DocumentSingleProduct(){?>
    <div class="_3gbn">
        <ul class="_2fgp">
            <?php 
            if(get_field('hoa_si')){?>
                <li class="_5rrf">Hoạ sĩ: <?php echo get_field('hoa_si'); ?></li>
            <?php } ?>
            <?php 
            if(get_field('nam_sang_tac')){?>
                <li class="_5rrf">Năm sáng tác: <?php echo get_field('nam_sang_tac'); ?></li>
            <?php } ?>
            <?php 
            if(get_field('chat_lieu')){?>
                <li class="_5rrf">Chất liệu: <?php echo get_field('chat_lieu'); ?></li>
            <?php } ?>
            <?php 
            if(get_field('kich_thuoc')){?>
                <li class="_5rrf">Kích thước: <?php echo get_field('kich_thuoc'); ?></li>
            <?php } ?>
            <?php 
            if(get_field('ty_le')){?>
                <li class="_5rrf">Tỷ lệ: <?php echo get_field('ty_le'); ?></li>
            <?php } ?>
        </ul>
    </div>
<?php }
add_action( 'woocommerce_single_product_summary', 'DocumentSingleProduct', 6 );



//Change position field checkout billing
add_filter( 'woocommerce_default_address_fields', 'mrks_woocommerce_default_address_fields' );

function mrks_woocommerce_default_address_fields( $fields ) {

    // default priorities:
    // 'first_name' - 10
    // 'last_name' - 20
    // 'company' - 30
    // 'country' - 40
    // 'address_1' - 50
    // 'address_2' - 60
    // 'city' - 70
    // 'state' - 80
    // 'postcode' - 90

  // e.g. move 'company' above 'first_name':
  // just assign priority less than 10
  $fields['country']['priority'] = 1;

  return $fields;
}

// Handle count cart
add_filter( 'woocommerce_add_to_cart_fragments', 'wc_refresh_mini_cart_count');
function wc_refresh_mini_cart_count($fragments){
    ob_start();
    $items_count = WC()->cart->get_cart_contents_count();
    ?>
<div id="mini-cart-count"><?php echo $items_count ? $items_count : '0'; ?></div>
<?php
        $fragments['#mini-cart'] = ob_get_clean();
    return $fragments;
}

//Show address
add_filter( 'woocommerce_order_get_formatted_billing_address', 'add_custom_field_billing_address', 10, 3 );
function add_custom_field_billing_address( $address, $raw_address, $order ) {

    $countries = new WC_Countries();
    // gets country and state codes
    $billing_country = $order->get_billing_country();
    $billing_state = $order->get_billing_state();
    // gets the full names of the country and state
    $full_country = ( isset( $countries->countries[ $billing_country ] ) ) ? $countries->countries[ $billing_country ] : $billing_country;
    $full_state = ( $billing_country && $billing_state && isset( $countries->states[ $billing_country ][ $billing_state ] ) ) ? $countries->states[ $billing_country ][ $billing_state ] : $billing_state;

    $data = array(
        '<div class="field-order-bill"><i class="fa-light fa-user"></i><span>'.$order->get_billing_first_name() . ' ' . $order->get_billing_last_name().'</span></div>',
        '<div class="field-order-bill"><i class="fa-light fa-location-dot"></i><span>'.$full_country.', ',
        $full_state.', ',
        $order->get_billing_city().', ',
        $order->get_billing_address_1().'</span></div>',
        $order->get_billing_address_2(),
        $order->get_meta( '_billing_area', true ),             // or $order->get_meta( 'billing_area', true )
        $order->get_meta( '_billing_emirates', true ),         // or $order->get_meta( 'billing_emirates', true )
        $order->get_meta( '_billing_nearest_landmark', true ), // or $order->get_meta( 'billing_nearest_landmark', true )
        $order->get_billing_company(),
    );

    // removes empty fields from the array
    $data = array_filter( $data );
    // create the billing address using the "<br/>" element as a separator
    $address = implode( '', $data );

    echo $address;
}

// Tự động xoá bảng cntt_actionscheduler_actions trong 1 ngày
add_filter( 'action_scheduler_retention_period', 'wp_action_scheduler_purge' );
/**
 * Change Action Scheduler default purge to 1 days
 */
function wpb_action_scheduler_purge() {
 return DAY_IN_SECONDS; #1 ngày
 #return WEEK_IN_SECONDS; #7 ngày
}
add_filter( 'action_scheduler_pastdue_actions_check_pre', '__return_false' );

remove_action( 'woocommerce_before_checkout_form', 'woocommerce_checkout_coupon_form', 10 );
add_action( 'woocommerce_review_order_after_cart_contents', 'woocommerce_checkout_coupon_form_custom' );
function woocommerce_checkout_coupon_form_custom() {
    echo '<tr class="coupon-form"><td colspan="2">';
    wc_get_template(
        'checkout/form-coupon.php',
        array(
            'checkout' => WC()->checkout(),
        )
    );
    echo '</tr></td>';?>
<?php }

add_filter( 'woocommerce_enable_order_notes_field', '__return_false' );

/* Increase Woocommerce Variation Threshold */
function wc_ajax_variation_threshold_modify( $threshold, $product ){
  $threshold = '2000';
  return  $threshold;
}
add_filter( 'woocommerce_ajax_variation_threshold','wc_ajax_variation_threshold_modify', 10, 2 );


add_action( 'woocommerce_save_account_details', 'save_custom_account_fields', 10, 1 );
function save_custom_account_fields( $user_id ) {
    if ( isset( $_POST['account_phone'] ) ) {
        update_user_meta( $user_id, 'account_phone', sanitize_text_field( $_POST['account_phone'] ) );
    }

    if ( isset( $_POST['account_address'] ) ) {
        update_user_meta( $user_id, 'account_address', sanitize_textarea_field( $_POST['account_address'] ) );
    }
}

add_action( 'woocommerce_save_account_details_errors', 'validate_custom_account_fields', 10, 1 );
function validate_custom_account_fields( $args ) {
    if ( isset( $_POST['account_phone'] ) && empty( $_POST['account_phone'] ) ) {
        wc_add_notice( __( 'Vui lòng nhập số điện thoại.', 'woocommerce' ), 'error' );
    }

    if ( isset( $_POST['account_address'] ) && empty( $_POST['account_address'] ) ) {
        wc_add_notice( __( 'Vui lòng nhập địa chỉ.', 'woocommerce' ), 'error' );
    }
}

add_filter('woocommerce_checkout_fields', 'set_checkout_country_based_on_ip');

function set_checkout_country_based_on_ip($fields) {
    // Lấy địa chỉ IP của người dùng
    $ip_address = $_SERVER['REMOTE_ADDR'];

    // Sử dụng một dịch vụ bên ngoài để lấy thông tin địa lý dựa trên IP
    $response = wp_remote_get("http://ip-api.com/json/{$ip_address}");
    $data = json_decode(wp_remote_retrieve_body($response));

    if ($data && isset($data->countryCode)) {
        // Đặt quốc gia mặc định cho trường billing_country
        $fields['billing']['billing_country']['default'] = $data->countryCode;
    }

    return $fields;
}