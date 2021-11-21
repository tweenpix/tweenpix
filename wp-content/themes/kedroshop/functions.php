<?php

/**
 * kedroshop functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package kedroshop
 */



 if (!defined('_S_VERSION')) {
	// Replace the version number of the theme on each release.
	define('_S_VERSION', '1.0.0');
}

// if(function_exists('aws_get_search_form')){aws_get_search_form( true );}


add_filter( 'allowed_http_origins', 'add_allowed_origins' );
function add_allowed_origins( $origins ) {
    $origins[] = 'https://kedroshop.ru';
    return $origins;
}


function remove_output_structured_data()
{
	remove_action('wp_footer', array(WC()->structured_data, 'output_structured_data'), 10); // Frontend pages
	remove_action('woocommerce_email_order_details', array(WC()->structured_data, 'output_email_structured_data'), 30); // Emails
}

add_action('init', 'remove_output_structured_data');

// $GLOBALS['woocommerce'] = wc();

if (!function_exists('kedroshop_setup')) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function kedroshop_setup()
	{
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on kedroshop, use a find and replace
		 * to change 'kedroshop' to the name of your theme in all the template files.
		 */
		load_theme_textdomain('kedroshop', get_template_directory() . '/languages');

		// Add default posts and comments RSS feed links to head.
		add_theme_support('automatic-feed-links');

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support('title-tag');

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support('post-thumbnails');

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus(
			array(
				'menu-1' => esc_html__('Primary', 'kedroshop'),
			)
		);

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support(
			'html5',
			array(
				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
				'style',
				'script',
			)
		);

		// Set up the WordPress core custom background feature.
		add_theme_support(
			'custom-background',
			apply_filters(
				'kedroshop_custom_background_args',
				array(
					'default-color' => 'ffffff',
					'default-image' => '',
				)
			)
		);

		// Add theme support for selective refresh for widgets.
		add_theme_support('customize-selective-refresh-widgets');

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support(
			'custom-logo',
			array(
				'height'      => 250,
				'width'       => 250,
				'flex-width'  => true,
				'flex-height' => true,
			)
		);
	}
endif;
add_action('after_setup_theme', 'kedroshop_setup');

function add_menu_link_class($atts, $item, $args)
{
	if (property_exists($args, 'link_class')) {
		$atts['class'] = $args->link_class;
	}
	return $atts;
}
add_filter('nav_menu_link_attributes', 'add_menu_link_class', 1, 3);
function add_menu_list_item_class($classes, $item, $args)
{
	if (property_exists($args, 'list_item_class')) {
		$classes[] = $args->list_item_class;
	}
	return $classes;
}
add_filter('nav_menu_css_class', 'add_menu_list_item_class', 1, 3);


