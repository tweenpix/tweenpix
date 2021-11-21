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
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.6.0
 */

defined('ABSPATH') || exit;

global $product;

// Ensure visibility.
if (empty($product) || !$product->is_visible()) {
	return;
}

if(is_product_category() or is_shop() or is_page( array(7761,7766,7754,8419) )){
	$logic_1='content-novelty__item';
}
else{
	$logic_1='';
}

?>

<div <?php wc_product_class('slider-hits__slide hits-slide '.$logic_1, $product); ?>>
	<?php
	/**
	 * Hook: woocommerce_before_shop_loop_item.
	 *
	 * @hooked woocommerce_template_loop_product_link_open - 10
	 */
	do_action('woocommerce_before_shop_loop_item');
	global $post, $product;

?>
<?php if ( $product->is_on_sale() ) : ?>
	<?php echo apply_filters( 'woocommerce_sale_flash', '<div class="ribbon ribbon-top-right"><span>' . esc_html__( 'Sale!', 'woocommerce' ) . '</span></div>', $post, $product ); ?>

	<?php
endif;
	?>
	<div class="hits-slide__labels">
		<?php echo do_shortcode('[ti_wishlists_addtowishlist product_id="' . $product->get_id() . '" loop="yes"]'); ?>
	</div>


	<a href="<?php the_permalink(); ?>" class="hits-slide__img"><img src="<?php echo wp_get_attachment_image_url($product->get_image_id(),'medium'); ?>" alt="<?php echo the_title('', ''); ?>" /></a>
	<div class="hits-slide__title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></div>
	<div class="hits-slide__bottom slide-bottom">
		<div class="slide-bottom__column">
			<div class="hits-slide__subtitle"><?php echo wp_trim_words($product->get_description(), 10, '&hellip;'); ?></div>
			<div class="hits-slide__price"><?php echo $product->get_price_html(); ?></div>
		</div>
		<div class="slide-bottom__column">
			<a href="/?add-to-cart=<?php echo $product->get_id(); ?>" data-quantity="1" data-product_id="<?php echo $product->get_id(); ?>" class="slide-bottom__basket add_to_cart_button ajax_add_to_cart">
			<img src="<?php bloginfo('template_url'); ?>/img/cart.svg" alt="">
			</a>
		</div>
	</div>


	<?php
	// /**
	//  * Hook: woocommerce_before_shop_loop_item_title.
	//  *
	//  * @hooked woocommerce_show_product_loop_sale_flash - 10
	//  * @hooked woocommerce_template_loop_product_thumbnail - 10
	//  */
	// do_action( 'woocommerce_before_shop_loop_item_title' );

	// /**
	//  * Hook: woocommerce_shop_loop_item_title.
	//  *
	//  * @hooked woocommerce_template_loop_product_title - 10
	//  */
	// do_action( 'woocommerce_shop_loop_item_title' );

	// /**
	//  * Hook: woocommerce_after_shop_loop_item_title.
	//  *
	//  * @hooked woocommerce_template_loop_rating - 5
	//  * @hooked woocommerce_template_loop_price - 10
	//  */
	// do_action( 'woocommerce_after_shop_loop_item_title' );

	// /**
	//  * Hook: woocommerce_after_shop_loop_item.
	//  *
	//  * @hooked woocommerce_template_loop_product_link_close - 5
	//  * @hooked woocommerce_template_loop_add_to_cart - 10
	//  */
	// do_action( 'woocommerce_after_shop_loop_item' );
	?>
</div>