<?php

/**
 * The Template for displaying product archives, including the main shop page which is a post type archive
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/archive-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.4.0
 */

defined('ABSPATH') || exit;

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
    <? }    ?>
    <?php
    //хлебные крошки
    include(get_template_directory() . '/inc/breadcrumb.php'); ?>



    <div class="novelty">
        <div class="novelty__container _container">

            <?php
            if (is_product_category() or is_shop()) {
            ?>
                <div class="novelty__adapt adapt-novelty">
                    <div class="adapt-novelty__container _container">
                        <div class="adapt-novelty__row">

                            <?php
                            $terms = get_terms('product_cat');
                            if ($terms) {
                                foreach ($terms as $term) {
                                    $class = (is_product_category($term->name)) ? ' _active' : ''; // assign this class if we're on the same category page as $term->name

                                    echo '<div class="adapt-novelty__item novelty-item' . $class . '">
		<div class="novelty-item__title">
		<a href="' .  esc_url(get_term_link($term)) . '">';
                                    echo $term->name;
                                    echo '</a></div>';
                                    echo '<div class="novelty-item__img"></div>';
                                    echo '</div>';
                                }
                            }

                            ?>

                        </div>
                    </div>
                </div>
            <?
            }
            ?>


            <div class="novelty__body">

                <aside class="novelty__side side-novelty">
                    <div class="side-page__title side-novelty__title"><?php

                                                                        $terms = get_terms('product_cat');
                                                                        if ($terms) {
                                                                            foreach ($terms as $term) {
                                                                                echo is_product_category($term->name) ? $term->name : ''; // assign this class if we're on the same category page as $term->name
                                                                            }
                                                                        } else {
                                                                            echo 'Каталог';
                                                                        }
                                                                        ?>

                    </div>
                    <ul class="side-page__list side-novelty__list">
                        <li class="side-novelty__body">
                            <?php
                            // <ul class="side-page__list">
                            // <li><a href="#" class="side-page__link">Хиты продаж</a></li>
                            // <li><a href="katalog-1.html" class="side-page__link _active">Новинки</a></li>
                            // <li><a href="#" class="side-page__link">Скидки</a></li>
                            // <li><a href="#" class="side-page__link">Носки</a></li>
                            // <li><a href="#" class="side-page__link">Бандажи</a></li>
                            // <li><a href="pillow.html" class="side-page__link">Подушки</a></li>
                            // <li><a href="#" class="side-page__link">Стельки</a></li>
                            // <li><a href="#" class="side-page__link">Масла</a></li>
                            // </ul>
                            //shop_menu меню
                            wp_nav_menu([
                                'menu'            => 'shop_menu',
                                'container'       => '',
                                'container_class' => '',
                                'container_id'    => '',
                                'menu_class'      => 'menu',
                                'menu_id'         => '',
                                'echo'            => true,
                                'fallback_cb'     => 'wp_page_menu',
                                'before'          => '',
                                'after'           => '',
                                'link_before'     => '',
                                'link_after'      => '',
                                'link_class'      => 'side-page__link',
                                'list_item_class'  => '',
                                'items_wrap'      => '<ul id="%1$s" class="side-page__list">%3$s</ul>',
                                'depth'           => 0,
                                'walker'          => '',
                            ]); ?>
                        </li>
                    </ul>
                </aside>
                <div class="novelty__content content-novelty">
                            <?php
                            while (have_posts()) :
                                the_post();

                                get_template_part('template-parts/content', 'shop-part');

                            endwhile; // End of the loop.
                            ?>
                </div>

            </div>
        </div>
    </div>

    <?php
    //блок подписки
    include(get_template_directory() . '/inc/subscribe_bar.php'); ?>


</div><!-- #main -->

<?php
//get_sidebar();
get_footer();