/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function kedroshop_content_width()
{
	$GLOBALS['content_width'] = apply_filters('kedroshop_content_width', 640);
}
add_action('after_setup_theme', 'kedroshop_content_width', 0);

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function kedroshop_widgets_init()
{
	register_sidebar(
		array(
			'name'          => esc_html__('Sidebar', 'kedroshop'),
			'id'            => 'sidebar-1',
			'description'   => esc_html__('Add widgets here.', 'kedroshop'),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action('widgets_init', 'kedroshop_widgets_init');
// remove_filter( 'the_content', 'wpautop' );
// remove_filter( 'the_excerpt', 'wpautop' );

function my_deregister_scripts()
{
	wp_dequeue_script('wp-embed');
	//wp_dequeue_style( 'berocket_lmp_style' );
	wp_dequeue_style('tinvwl-webfont-font');
}
add_action('wp_footer', 'my_deregister_scripts');

add_filter('woocommerce_add_to_cart_fragments', 'header_add_to_cart_fragment', 30, 1);
function header_add_to_cart_fragment($fragments)
{
	global $woocommerce;
	$fragments['.count_cart'] = '<span class="count_cart">' . $woocommerce->cart->cart_contents_count . '</span>';
	return $fragments;
}
/**
 * Enqueue scripts and styles.
 */
function kedroshop_scripts()
{
	//wp_enqueue_style( 'kedroshop-style', get_stylesheet_uri(), array(), null );
	// wp_style_add_data( 'kedroshop-style', 'rtl', 'replace' );
	wp_enqueue_style('kedroshop-apexweb-style', get_template_directory_uri() . '/css/apexweb-style.css', array(), 'z30');
	wp_enqueue_style('kedroshop-style', get_template_directory_uri() . '/css/style.css', array(), 'z30');
	wp_enqueue_style('kedroshop-style-woo', get_template_directory_uri() . '/woocommerce.css', array(), null);
	// wp_enqueue_style('kedroshop-style-swiper', 'https://unpkg.com/swiper/swiper-bundle.min.css', array(), null);
	
	wp_deregister_style('berocket_lmp_style');
	wp_deregister_script('jquery');
	wp_register_script('jquery', get_template_directory_uri() . '/js/jquery-3.3.1.min.js', array(), null, false);
	wp_enqueue_script('jquery');
	// wp_localize_script('kedroshop-ajax-update-cart', 'ajax_object', array('ajax_url' => admin_url( 'admin-ajax.php' )));
	wp_enqueue_script('kedroshop-vendors', get_template_directory_uri() . '/js/vendors.js', array('jquery'), null, true);
	wp_enqueue_script('kedroshop-swiper', get_template_directory_uri() . '/js/swiper-bundle.min.js', array('jquery','kedroshop-vendors'), null, true);

	wp_enqueue_script('kedroshop-app', get_template_directory_uri() . '/js/app.js', array('jquery', 'kedroshop-vendors','kedroshop-swiper'), null, true);
	wp_enqueue_script('kedroshop-navigation', get_template_directory_uri() . '/js/navigation.js', array(), null, true);
	wp_enqueue_script('kedroshop-ajax-update-cart', get_template_directory_uri() . '/js/script.js', array('jquery'), 'z28', true);
	// wp_enqueue_script('kedroshop-modal', get_template_directory_uri() . '/js/jquery.modal.min.js', array('jquery'), null, true);
	if (is_singular() && comments_open() && get_option('thread_comments')) {
		wp_enqueue_script('comment-reply');
	}
}
add_action('wp_enqueue_scripts', 'kedroshop_scripts');
add_filter('woocommerce_product_variation_title_include_attributes', '__return_false');
add_filter('woocommerce_is_attribute_in_product_name', '__return_false');



/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if (defined('JETPACK__VERSION')) {
	require get_template_directory() . '/inc/jetpack.php';
}

/**
 * Load WooCommerce compatibility file.
 */
if (class_exists('WooCommerce')) {
	require get_template_directory() . '/inc/woocommerce.php';
	add_theme_support('woocommerce');
}

if(get_current_user_id()!=18){
	add_filter('show_admin_bar', '__return_false');
	}


add_filter('woocommerce_structured_data_product', 'woocommerce_structured_data_product_mod', 10, 2);
function woocommerce_structured_data_product_mod($markup, $product)
{
	$markup['@id'] = $product->name;
	return $markup;
}

//add_action('wp_footer', 'ava_product_schema_markup');
function ava_product_schema_markup()
{


	global $post, $product;


	if ($product && is_object($product) && is_product()) {

		$shop_name       = get_bloginfo('name');
		$shop_url        = home_url();
		$currency        = get_woocommerce_currency();
		$markup          = array();
		$markup['@type'] = 'Product';
		$markup['@id']   = get_permalink($product->get_id());
		$markup['url']   = $markup['@id'];
		$markup['name']  = $product->get_name();

		if (apply_filters('woocommerce_structured_data_product_limit', is_product_taxonomy() || is_shop())) {
			WC_Structured_Data::set_data(apply_filters('woocommerce_structured_data_product_limited', $markup, $product));
			return;
		}

		$markup_offer = array(
			'@type'         => 'Offer',
			'priceCurrency' => $currency,
			'availability'  => 'http://schema.org/' . $stock = ($product->is_in_stock() ? 'InStock' : 'OutOfStock'),
			'sku'           => $product->get_sku(),
			'image'         => wp_get_attachment_url($product->get_image_id()),
			'description'   => $product->get_description(),
			'seller'        => array(
				'@type' => 'Organization',
				'name'  => $shop_name,
				'url'   => $shop_url,
			),
		);

		if ($product->is_type('variable')) {
			$prices = $product->get_variation_prices();

			$markup_offer['priceSpecification'] = array(
				'price'         => wc_format_decimal($product->get_price(), wc_get_price_decimals()),
				'minPrice'      => wc_format_decimal(current($prices['price']), wc_get_price_decimals()),
				'maxPrice'      => wc_format_decimal(end($prices['price']), wc_get_price_decimals()),
				'priceCurrency' => $currency,
			);
		} else {
			$markup_offer['price']    = wc_format_decimal($product->get_price(), wc_get_price_decimals());
		}

		$markup['offers'] = array(apply_filters('woocommerce_structured_data_product_offer', $markup_offer, $product));

		if ($product->get_rating_count()) {
			$markup['aggregateRating'] = array(
				'@type'       => 'AggregateRating',
				'ratingValue' => $product->get_average_rating(),
				'ratingCount' => $product->get_rating_count(),
				'reviewCount' => $product->get_review_count(),
			);
		}

		if (is_singular('product')) {
			echo '<!--say hello--><script type="application/ld+json">' . wp_json_encode($markup) . '</script>';
		} else {
			echo '<!--say nothing-->';
		}
	}
}

remove_action('wp_head', 'wp_generator');

function remove_query_strings()
{
	if (!is_admin()) {
		add_filter('script_loader_src', 'remove_query_strings_split', 15);
		add_filter('style_loader_src', 'remove_query_strings_split', 15);
	}
}

// function remove_query_strings_split($src)
// {
// 	$output = preg_split("/(&ver|\?ver)/", $src);
// 	return $output[0];
// }

// add_action('init', 'remove_query_strings');

//remove_filter ( 'berocket_lmp_button_style', array($this, 'lmp_button_style'), 10, 3 );

function wpb_wiz_after_theme_setup()
{
	remove_theme_support('wc-product-gallery-slider');
}
add_action('after_setup_theme', 'wpb_wiz_after_theme_setup', 99);

function remove_added_to_cart_notice()
{

	$notices = WC()->session->get('wc_notices', array());

	if (isset($notice)) {

		foreach ($notices['success'] as $key => &$notice) {
			if (strpos($notice, 'has been added') !== false) {
				$added_to_cart_key = $key;
				break;
			}
		}
		unset($notices['success'][$added_to_cart_key]);

		WC()->session->set('wc_notices', $notices);
	}
}
add_action('woocommerce_before_single_product', 'remove_added_to_cart_notice', 1);
add_action('woocommerce_shortcode_before_product_cat_loop', 'remove_added_to_cart_notice', 1);
add_action('woocommerce_before_shop_loop', 'remove_added_to_cart_notice', 1);

add_filter('upload_mimes', 'svg_upload_allow');

# Добавляет SVG в список разрешенных для загрузки файлов.
function svg_upload_allow($mimes)
{
	$mimes['svg']  = 'image/svg+xml';
	$mimes['svg']  = 'image/webp';

	return $mimes;
}

/**
 * overwritten from https://woocommerce.wp-a2z.org/oik_api/wc_get_gallery_image_html/
 */
function my_custom_img_function($attachment_id, $main_image = false)
{
	$flexslider        = (bool) apply_filters('woocommerce_single_product_flexslider_enabled', get_theme_support('wc-product-gallery-slider'));
	$gallery_thumbnail = wc_get_image_size('large');
	$thumbnail_size    = apply_filters('woocommerce_gallery_thumbnail_size', array($gallery_thumbnail['width'], $gallery_thumbnail['height']));
	$image_size        = apply_filters('woocommerce_gallery_image_size', $flexslider || $main_image ? 'woocommerce_single' : $thumbnail_size);
	$full_size         = apply_filters('woocommerce_gallery_full_size', apply_filters('woocommerce_product_thumbnails_large_size', 'full'));
	$thumbnail_src     = wp_get_attachment_image_src($attachment_id, $thumbnail_size);
	$full_src          = wp_get_attachment_image_src($attachment_id, $full_size);
	$alt_text          = trim(wp_strip_all_tags(get_post_meta($attachment_id, '_wp_attachment_image_alt', true)));
	$image             = wp_get_attachment_image(
		$attachment_id,
		'large',
		false,
		apply_filters(
			'woocommerce_gallery_image_html_attachment_image_params',
			array(
				'title'                   => _wp_specialchars(get_post_field('post_title', $attachment_id), ENT_QUOTES, 'UTF-8', true),
				'data-caption'            => _wp_specialchars(get_post_field('post_excerpt', $attachment_id), ENT_QUOTES, 'UTF-8', true),
				'data-src'                => esc_url($full_src[0]),
				'data-large_image'        => esc_url($full_src[0]),
				'data-large_image_width'  => esc_attr($full_src[1]),
				'data-large_image_height' => esc_attr($full_src[2]),
				'class'                   => esc_attr($main_image ? 'wp-post-image' : ''),
			),
			$attachment_id,
			$image_size,
			$main_image
		)
	);

	return '<div data-thumb="' . esc_url($thumbnail_src[0]) . '" data-thumb-alt="' . esc_attr($alt_text) . '" class="woocommerce-product-gallery__image"><a data-lightbox="Gallery" rel="lightbox" href="' . esc_url($full_src[0]) . '">' . $image . '</a></div>';
}

//cdek widget

// function sdek_script()
// {
// 	echo '<script id="ISDEKscript" src="https://kedroshop.ru/widget/widjet.min.js" charset="utf-8" data-no-optimize="1"></script>';
// }
// add_action('wp_head', 'sdek_script');

// add_shortcode('cdekmap', 'cdek_widget_apexweb');

// function cdek_widget_apexweb()
// {
// 	if (is_page()) {
// 		return "
// 	<script data-no-optimize=\"1\">
//     var widjet = new ISDEKWidjet({
//         defaultCity: 'auto',
//         cityFrom: 'Москва',
// 		choose: true,
//         popup: true,
//         link: 'forpvz',
//         path: 'https://kedroshop.ru/widget/scripts/',
//         servicepath: 'https://kedroshop.ru/widget/scripts/service.php'
//     });
// 	</script>
// 	<div id=\"forpvz\" style=\"width:100%; height:50vh;\"></div>
// ";
// 	}
// }


add_filter( 'loop_shop_per_page', 'new_loop_shop_per_page', 20 );

function new_loop_shop_per_page( $cols ) {
  // $cols contains the current number of products per page based on the value stored on Options -> Reading
  // Return the number of products you wanna show per page.
  $cols = 50;
  return $cols;
}

add_filter( 'woocommerce_checkout_fields' , 'custom_override_checkout_fields' );
  
function custom_override_checkout_fields( $fields ) {
  unset($fields['billing']['billing_country']);  //удаляем! тут хранится значение страны оплаты
  unset($fields['shipping']['shipping_country']); ////удаляем! тут хранится значение страны доставки
  unset($fields['billing']['billing_address_1']);
  unset($fields['billing']['billing_state']);
//   unset($fields['billing']['billing_postcode']);
  return $fields;
}

## Удаляет "Рубрика: ", "Метка: " и т.д. из заголовка архива
add_filter( 'get_the_archive_title', function( $title ){
	return preg_replace('~^[^:]+: ~', '', $title );
});

add_filter( 'wp_lazy_loading_enabled', '__return_false' );

/**
 * @snippet       Remove Zoom, Gallery @ Single Product Page
 * @how-to        Get CustomizeWoo.com FREE
 * @author        Rodolfo Melogli
 * @testedwith    WooCommerce 3.8
 * @donate $9     https://businessbloomer.com/bloomer-armada/
 */
  
add_action( 'wp', 'bbloomer_remove_zoom_lightbox_theme_support', 99 );
  
function bbloomer_remove_zoom_lightbox_theme_support() { 
   remove_theme_support( 'wc-product-gallery-zoom' );
   remove_theme_support( 'wc-product-gallery-lightbox' );
   remove_theme_support( 'wc-product-gallery-slider' );
}



add_action( 'wp_head', 'apexweb_head_optimizer');

function apexweb_head_optimizer(){
	echo '<link rel="preload" href="'.get_template_directory_uri() . '/js/swiper-bundle.min.js" as="script">';
	// echo '<link rel="preload" href="https://kedroshop.ru/wp-content/plugins/anycomment/static/js/main.min.js" as="script">';
}


add_action( 'wp_print_styles', 'my_deregister_styles', 100 );


function my_deregister_styles() {
	if(is_front_page(  )){
	
	//wp_dequeue_style( 'contact-form-7' );
	wp_dequeue_style( 'anycomment-styles' );
	wp_dequeue_style( 'woo-hide-shipping-methods' );
	wp_dequeue_style( 'woo-shipping-display-mode' );
	wp_dequeue_style( 'wp-pagenavi' );
	wp_dequeue_style( 'woo-variation-swatches-inline' );
	wp_dequeue_style( 'woo-variation-swatches-theme-override' );
	wp_dequeue_style( 'woo-variation-swatches-tooltip' );
	wp_dequeue_style( 'select2' );
	wp_dequeue_style( 'woovr-frontend');
	wp_dequeue_style( 'wp-block-library');
	wp_dequeue_style( 'wc-block-vendors-style ');
	wp_dequeue_style( 'wc-block-style');
	wp_dequeue_style( 'responsive-lightbox-swipebox');
	wp_dequeue_style( 'toc-screen');
	// wp_dequeue_style("tinvwl");
	wp_dequeue_style( 'wc-blocks-style');

	//wp_dequeue_script( 'contact-form-7' );
	wp_dequeue_script( 'anycomment-js-bundle' );
	wp_dequeue_script( 'woo-variation-swatches');
	wp_dequeue_script( 'ddslick');
	wp_dequeue_script( 'select2');
	wp_dequeue_script( 'woovr-frontend');
	wp_dequeue_script( 'jquery-actual');
	wp_dequeue_script( 'woo-variation-swatches');
	wp_dequeue_script( 'woo-hide-shipping-methods' );
	wp_dequeue_script( 'woo-shipping-display-mode');
	wp_dequeue_script( 'responsive-lightbox-infinite-scroll');
	wp_dequeue_script( 'responsive-lightbox-swipebox');
	wp_dequeue_script( 'responsive-lightbox');
	wp_dequeue_script( 'toc-front');
	wp_dequeue_script( 'jquery-blockui');

	
	//wp_add_inline_script( $handle:string, $data:string, $position:string )
	//wp_enqueue_script('jquery');



	}
}


add_action(
    'wp_enqueue_scripts',
    function() {
        // Если это НЕ страницы магазина.
        if ( ! is_woocommerce() && ! is_cart() && ! is_checkout() ) {
            // Отключаем стили магазина.
            wp_dequeue_style( 'woocommerce_frontend_styles' );
            wp_dequeue_style( 'woocommerce-general');
            wp_dequeue_style( 'woocommerce-layout' );
            wp_dequeue_style( 'woocommerce-smallscreen' );
            wp_dequeue_style( 'woocommerce_fancybox_styles' );
            wp_dequeue_style( 'woocommerce_chosen_styles' );
            wp_dequeue_style( 'woocommerce_prettyPhoto_css' );
            wp_dequeue_style( 'select2' );
             
            // Отключаем скрипты магазина.
            wp_dequeue_script( 'wc-add-payment-method' );
            wp_dequeue_script( 'wc-lost-password' );
            wp_dequeue_script( 'wc_price_slider' );
            wp_dequeue_script( 'wc-single-product' );
            //wp_dequeue_script( 'wc-add-to-cart' );
            //wp_dequeue_script( 'wc-cart-fragments' );
            wp_dequeue_script( 'wc-credit-card-form' );
            wp_dequeue_script( 'wc-checkout' );
            //wp_dequeue_script( 'wc-add-to-cart-variation' );
            wp_dequeue_script( 'wc-single-product' );
            wp_dequeue_script( 'wc-cart' ); 
            wp_dequeue_script( 'wc-chosen' );
            wp_dequeue_script( 'woocommerce' );
            wp_dequeue_script( 'prettyPhoto' );
            wp_dequeue_script( 'prettyPhoto-init' );
            wp_dequeue_script( 'jquery-blockui' );
            wp_dequeue_script( 'jquery-placeholder' );
            wp_dequeue_script( 'jquery-payment' );
            wp_dequeue_script( 'jqueryui' );
            wp_dequeue_script( 'fancybox' );
            wp_dequeue_script( 'wcqi-js' );

			wp_dequeue_script( 'selectWoo' );
			wp_dequeue_script( 'wc-country-select');
			wp_dequeue_script( 'woosb-frontend');

        }
    },
    99
);

//скрываем товары с нулевой ценой
add_filter( 'woocommerce_product_query_meta_query', 'shop_only_instock_products', 10, 2 );
function shop_only_instock_products( $meta_query, $query ) {
    // In frontend only
    if( is_admin() ) return $meta_query;

    $meta_query['relation'] = 'OR';

    $meta_query[] = array(
        'key'     => '_price',
        'value'   => '',
        'type'    => 'numeric',
        'compare' => '!='
    );
    $meta_query[] = array(
        'key'     => '_price',
        'value'   => 0,
        'type'    => 'numeric',
        'compare' => '!='
    );
    return $meta_query;
}

add_action( 'woocommerce_cart_coupon', 'custom_woocommerce_empty_cart_button' );
function custom_woocommerce_empty_cart_button() {
	echo '<a href="' . esc_url( add_query_arg( 'empty_cart', 'yes' ) ) . '" class="button" title="' . esc_attr( 'Очистить корзину', 'woocommerce' ) . '">' . esc_html( 'Очистить корзину', 'woocommerce' ) . '</a>';
}

add_action( 'wp_loaded', 'custom_woocommerce_empty_cart_action', 20 );
function custom_woocommerce_empty_cart_action() {
	if ( isset( $_GET['empty_cart'] ) && 'yes' === esc_html( $_GET['empty_cart'] ) ) {
		WC()->cart->empty_cart();

		$referer  = wp_get_referer() ? esc_url( remove_query_arg( 'empty_cart' ) ) : wc_get_cart_url();
		wp_safe_redirect( $referer );
	}
}

function tb_delete_remove_product_notice(){
	$notices = WC()->session->get( 'wc_notices', array() );
	if(isset($notices['success'])){
		for($i = 0; $i < count($notices['success']); $i++){
			if (strpos($notices['success'][$i], __('removed','woocommerce')) !== false) {
				array_splice($notices['success'],$i,1);
			}
		}
		WC()->session->set( 'wc_notices', $notices['success'] );
	}
}

add_action( 'woocommerce_before_shop_loop', 'tb_delete_remove_product_notice', 5 );
add_action( 'woocommerce_shortcode_before_product_cat_loop', 'tb_delete_remove_product_notice', 5 );
add_action( 'woocommerce_before_single_product', 'tb_delete_remove_product_notice', 5 );

add_filter( 'woocommerce_account_menu_items', 'custom_remove_downloads_my_account', 999 );
 
function custom_remove_downloads_my_account( $items ) {
unset($items['downloads']);
return $items;
}



// add custom endpoint for My Account menu
add_filter ( 'woocommerce_account_menu_items', 'wptips_customize_account_menu_items' );
function wptips_customize_account_menu_items( $menu_items ){
     // Add new Custom URL in My Account Menu 
    $new_menu_item = array('affiliate'=>'Сотрудничество');  // Define a new array with cutom URL slug and menu label text
    $new_menu_item_position=2; // Define Position at which the New URL has to be inserted
    
    array_splice( $menu_items, ($new_menu_item_position-1), 0, $new_menu_item );
    return $menu_items;
}

// point the endpoint to a custom URL
add_filter( 'woocommerce_get_endpoint_url', 'wptips_custom_woo_endpoint', 10, 2 );
function wptips_custom_woo_endpoint( $url, $endpoint ){
     if( $endpoint == 'affiliate' ) {
        $url = get_permalink(8814); // Your custom URL to add to the My Account menu
    }
    return $url;
}

add_action('woocommerce_archive_description', 'custom_archive_description', 2 );
function custom_archive_description(){
    if( is_product_category() ) :
        remove_action('woocommerce_archive_description', 'woocommerce_taxonomy_archive_description', 10 );
        add_action( 'woocommerce_after_main_content', 'woocommerce_taxonomy_archive_description', 5 );
    endif;
}


function true_register_wp_sidebars() {
 
	/* В боковой колонке - первый сайдбар */
	register_sidebar(
		array(
			'id' => 'true_side', // уникальный id
			'name' => 'Боковая колонка', // название сайдбара
			'description' => 'Перетащите сюда виджеты, чтобы добавить их в сайдбар.', // описание
			'before_widget' => '<div id="%1$s" class="side widget %2$s">', // по умолчанию виджеты выводятся <li>-списком
			'after_widget' => '</div>',
			'before_title' => '<h3 class="widget-title">', // по умолчанию заголовки виджетов в <h2>
			'after_title' => '</h3>'
		)
	);

}
 
add_action( 'widgets_init', 'true_register_wp_sidebars' );




add_shortcode('featured_products_widget','featured_products_widget_func');
function featured_products_widget_func(){
	ob_start();
	load_template(get_template_directory() . '/inc/featured.php');
    $content = ob_get_clean();
    return $content;
}


//задаем шаблон для записей из рубрики полезные статьи


 
/**
* Filter the single_template with our custom function
*/
add_filter('single_template', 'my_single_template');
 
/**
* Single template function which will choose our template
*/
function my_single_template($single) {
global $wp_query, $post;
 
/**
* Checks for single template by category
* Check by category slug and ID
*/
foreach((array)get_the_category() as $cat) :
 
if(file_exists(TEMPLATEPATH . '/single-cat-' . $cat->slug . '.php'))
return TEMPLATEPATH . '/single-cat-' . $cat->slug . '.php';
 
elseif(file_exists(TEMPLATEPATH . '/single-cat-' . $cat->term_id . '.php'))
return TEMPLATEPATH . '/single-cat-' . $cat->term_id . '.php';
 
endforeach;
}