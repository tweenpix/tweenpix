<?php

/**
 * The Template for displaying product archives, including the main shop page which is a post type archive
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/archive-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.4.0
 */

defined('ABSPATH') || exit;

get_header('shop');

/**
 * Hook: woocommerce_before_main_content.
 *
 * @hooked woocommerce_output_content_wrapper - 10 (outputs opening divs for the content)
 * @hooked woocommerce_breadcrumb - 20
 * @hooked WC_Structured_Data::generate_website_data() - 30
 */
do_action('woocommerce_before_main_content');

?>


<div class="novelty">
				<div class="novelty__container _container">

					<?php
					if (false) { //is_product_category() or is_shop()
					?>
						<div class="novelty__adapt adapt-novelty">
							<div class="adapt-novelty__container _container">
								<div class="adapt-novelty__row">

									<?php
									$terms = get_terms('product_cat');
									if ($terms) {
										foreach ($terms as $term) {
											$class = (is_product_category($term->name)) ? ' _active' : ''; // assign this class if we're on the same category page as $term->name

											echo '<div class="adapt-novelty__item novelty-item' . $class . '">
		<div class="novelty-item__title">
		<a href="' .  esc_url(get_term_link($term)) . '">';
											echo $term->name;
											echo '</a></div>';
											echo '<div class="novelty-item__img"></div>';
											echo '</div>';
										}
									}

									?>

								</div>
							</div>
						</div>
					<?
					}
					?>


					<div class="novelty__body">

<aside class="novelty__side side-novelty">
	<div class="side-page__title side-novelty__title"><?php
														// $terms = get_terms('product_cat');
														// if ($terms) {
														// 	foreach ($terms as $term) {
														// 		echo is_product_category($term->name) ? $term->name : ''; // assign this class if we're on the same category page as $term->name
														// 	}
														// }
														// else{
														// 	echo 'Каталог';
														// }
			if (is_category( ) or is_product_category()){
				echo "<h1>".woocommerce_page_title(false)."</h1>";
			}
			else if(is_singular()){
				echo "<h1>".title()."</h1>";
			}
			else{
				echo "<h1>Каталог</h1>";
			}
														?>

	</div>
	
	<ul class="side-page__list side-novelty__list">
		<li class="side-novelty__body">
		<?php
			// <ul class="side-page__list">
			// <li><a href="#" class="side-page__link">Хиты продаж</a></li>
			// <li><a href="katalog-1.html" class="side-page__link _active">Новинки</a></li>
			// <li><a href="#" class="side-page__link">Скидки</a></li>
			// <li><a href="#" class="side-page__link">Носки</a></li>
			// <li><a href="#" class="side-page__link">Бандажи</a></li>
			// <li><a href="pillow.html" class="side-page__link">Подушки</a></li>
			// <li><a href="#" class="side-page__link">Стельки</a></li>
			// <li><a href="#" class="side-page__link">Масла</a></li>
			// </ul>
			//shop_menu меню
			wp_nav_menu([
				'menu'            => 'shop_menu',
				'container'       => '',
				'container_class' => '',
				'container_id'    => '',
				'menu_class'      => 'menu',
				'menu_id'         => '',
				'echo'            => true,
				'fallback_cb'     => 'wp_page_menu',
				'before'          => '',
				'after'           => '',
				'link_before'     => '',
				'link_after'      => '',
				'link_class'      => 'side-page__link',
				'list_item_class'  => '',
				'items_wrap'      => '<ul id="%1$s" class="side-page__list">%3$s</ul>',
				'depth'           => 0,
				'walker'          => '',
			]); ?>
		</li>
	</ul>
	<br><br>
	<?php echo do_shortcode('[premmerce_active_filters] '); ?>
	<?php echo do_shortcode('[premmerce_filter] '); ?>
</aside>
<div class="novelty__content content-novelty">
	<?php
	if (woocommerce_product_loop()) {

		/**
		 * Hook: woocommerce_before_shop_loop.
		 *
		 * @hooked woocommerce_output_all_notices - 10
		 * @hooked woocommerce_result_count - 20
		 * @hooked woocommerce_catalog_ordering - 30
		 */
		do_action('woocommerce_before_shop_loop');

		woocommerce_product_loop_start();

		if (wc_get_loop_prop('total')) {
			while (have_posts()) {
				the_post();

				/**
				 * Hook: woocommerce_shop_loop.
				 */
				do_action('woocommerce_shop_loop');

				wc_get_template_part('content', 'product');
			}
		}

		woocommerce_product_loop_end();

		/**
		 * Hook: woocommerce_after_shop_loop.
		 *
		 * @hooked woocommerce_pagination - 10
		 */
		do_action('woocommerce_after_shop_loop');
	} else {
		/**
		 * Hook: woocommerce_no_products_found.
		 *
		 * @hooked wc_no_products_found - 10
		 */
		do_action('woocommerce_no_products_found');
	}


if (!(preg_match("/attribute/i", $_SERVER['REQUEST_URI']))) {

		if ( is_tax( array( 'product_cat', 'product_tag' ) ) && 0 === absint( get_query_var( 'paged' )) ) {
			echo '<div class="arccat_description slider-hits__slide">';
			woocommerce_taxonomy_archive_description();
			echo '</div>';
			//echo single_cat_title('',false);
		}
	}


// 	global $post;
// $args  = array(
//     'taxonomy' => 'product_cat'
// );
// $terms = wp_get_post_terms($post->ID, 'product_cat', $args);

// $count = count($terms);
// if ($count > 0) {

//     foreach ($terms as $term) {
//         echo '<div class="arccat_description slider-hits__slide">';
//         echo $term->description;
//         echo '</div>';

//     }
// }
?>
</div>

</div>
				</div>
			</div>

<?php
/**
 * Hook: woocommerce_after_main_content.
 *
 * @hooked woocommerce_output_content_wrapper_end - 10 (outputs closing divs for the content)
 */
do_action('woocommerce_after_main_content');

/**
 * Hook: woocommerce_sidebar.
 *
 * @hooked woocommerce_get_sidebar - 10
 */
//do_action( 'woocommerce_sidebar' );

get_footer('shop');
