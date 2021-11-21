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
 * 
 * Template Name: Полезные статьи
 * Template Post Type: post
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


		<div class="agreement">
			<div class="agreement__container _container articles_plus">
				<?php
				while (have_posts()) :
					the_post();

						get_template_part('template-parts/content', 'articles');

				endwhile; // End of the loop.
				?>
			</div>
		</div>

	<?php
	//блок подписки
	include(get_template_directory() . '/inc/subscribe_bar.php'); ?>


</div><!-- #main -->

<?php
//get_sidebar();
get_footer();
