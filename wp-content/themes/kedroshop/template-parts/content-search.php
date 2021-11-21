<?php

/**
 * Template part for displaying results in search pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package kedroshop
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="about__title title">
		<?php the_title(sprintf('<h2><a href="%s" rel="bookmark">', esc_url(get_permalink())), '</a></h2>'); ?>
	</div><!-- .entry-header -->

	<div class="about__text">

		<?php kedroshop_post_thumbnail(); ?>

		<div class="entry-summary about__text">
			<?php the_excerpt(); ?>
		</div><!-- .entry-summary -->
	</div>
	<!-- <div class="entry-footer delivery__title">
		<?php kedroshop_entry_footer(); ?>
	</div> -->
</article><!-- #post-<?php the_ID(); ?> -->