<?php

/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package kedroshop
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="<?php if(!is_cart()){
		echo 'agreement__title';
	}
	else{
		echo 'basket__title';
	}
	?>">
		<?php the_title('<h1 class="title">', '</h1>'); ?>
	</div><!-- .entry-header -->

	<div class="about__text">
		<?php
		the_content();
		// If comments are open or we have at least one comment, load up the comment template.
		// if ( comments_open() || get_comments_number() ) :
		// 	comments_template();
		// endif;
		// echo '<!--comments-->';
		// 	echo do_shortcode( '[anycomment]' );

		// wp_link_pages(
		// 	array(
		// 		'before' => '<div class="page-links">' . esc_html__('Pages:', 'kedroshop'),
		// 		'after'  => '</div>',
		// 	)
		// );
		?>
	</div><!-- .agreement__body -->


</article><!-- #post-<?php the_ID(); ?> -->