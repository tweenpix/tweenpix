<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package kedroshop
 */

?>
<!--новости-->
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="agreement__title">
		<?php
		if ( is_singular() ) :
			the_title('<h1 class="title">', '</h1>');
		else :
			the_title( '<h2 class="title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
		endif;

		if ( 'post' === get_post_type() ) :
			?>
			<div class="entry-meta">
				<?php
				// kedroshop_posted_on();
				// kedroshop_posted_by();
				?>
			</div><!-- .entry-meta -->
		<?php endif; ?>
		</div><!-- .entry-header -->

	<div class="about__text">
		<?php
		the_content(
			sprintf(
				wp_kses(
					/* translators: %s: Name of current post. Only visible to screen readers */
					__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'kedroshop' ),
					array(
						'span' => array(
							'class' => array(),
						),
					)
				),
				wp_kses_post( get_the_title() )
			)
		);

		// wp_link_pages(
		// 	array(
		// 		'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'kedroshop' ),
		// 		'after'  => '</div>',
		// 	)
		// );
		?>
		<div class="nextprevlinks">
<?php


/**
 * Зацикленный вывод предыдущего и следующего поста в WordPress
 */
if( get_adjacent_post(false, '', true) ) {
	previous_post_link('%link', '← Предыдущий пост');
}
else {
	$first = new WP_Query('posts_per_page=1&order=DESC');
	$first->the_post();

	echo '<a href="' . get_permalink() . '">← Предыдущий пост</a>';

	wp_reset_postdata();
};

if( get_adjacent_post(false, '', false) ) {
	next_post_link('%link', 'Следующий пост →');
}
else {
	$last = new WP_Query('posts_per_page=1&order=ASC');
	$last->the_post();

	echo '<a href="' . get_permalink() . '">Следующий пост →</a>';

	wp_reset_postdata();
};
?>
		
		</div>
	</div><!-- .entry-content -->

	<!-- .entry-footer -->
</article><!-- #post-<?php the_ID(); ?> -->
<?php

		if ( comments_open() || get_comments_number() ) :
			comments_template();
		endif;
		$current_id = get_the_ID(); // Current post ID

echo do_shortcode( '[ajax_load_more id="6086986940" container_type="ul" post_type="post" images_loaded="true" placeholder="true" progress_bar="true" progress_bar_color="ed7070" post__not_in="'. $current_id .'"]' );