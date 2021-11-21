<?php

/**
 * Review order table
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/checkout/review-order.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 5.2.0
 */

defined('ABSPATH') || exit;
?>

<?php
do_action('woocommerce_review_order_before_cart_contents');

foreach (WC()->cart->get_cart() as $cart_item_key => $cart_item) {
	$_product = apply_filters('woocommerce_cart_item_product', $cart_item['data'], $cart_item, $cart_item_key);

	if ($_product && $_product->exists() && $cart_item['quantity'] > 0 && apply_filters('woocommerce_checkout_cart_item_visible', true, $cart_item, $cart_item_key)) {
?>
		<div class="body-registration__column">
			<div class="body-registration__item item-registration">
				<div class="item-registration__img">
				<?php
						$thumbnail = $_product->get_image_id();
						$image_url = wp_get_attachment_image_url( $thumbnail, 'medium' );

				?>
				<img src="<?php echo $image_url;?>" alt=""/>
				</div>
				<div class="item-registration__name">
					<?php echo wp_kses_post(apply_filters('woocommerce_cart_item_name', $_product->get_name(), $cart_item, $cart_item_key)) . '&nbsp;'; ?>
					<?php echo apply_filters('woocommerce_checkout_cart_item_quantity', ' <strong class="product-quantity">' . sprintf('&times;&nbsp;%s', $cart_item['quantity']) . '</strong>', $cart_item, $cart_item_key); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped 
					?>
					<?php echo wc_get_formatted_cart_item_data($cart_item); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped 
					?>
				</div>
				<div class="item-registration__info">
					<div class="item-registration__price"><?php echo apply_filters('woocommerce_cart_item_subtotal', WC()->cart->get_product_subtotal($_product, $cart_item['quantity']), $cart_item, $cart_item_key); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped 
															?></div>
					<div class="item-registration__size"></div>
				</div>
			</div>
		</div>
<?php
	}
}

do_action('woocommerce_review_order_after_cart_contents');
?>
<div class="body-registration__bottom">
	<div class="body-registration__all"><?php esc_html_e('Subtotal', 'woocommerce'); ?></div>
	<div class="body-registration__price"><?php wc_cart_totals_subtotal_html(); ?></div>
</div>

<?php foreach (WC()->cart->get_coupons() as $code => $coupon) : ?>
	<div class="body-registration__bottom cart-discount coupon-<?php echo esc_attr(sanitize_title($code)); ?>">

		<div class="body-registration__all"><?php wc_cart_totals_coupon_label($coupon); ?>
			<?php wc_cart_totals_coupon_html($coupon); ?></div>

	</div>
<?php endforeach; ?>

<?php if (WC()->cart->needs_shipping() && WC()->cart->show_shipping()) : ?>

	<?php do_action('woocommerce_review_order_before_shipping'); ?>

	<?php wc_cart_totals_shipping_html(); ?>

	<?php do_action('woocommerce_review_order_after_shipping'); ?>

<?php endif; ?>

<?php foreach (WC()->cart->get_fees() as $fee) : ?>
	<div class="body-registration__bottom">
		<div class="body-registration__all"><?php echo esc_html($fee->name); ?>
			<?php wc_cart_totals_fee_html($fee); ?></div>
	</div>
<?php endforeach; ?>



<?php do_action('woocommerce_review_order_before_order_total'); ?>

<div class="body-registration__bottom">
	<div class="body-registration__all"><?php esc_html_e('Total', 'woocommerce'); ?>
		<?php wc_cart_totals_order_total_html(); ?></div>
</div>

<?php do_action('woocommerce_review_order_after_order_total'); ?>