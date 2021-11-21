<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package kedroshop
 */

get_header();
?>

<div class="page">
	<div class="page__container _container">
		<div class="page__content content-page page__content_about">
			<?php
			//включаем строку поиска + иконки корзины итд
			include(get_template_directory() . '/inc/header-row.php');
			?>
		</div>
	</div>
			<div class="error">
				<div class="error__body">
					<div class="error__img"><picture><source srcset="<?php bloginfo('template_url'); ?>/img/404.webp" type="image/webp"><img src="<?php bloginfo('template_url'); ?>/img/404.png" alt=""></picture></div>
					<div class="error__title">Страница не найдена</div>
					<div class="error__subtitle">Все в порядке, просто вернитесь на главную и попробуйте снова:)</div>
					<a href="/" class="error__btn btn">На главную</a>
				</div>
			</div>
</div><!-- #main -->


<?php
get_footer();
