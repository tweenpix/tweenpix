<?php

/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
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

	<?php
	//хлебные крошки
	include(get_template_directory() . '/inc/breadcrumb.php'); ?>

	<div class="reviews">
		<div class="reviews__container _container">

			<?php if (have_posts()) : ?>


				<div class="reviews__title title">
					<?php
					the_archive_title('<h1 class="page-title">', '</h1>');
					//the_archive_description( '<div class="archive-description">', '</div>' );
					?>
				</div><!-- .page-header -->
				<div class="reviews__row">

					<?php
					/* Start the Loop */
					while (have_posts()) :
						the_post();

						/*
				 * Include the Post-Type-specific template for the content.
				 * If you want to override this in a child theme, then include a file
				 * called content-___.php (where ___ is the Post Type name) and that will be used instead.
				 */
						get_template_part('template-parts/content-minireview');

					endwhile;
					?>
				</div>

				<?php if ( is_active_sidebar( 'true_side' ) ) : ?>
 
				<div id="true-side" class="sidebar_right">

					<?php dynamic_sidebar( 'true_side' ); ?>

				</div>

				<?php endif; ?>

			<?php
				 wp_pagenavi();

			else :

				get_template_part('template-parts/content', 'none');

			endif;
			?>
		</div>
	</div>
	<?php
//включаем блок подписки
include(get_template_directory().'/inc/subscribe_bar.php');
?>
</div><!-- #main -->

<?php
// get_sidebar();
get_footer();
