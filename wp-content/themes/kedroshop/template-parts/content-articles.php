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
	<div class="agreement__title">
		<?php the_title('<h1 class="title">', '</h1>'); ?>
	</div><!-- .entry-header -->

	<div class="about__text">
		<?php
		the_content();
		?>
	</div><!-- .agreement__body -->
</article><!-- #post-<?php the_ID(); ?> -->
<?php if ( is_active_sidebar( 'true_side' ) ) : ?>
    
    <div id="true-side" class="sidebar_right">

        <?php dynamic_sidebar( 'true_side' ); ?>

    </div>

 <?php endif; ?>