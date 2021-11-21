<?php

/**
 * The Template for displaying dropdown wishlist products.
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/ti-wishlist-product-counter.php.
 *
 * @version             1.9.0
 * @package           TInvWishlist\Template
 */

if (!defined('ABSPATH')) {
	exit; // Exit if accessed directly.
}
wp_enqueue_script('tinvwl');
if ($icon_class && 'custom' === $icon && !empty($icon_upload)) {
	$text = sprintf('<img src="%s" /> %s', esc_url($icon_upload), $text);
}
?>
<a  href="<?php echo esc_url(tinv_url_wishlist_default()); ?>" class="page-top__icon page-top__icon_fav page-top__icon_adapt">
	
<?php if ( $show_counter ) : ?>
	<div class="page-top__label wishlist_products_counter_number"></div>
<?php endif; ?>


	<picture>
		<source srcset="<?php bloginfo('template_url'); ?>/img/favorite.webp" type="image/webp"><img src="<?php bloginfo('template_url'); ?>/img/favorite.png" alt="">
	</picture>
	
</a>