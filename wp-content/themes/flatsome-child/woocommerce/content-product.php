<?php
/**
 * The template for displaying product content within loops
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see              https://docs.woocommerce.com/document/template-structure/
 * @package          WooCommerce/Templates
 * @version          3.6.0
 * @flatsome-version 3.16.0
 */
defined( 'ABSPATH' ) || exit;
global $product;
// Ensure visibility.
if ( empty( $product ) || false === wc_get_loop_product_visibility( $product->get_id() ) || ! $product->is_visible() ) {
	return;
}
// Check stock status.
$out_of_stock = ! $product->is_in_stock();
// Extra post classes.
$classes   = array();
$classes[] = 'product-small';
$classes[] = 'col';
$classes[] = 'has-hover';
if ( $out_of_stock ) $classes[] = 'out-of-stock';
?><div <?php wc_product_class( $classes, $product ); ?>>
	<div class="col-inner">
	<?php // do_action( 'woocommerce_before_shop_loop_item' ); ?>
	<div class="product-small box box-product-customize <?php echo flatsome_product_box_class(); ?>">
		<div class="box-image customer-box-image-product">
			<div class="<?php echo flatsome_product_box_image_class(); ?>">
				<a href="<?php echo get_the_permalink(); ?>" aria-label="<?php echo esc_attr( $product->get_title() ); ?>">
					<img class="wvs-archive-product-image" src="<?php  echo wp_get_attachment_url( $product->get_image_id() ); ?>" />
					<?php
						/**
						 *
						 * @hooked woocommerce_get_alt_product_thumbnail - 11
						 * @hooked woocommerce_template_loop_product_thumbnail - 10
						 */
						//do_action( 'flatsome_woocommerce_shop_loop_images' );
					?>
				</a>
			</div>
			<div class="image-tools is-small top right show-on-hover">
				<?php do_action( 'flatsome_product_box_tools_top' ); ?>
			</div>
			<div class="image-tools is-small hide-for-small bottom left show-on-hover">
				<?php do_action( 'flatsome_product_box_tools_bottom' ); ?>
			</div>
			<div class="image-tools <?php echo flatsome_product_box_actions_class(); ?>">
				<?php do_action( 'flatsome_product_box_actions' ); ?>
			</div>
			<?php if ( $out_of_stock ) { ?><div class="out-of-stock-label"><?php _e( 'Out of stock', 'woocommerce' ); ?></div><?php } ?>
		</div>
		<?php do_action( 'woocommerce_after_shop_loop_item' ); ?>
		<div class="box-text <?php echo flatsome_product_box_text_class(); ?>">
            <div class="box-product">
                <div class="_7tei">
                    <div class="_4hcl textLine-1"><?php the_title(); ?></div>
                    <?php if(get_field('kich_thuoc')): ?>
                    <div class="_5vld textLine-1"><?php the_field('kich_thuoc'); ?></div>
                    <?php endif; ?>
                </div>
                <div class="_5cyg"><?php echo $product->get_price_html(); ?></div>
            </div>
		</div>
	</div>
	</div>
</div><?php /* empty PHP to avoid whitespace */ ?>