<?php

/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package kedroshop
 */

?>


<div class="<?php if (!is_cart()) {
				echo 'agreement__title';
			} else {
				echo 'basket__title';
			}
			?>">
	<?php the_title('<h1 class="title">', '</h1>'); ?>
</div><!-- .entry-header -->

<?php
the_content();
