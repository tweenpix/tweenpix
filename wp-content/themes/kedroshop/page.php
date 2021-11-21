<?php

/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package kedroshop
 */

get_header();
?>


<style>.brr{margin-bottom: 20px;}</style>
<div class="page">
	<div class="page__container _container">
		<div class="page__content content-page page__content_about">
			<?php
			//включаем строку поиска + иконки корзины итд
			include(get_template_directory() . '/inc/header-row.php');
			?>
		</div>
	</div>
	<?php
	if (has_post_thumbnail()) {
		$thumb = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID('full')), 'page-header');
		$url = $thumb[0]; ?>
		<div class="main-bg">
			<div class="main-bg__img _ibg" id="page-header">
				<img src="<?php echo $url; ?>" alt="<?php the_title_attribute('echo=0'); ?>">
			</div>
		</div>
	<? }	?>
	<?php
	//хлебные крошки
	include(get_template_directory() . '/inc/breadcrumb.php'); ?>



	<?php
	//если это корзина то показываем блок для корзины
	if (is_cart()) {
	?>
		<div class="basket">
			<div class="basket__container _container">
				<?php
				while (have_posts()) :
					the_post();

					get_template_part('template-parts/content', 'page');

				endwhile; // End of the loop.
				?>
			</div>
		</div>


	<?php
	} else {
	?>

		<div class="agreement">
			<div class="agreement__container _container">
				<?php
				while (have_posts()) :
					the_post();
					if ( is_tag( 119 ) ) { //ID категории
						get_template_part('template-parts/content', 'articles');

					}
					else{
					get_template_part('template-parts/content', 'page');
					}
				endwhile; // End of the loop.
				?>
			</div>
		</div>

	<?php

	} ?>
	<?php
	//блок подписки
	include(get_template_directory() . '/inc/subscribe_bar.php'); ?>


</div><!-- #main -->

<?php
//get_sidebar();
get_footer();
