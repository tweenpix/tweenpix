<?php

/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
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
	if (has_post_thumbnail() && $post->post_type != 'wpm-testimonial') {
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
		<div class="agreement__container _container">
			<?php
			while (have_posts()) :
				the_post();
// echo '<!--';
// echo $post->post_type; // Outputs the slug of the post;
// echo '-->';
				get_template_part('template-parts/content', get_post_type());

			// the_post_navigation(
			// 	array(
			// 		'prev_text' => '<span class="nav-subtitle">' . esc_html__('Previous:', 'kedroshop') . '</span> <span class="nav-title">%title</span>',
			// 		'next_text' => '<span class="nav-subtitle">' . esc_html__('Next:', 'kedroshop') . '</span> <span class="nav-title">%title</span>',
			// 	)
			// );

			// If comments are open or we have at least one comment, load up the comment template.
			// if (comments_open() || get_comments_number()) :
			// 	comments_template();
			// endif;

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
