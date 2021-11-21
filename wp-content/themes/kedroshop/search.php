<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
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
		<div class="agreement__container _container">
		<?php if ( have_posts() ) : ?>

				<h1 class="title">
					<?php
					/* translators: %s: search query. */
					printf( esc_html__( 'Search Results for: %s', 'kedroshop' ), '<span>' . get_search_query() . '</span>' );
					?>
				</h1>
		
			<?php
			/* Start the Loop */
			while ( have_posts() ) :
				the_post();

				/**
				 * Run the loop for the search to output the results.
				 * If you want to overload this in a child theme then include a file
				 * called content-search.php and that will be used instead.
				 */
				get_template_part( 'template-parts/content', 'minireview' );

			endwhile;

			the_posts_navigation();

		else :

			get_template_part( 'template-parts/content', 'none' );

		endif;
		?>
		</div></div>
	<?php
	//блок подписки
	include(get_template_directory() . '/inc/subscribe_bar.php'); ?>
	</div><!-- #main -->

<?php
//get_sidebar();
get_footer();
