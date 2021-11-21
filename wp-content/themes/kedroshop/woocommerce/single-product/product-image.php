<?php

/**
 * Single Product Image
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/product-image.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.5.1
 */

defined('ABSPATH') || exit;

// Note: `wc_get_gallery_image_html` was added in WC 3.3.2 and did not exist prior. This check protects against theme overrides being used on older versions of WC.
if (!function_exists('wc_get_gallery_image_html')) {
	return;
}

global $product;

$columns           = apply_filters('woocommerce_product_thumbnails_columns', 4);
$post_thumbnail_id = $product->get_image_id();
$wrapper_classes   = apply_filters(
	'woocommerce_single_product_image_gallery_class',
	array(
		'woocommerce-product-gallery',
		'woocommerce-product-gallery--' . ($post_thumbnail_id ? 'with-images' : 'without-images'),
		'woocommerce-product-gallery--columns-' . absint($columns),
		'images',
	)
);
if ($post_thumbnail_id) {
	// $html = wc_get_gallery_image_html($post_thumbnail_id, true);
	$html = my_custom_img_function( $post_thumbnail_id, true );
} else {
	$html = sprintf('<div class="pillow__image "><img src="%s" alt="%s" class="pillow__image wp-post-image" /></div>', esc_url(wc_placeholder_img_src('woocommerce_single')), esc_html__('Awaiting product image', 'woocommerce'));
}

//$html = sprintf('<div class="pillow__image "><img src="%s" alt="%s" class="wp-post-image" /></div>', esc_url(wp_get_attachment_url($product->get_image_id())), esc_html__($product->get_title(), 'woocommerce'));

?>

<div class="pillow__column mw768 <?php echo esc_attr(implode(' ', array_map('sanitize_html_class', $wrapper_classes))); ?>" id="post-slider" data-columns="<?php echo esc_attr($columns); ?>" style="opacity: 0; transition: opacity .25s ease-in-out;">
	<div class="pillow__img ">
		<?php
		echo apply_filters('woocommerce_single_product_image_thumbnail_html', $html, $post_thumbnail_id); // phpcs:disable WordPress.XSS.EscapeOutput.OutputNotEscaped
		?>
	</div>
	<div class="pillow__imeges">
		<?php
		do_action('woocommerce_product_thumbnails');
		?>
	</div>
</div>

<div class="mxw768">
    <div class="swiper mySwiper">
		<div class="swiper-wrapper">

		</div>
		<div class="swiper-pagination"></div>
    </div>
</div>

<script>
		if(/Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent)) {
		    let src, srcImage;
		    let blockImages = document.querySelector("div.pillow__column.woocommerce-product-gallery.woocommerce-product-gallery--with-images.woocommerce-product-gallery--columns-4.images");

		    blockImages.querySelectorAll("img").forEach(elem => {
			    srcImage = elem.dataset.src;
			    if(!srcImage)
			    	return;

			    if(!srcImage.includes('-300') && !srcImage.includes('x300')) {
				    $('.swiper-wrapper').append('<div class="swiper-slide"><img src="' + srcImage + '" alt=""></div>');
				    return
			    }

			    var arr = srcImage.split('-');
			    var arr2 = arr[arr.length-1].split('.');
			    arr2.shift();
			    arr.pop();

			    arr = arr.join('-');
			    arr2 = arr2.join('.');
			    src = arr + '.' + arr2;

			    if(src && src !== 'https://kedroshop.ru/wp-content/uploads/2021/09/hb-hc.png.webp')
				    $('.swiper-wrapper').append('<div class="swiper-slide"><img src="' + src + '" alt=""></div>');

			});
	  
		
	    	$(document).ready(function() {
		      var swiper = new Swiper(".mySwiper", {
		        pagination: {
		          el: ".swiper-pagination",
		        },
		      });
	    	})
	    }
    </script>