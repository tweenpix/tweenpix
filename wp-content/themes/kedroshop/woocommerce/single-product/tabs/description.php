<?php
/**
 * Description tab
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/tabs/description.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 2.0.0
 */

defined( 'ABSPATH' ) || exit;

global $post, $product;

$heading = apply_filters( 'woocommerce_product_description_heading', __( 'Description', 'woocommerce' ) );

?>

<?php if ( $heading ) : ?>
	<h2><?php echo esc_html( $heading ); ?></h2>
<?php endif;
$terms = array('Арома стики','Стельки из Ливанского кедра');
// echo $product->get_id();
if( has_term( $terms, 'product_cat') ){
	echo '<div class="woocommerce-info"><p>Внимание! Бесплатная доставка!</p>
	<p>Москва и МО: бесплатная доставка товара при заказе от 2000₽ в пункт приема "Сдэк".
	Регионы: бесплатная доставка товара при заказе от 3000₽ в пункт приема "Сдэк".</p></div>';
}
?>

<?php the_content(); ?>
