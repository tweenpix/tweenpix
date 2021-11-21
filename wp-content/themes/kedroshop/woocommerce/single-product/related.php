<?php

/**
 * Related Products
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/related.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see         https://docs.woocommerce.com/document/template-structure/
 * @package     WooCommerce\Templates
 * @version     3.9.0
 */

if (!defined('ABSPATH')) {
	exit;
}

if ($related_products) : ?>

	<div class="hits">
		<div class="hits__container _container">
			<div class="hits__top">
				<div class="hits__title title pillow__title-adapt">С этим товаром покупают</div>
				<div class="hits__title title hits__title_adapt pillow__title-adapt">С этим товаром покупают</div>
				<!-- <a href="#" class="hits__link">Смотреть все</a> -->

			</div>
			<div class="hits__slider slider-hits">
				<div class="slider-hits__body _swiper">
					<?php //woocommerce_product_loop_start(); 
					?>

					<?php foreach ($related_products as $related_product) : ?>

						<?php
						$post_object = get_post($related_product->get_id());

						setup_postdata($GLOBALS['post'] = &$post_object); // phpcs:ignore WordPress.WP.GlobalVariablesOverride.Prohibited, Squiz.PHP.DisallowMultipleAssignments.Found

						wc_get_template_part('content', 'product');
						?>

					<?php endforeach; ?>

					<?php //woocommerce_product_loop_end(); 
					?>
				</div>
				<div class="slider-hits__arrows hits-arrows">
					<div class="hits-arrows__arrow hits-arrows__arrow_prev"></div>
					<div class="hits-arrows__arrow hits-arrows__arrow_next"></div>
				</div>
			</div>

		</div>
	</div>
<?php
endif;

wp_reset_postdata();
