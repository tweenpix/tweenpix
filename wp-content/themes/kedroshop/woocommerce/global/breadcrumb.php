<?php
/**
 * Shop breadcrumb
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/global/breadcrumb.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see         https://docs.woocommerce.com/document/template-structure/
 * @package     WooCommerce\Templates
 * @version     2.3.0
 * @see         woocommerce_breadcrumb()
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

// if ( ! empty( $breadcrumb ) ) {

// 	echo $wrap_before;
// 	echo '<div class="bredcrums__item" itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">';

// 	foreach ( $breadcrumb as $key => $crumb ) {

// 		echo $before;

// 		if ( ! empty( $crumb[1] ) && sizeof( $breadcrumb ) !== $key + 1 ) {
// 			echo '<a class="bredcrums__link" href="' . esc_url( $crumb[1] ) . '" itemprop="item"><span itemprop="name">' . esc_html( $crumb[0] ) . '</span></a>';
// 			echo '<meta itemprop="position" content="'.($key+1).'" />';
// 		} else {
// 			echo esc_html( $crumb[0] );
// 		}

// 		echo $after;

// 		if ( sizeof( $breadcrumb ) !== $key + 1 ) {
// 			echo $delimiter;
// 		}
// 	}
// 	echo '</div>';
// 	echo $wrap_after;

// }
