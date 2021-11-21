<?php

/**
 * The template for displaying product content in the single-product.php template
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-single-product.php.
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
 */

defined('ABSPATH') || exit;

global $product;

/**
 * Hook: woocommerce_before_single_product.
 *
 * @hooked woocommerce_output_all_notices - 10
 */
do_action('woocommerce_before_single_product');

if (post_password_required()) {
	echo get_the_password_form(); // WPCS: XSS ok.
	return;
}
?>


	<style>.hits-slide__labels {top: -70px;right: 50px}</style>
	<div id="product-<?php the_ID(); ?>" <?php wc_product_class('pillow', $product); ?>>
		<div class="pillow__container _container">
			<div class="pillow__row">
				<?php do_action('woocommerce_before_single_product_summary'); ?>
							<div class="availability-pillow__item" style="position: relative;">
								<div class="hits-slide__labels">
									<?php echo do_shortcode('[ti_wishlists_addtowishlist product_id="' . $product->get_id() . '" loop="yes"]'); ?>
								</div>
							</div>
				<div class="pillow__column pillow__column_big">
					<div class="body-pillow__title title"><?php woocommerce_template_single_title(); ?></div>
					<div class="pillow__body body-pillow">
						<div class="body-pillow__availability availability-pillow">
							<?php
							if ($product->is_in_stock()) { ?>
								<div class="availability-pillow__item">
									<span>Есть в наличии</span>
								</div>
							<?php
							} else {
							?>
								<div class="notavailability-pillow__item">
									<span>Скоро поступление</span>
								</div>
							<?php
							}
							?>

						</div>
						<div class="pillow__price"><?php woocommerce_template_single_price(); ?>
						</div>
						<!-- <div class="pillow__ariticle">Артикул: <span><?php //echo $product->get_sku(); ?></span></div> -->
						<div class="pillow__quntity quntity-pillow">
								<?php woocommerce_template_single_add_to_cart(); ?>
						</div>
						<?php
						echo "<!--tabs begin-->";
						woocommerce_output_product_data_tabs();
						woocommerce_template_single_rating();
						echo "<!--tabs end-->";
						?>
					</div>
				</div>
			</div>
		</div>
	</div>

	<?php
	/**
	 * Hook: woocommerce_after_single_product_summary.
	 *
	 * @hooked woocommerce_output_product_data_tabs - 10
	 * @hooked woocommerce_upsell_display - 15
	 * @hooked woocommerce_output_related_products - 20
	 */
	//do_action('woocommerce_after_single_product_summary');
	?>

					<?php
					echo '<!--related products begin-->';
					woocommerce_output_related_products();
					echo '<!--related products end-->';
					// $WC_Structured_Data = new WC_Structured_Data();
					// echo $WC_Structured_Data->get_structured_data( 'product' );?>