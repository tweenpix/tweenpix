


<?php
 
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package kedroshop
 */
 
get_header();
?>
<?php
echo '<!--'.$id.'-->';
?>
<div  class="page">
    <?php echo do_shortcode('[ivory-search id="11212"]'); ?><br>
 
    <div class="page__container _container">
        <!-- ASIDE data-da=".header__body,767.98,0" -->
        <aside data-da=".header__body,767.98,0" class="page__side side-page mw768">
            <div class="side-page__title">Каталог товаров</div>
            <?php
            // <ul class="side-page__list">
            // <li><a href="#" class="side-page__link">Хиты продаж</a></li>
            // <li><a href="/shop/" class="side-page__link _active">Новинки</a></li>
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
                'items_wrap'      => '<ul class="side-page__list">%3$s</ul>',
                // id="burger_mobile"
                'depth'           => 3,
                'walker'          => '',
            ]); ?>
            <!-- <div class="submenu"></div> -->
            <!-- <div class="subsubmenu"></div> -->
        </aside>
        <style>
            /* @media (min-width: 767.99px) {
                .is-search-form {
                    display: none;
                }
            }
            .is-search-form {
                margin: 25px 0 -40px 0;
                padding: 0 15px!important;
            }
            .page__menu-category {
                left: 390px;
                top: 220px;
                width: 70%;
                max-width: 990px;
            } */

        </style>
        <script>
            $(document).ready(function () {
                $('.page__menu-category').css('top', $('.side-page__list')[1].offsetTop + 'px');
                $('.page__menu-category').css('left', $('.side-page__list')[1].offsetLeft + $('.side-page__list')[1].offsetWidth + 20 + 'px');
            })
        </script>
        <div class="page__menu-category" id="category-list"></div>
        
        <div class="page__content content-page">
            <?php
            //включаем строку поиска + иконки корзины итд
            include(get_template_directory() . '/inc/header-row.php');
            ?>
                    <div class="content-page__slider page-slider">
 
                        <?php
            echo do_shortcode('[smartslider3 slider="6"]');
            ?> 
 
                    </div>
 
 
        </div>
    </div>
</div>
 
<div class="hits">
    <div class="hits__container _container">
        <div class="hits__top">
            <div class="hits__title title">Хиты продаж</div>
            <div class="hits__title_adapt">Хиты продаж</div>
 
            <a href="<?php echo get_permalink(7754); ?>" class="hits__link">Смотреть все</a>
 
        </div>
 
 
 
        <div class="hits__slider slider-hits">
            <div class="slider-hits__body _swiper">
                <?php
                $args = array(
                    'post_type' => 'product',
                    'meta_key' => 'total_sales',
                    'orderby' => 'meta_value_num',
                    'posts_per_page' => 12,
                );

                
                $loop = new WP_Query($args);
                while ($loop->have_posts()) : $loop->the_post();
                    global $product;
                    if ($product->get_id() != 6927 && $product->get_id() != 6931) { //указываем 6931 - id товара для исключения из показа
                ?>
 
                        <div class="slider-hits__slide hits-slide">
                            <?php if ($product->is_on_sale()) : ?>
                                <?php echo apply_filters('woocommerce_sale_flash', '<div class="ribbon ribbon-top-right"><span>' . esc_html__('Sale!', 'woocommerce') . '</span></div>', $post, $product); ?>
 
                            <?php
                            endif;
                            ?>
                            <div class="hits-slide__labels">
                                <?php echo do_shortcode('[ti_wishlists_addtowishlist product_id="' . $product->get_id() . '" loop="yes"]'); ?>
                            </div>
                            <a href="<?php the_permalink(); ?>" class="hits-slide__img"><img src="<?php echo wp_get_attachment_image_url($product->get_image_id(), 'medium'); ?>" alt="<?php echo the_title('', ''); ?>" /></a>
                            <div class="hits-slide__title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></div>
                            <div class="hits-slide__bottom slide-bottom">
                                <div class="slide-bottom__column">
                                    <div class="hits-slide__subtitle"><?php echo wp_trim_words($product->get_description(), 10, '&hellip;'); ?></div>
                                    <div class="hits-slide__price"><?php echo $product->get_price_html(); ?></div>
                                </div>
                                <div class="slide-bottom__column">
                                    <a href="/?add-to-cart=<?php echo $product->get_id(); ?>" data-quantity="1" data-product_id="<?php echo $product->get_id(); ?>" class="slide-bottom__basket add_to_cart_button ajax_add_to_cart">
                                        <img src="<?php bloginfo('template_url'); ?>/img/cart.svg" alt="Корзина">
                                    </a>
                                </div>
                            </div>
                        </div>
                <?php
                    }
                endwhile;
                wp_reset_query(); ?>
            </div>
 
            <div class="slider-hits__arrows hits-arrows">
                <div class="hits-arrows__arrow hits-arrows__arrow_prev"></div>
                <div class="hits-arrows__arrow hits-arrows__arrow_next"></div>
            </div>
        </div>
    </div>
</div>
 
 
<?php
//cat menu links
$stel = get_term_link(121, 'product_cat'); //стельки
$bandage = get_term_link(145, 'product_cat'); //бандажи
$deo = get_term_link(153, 'product_cat'); //деонаты
$socks = get_term_link(146, 'product_cat'); //носки
$pillows = get_term_link(147, 'product_cat'); //подушки
$oil = get_term_link(156, 'product_cat'); //масла
$cosmetic = get_term_link(202, 'product_cat'); //косметика
$dom = get_term_link(197, 'product_cat'); //дом
$wear = get_term_link(201, 'product_cat'); //косметика
$masks = get_term_link(203, 'product_cat'); //косметика
$toys = get_term_link(204, 'product_cat'); //косметика
$bundle = get_term_link(205, 'product_cat'); //косметика


?>
 
<div class="categories">
    <div class="categories__container _container">
        <div class="categories__title title"><a href="<?php echo get_permalink(woocommerce_get_page_id('shop')); ?>">Категория товаров</a></div>
        <div class="categories__body ">
            <div class="categories__top top-categories">
                <div class="top-categories__row">
                    <div class="top-categories__column">
                        <div class="top-categories__body">
                            <div class="top-categories__item categories-item">
                                <a href="<?php echo $stel ?>" class="categories-item__img">
                                    <picture>
                                        <source srcset="<?php bloginfo('template_url'); ?>/img/categories/01.webp" type="image/webp"><img src="<?php bloginfo('template_url'); ?>/img/categories/01.png" alt="Стельки из Ливанского кедра">
                                    </picture>
                                </a>
                                <a href="<?php echo $stel; ?>" class="categories-item__link">Стельки из Ливанского кедра</a>
                            </div>
                        </div>
                    </div>
                    <div class="top-categories__column">
                        <div class="top-categories__body">
                            <div class="top-categories__item categories-item categories-item_left">
                                <a href="<?php echo $bandage ?>" class="categories-item__img">
                                    <picture>
                                        <source srcset="<?php bloginfo('template_url'); ?>/img/categories/02.webp" type="image/webp"><img src="<?php bloginfo('template_url'); ?>/img/categories/02.png" alt="Бандажи">
                                    </picture>
                                </a>
                                <a href="<?php echo $bandage ?>" class="categories-item__link">Бандажи</a>
                            </div>
                        </div>
                    </div>
                    <div class="top-categories__column">
                        <div class="top-categories__body">
 
                            <div class="top-categories__item categories-item">
                                <a href="<?php echo $deo ?>" class="categories-item__img">
                                    <picture>
                                        <source srcset="<?php bloginfo('template_url'); ?>/img/categories/03.webp" type="image/webp"><img src="<?php bloginfo('template_url'); ?>/img/categories/03.png" alt="Экодезодоранты">
                                    </picture>
                                </a>
                                <a href="<?php echo $deo; ?>" class="categories-item__link">Экодезодоранты</a>
                            </div>
                        </div>
 
                    </div>
                </div>
            </div>
            <div class="categories__bottom bottom-categories">
                <div class="bottom-categories__row">
                    <div class="bottom-categories__column bottom-categories__column_small">
                        <div class="top-categories__body">
                            <div class="bottom-categories__item categories-item ">
                                <a href="<?php echo $socks; ?>" class="categories-item__img">
                                    <picture>
                                        <source srcset="<?php bloginfo('template_url'); ?>/img/categories/04.webp" type="image/webp"><img src="<?php bloginfo('template_url'); ?>/img/categories/04.png" alt="Антибактериальные носки">
                                    </picture>
                                </a>
                                <a href="<?php echo $socks; ?>" class="categories-item__link">Антибактериальные носки</a>
                            </div>
                        </div>
                    </div>
                    <div class="bottom-categories__column bottom-categories__column_big">
                        <div class="top-categories__body">
                            <div class="bottom-categories__item categories-item bottom-categories__item_big">
                                <a href="<?php echo $pillows; ?>" class="categories-item__img">
                                    <picture>
                                        <source srcset="<?php bloginfo('template_url'); ?>/img/categories/05.webp" type="image/webp"><img src="<?php bloginfo('template_url'); ?>/img/categories/05.png" alt="Подушки с кедровыми наполнителями">
                                    </picture>
                                </a>
                                <a href="<?php echo $pillows ?>" class="categories-item__link">Подушки с кедровыми наполнителями</a>
                            </div>
                        </div>
 
                    </div>
                    <div class="bottom-categories__column">
                        <div class="top-categories__body">
                            <div class="bottom-categories__item categories-item">
                                <a href="<?php echo $oil; ?>" class="categories-item__img">
                                    <picture>
                                        <source srcset="<?php bloginfo('template_url'); ?>/img/categories/06.webp" type="image/webp"><img src="<?php bloginfo('template_url'); ?>/img/categories/06.png" alt="Экомыло">
                                    </picture>
                                </a>
                                <a href="<?php echo $oil; ?>" class="categories-item__link">Экомыло</a>
                            </div>
                        </div>
 
                    </div>
                </div>
            </div>
 
 
<!-- categories row-->
 
<div class="categories__top top-categories" style="margin-top: 20px;">
                <div class="top-categories__row">
                    <div class="top-categories__column">
                        <div class="top-categories__body">
                            <div class="top-categories__item categories-item">
                                <a href="<?php echo $cosmetic ?>" class="categories-item__img">
                                <img src="<?php bloginfo('template_url'); ?>/img/categories/cosmetic.webp" width="290"  alt="Косметика">
                                </a>
                                <a href="<?php echo $cosmetic; ?>" class="categories-item__link">Косметика</a>
                            </div>
                        </div>
                    </div>
                    <div class="top-categories__column">
                        <div class="top-categories__body">
                            <div class="top-categories__item categories-item categories-item_left">
                                <a href="<?php echo $dom ?>" class="categories-item__img">
                                <img src="<?php bloginfo('template_url'); ?>/img/categories/for_home.webp" width="350"  alt="Дом">
                                </a>
                                <a href="<?php echo $dom ?>" class="categories-item__link">Дом</a>
                            </div>
                        </div>
                    </div>
                    <div class="top-categories__column">
                        <div class="top-categories__body">
 
                            <div class="top-categories__item categories-item">
                                <a href="<?php echo $wear ?>" class="categories-item__img">
                                <img src="<?php bloginfo('template_url'); ?>/img/categories/wear.webp" width="290"  alt="Одежда и обувь">
                                </a>
                                <a href="<?php echo $wear; ?>" class="categories-item__link">Одежда и обувь</a>
                            </div>
                        </div>
 
                    </div>
                </div>
            </div>
            <div class="categories__bottom bottom-categories">
                <div class="bottom-categories__row">
                    <div class="bottom-categories__column bottom-categories__column_small">
                        <div class="top-categories__body">
                            <div class="bottom-categories__item categories-item ">
                                <a href="<?php echo $masks; ?>" class="categories-item__img">
                                <img src="<?php bloginfo('template_url'); ?>/img/categories/mask.webp" width="230" alt="Гигиенические маски">
                                </a>
                                <a href="<?php echo $masks; ?>" class="categories-item__link">Гигиенические маски</a>
                            </div>
                        </div>
                    </div>
                    <div class="bottom-categories__column bottom-categories__column_big">
                        <div class="top-categories__body">
                            <div class="bottom-categories__item categories-item bottom-categories__item_big">
                                <a href="<?php echo $toys; ?>" class="categories-item__img">
                                <img src="<?php bloginfo('template_url'); ?>/img/categories/decor.webp" width="400" alt="Мелочи жизни">
                                </a>
                                <a href="<?php echo $toys ?>" class="categories-item__link">Мелочи жизни</a>
                            </div>
                        </div>
 
                    </div>
                    <div class="bottom-categories__column">
                        <div class="top-categories__body">
                            <div class="bottom-categories__item categories-item">
                                <a href="<?php echo $bundle; ?>" class="categories-item__img"><img src="<?php bloginfo('template_url'); ?>/img/categories/bundle.webp" width="350" alt="Подарочные наборы"></a>
                                <a href="<?php echo $bundle; ?>" class="categories-item__link">Подарочные наборы</a>
                            </div>
                        </div>
 
                    </div>
                </div>
            </div>
 
<!-- /categories row-->
 
        </div>
        <div class="articles-adapt__row articles-adapt-row">
            <div class="articles-adapt-row__small">
                <a href="<?php echo $bandage; ?>" class="articles-adapt__column articles-adapt__column_small">
                    <div class="articles-adapt__item">
                        <div class="articles-adapt__img _ibg">
                            <picture>
                                <source srcset="<?php bloginfo('template_url'); ?>/img/categories-adapt/01.webp" type="image/webp"><img src="<?php bloginfo('template_url'); ?>/img/categories-adapt/01.jpg" alt="">
                            </picture>
                        </div>
 
                    </div>
                    <div class="articles-adapt__text categories-adapt_text">Бандажи</div>
                </a>
                <a href="<?php echo $oil; ?>" class="articles-adapt__column articles-adapt__column_small">
                    <div class="articles-adapt__item">
                        <div class="articles-adapt__img _ibg">
                            <picture>
                                <source srcset="<?php bloginfo('template_url'); ?>/img/categories-adapt/02.webp" type="image/webp"><img src="<?php bloginfo('template_url'); ?>/img/categories-adapt/02.jpg" alt="">
                            </picture>
                        </div>
 
                    </div>
                    <div class="articles-adapt__text categories-adapt_text">Экомыло</div>
                </a>
            </div>
            <div class="articles-adapt-row__full ">
                <a href="<?php echo $pillows; ?>" class="articles-adapt__column">
                    <div class="articles-adapt__item articles-adapt__item_big">
                        <div class="articles-adapt__img _ibg">
                            <picture>
                                <source srcset="<?php bloginfo('template_url'); ?>/img/categories-adapt/03.webp" type="image/webp"><img src="<?php bloginfo('template_url'); ?>/img/categories-adapt/03.jpg" alt="">
                            </picture>
                        </div>
 
                    </div>
                    <div class="articles-adapt__text categories-adapt_text">Подушки с кедровыми наполнителями</div>
                </a>
            </div>
            <div class="articles-adapt-row__small">
                <a href="<?php echo $socks; ?>" class="articles-adapt__column articles-adapt__column_small">
                    <div class="articles-adapt__item ">
                        <div class="articles-adapt__img _ibg ">
                            <picture>
                                <source srcset="<?php bloginfo('template_url'); ?>/img/categories-adapt/04.webp" type="image/webp"><img src="<?php bloginfo('template_url'); ?>/img/categories-adapt/04.jpg" alt="">
                            </picture>
                        </div>
                        <div class="categories-adapt_img">
                            <picture>
                                <source srcset="<?php bloginfo('template_url'); ?>/img/categories-adapt/11.webp" type="image/webp"><img src="<?php bloginfo('template_url'); ?>/img/categories-adapt/11.png" alt="">
                            </picture>
                        </div>
 
                    </div>
                    <div class="articles-adapt__text categories-adapt_text">Антибактериальные носки</div>
                </a>
                <a href="<?php echo $deo; ?>" class="articles-adapt__column articles-adapt__column_small">
                    <div class="articles-adapt__item">
                        <div class="articles-adapt__img _ibg ">
                            <picture>
                                <source srcset="<?php bloginfo('template_url'); ?>/img/categories-adapt/05.webp" type="image/webp"><img src="<?php bloginfo('template_url'); ?>/img/categories-adapt/05.jpg" alt="">
                            </picture>
                        </div>
 
                    </div>
                    <div class="articles-adapt__text">Экодезодоранты</div>
                </a>
            </div>
            <div class="articles-adapt-row__full ">
                <a href="<?php echo $stel; ?>" class="articles-adapt__column">
                    <div class="articles-adapt__item articles-adapt__item_big">
                        <div class="articles-adapt__img _ibg ">
                            <picture>
                                <source srcset="<?php bloginfo('template_url'); ?>/img/categories-adapt/06.webp" type="image/webp"><img src="<?php bloginfo('template_url'); ?>/img/categories-adapt/06.jpg" alt="">
                            </picture>
                        </div>
                        <div class="categories-adapt_img">
                            <picture>
                                <source srcset="<?php bloginfo('template_url'); ?>/img/categories-adapt/12.webp" type="image/webp"><img src="<?php bloginfo('template_url'); ?>/img/categories-adapt/12.png" alt="">
                            </picture>
                        </div>
                    </div>
                    <div class="articles-adapt__text ">Стельки из Ливанского кедра</div>
                </a>
            </div>
        </div>
 
 
<!-- categories adapt row-->
<div class="articles-adapt__row articles-adapt-row">
            <div class="articles-adapt-row__small">
                <a href="<?php echo $cosmetic; ?>" class="articles-adapt__column articles-adapt__column_small">
                    <div class="articles-adapt__item">
                        <div class="articles-adapt__img _ibg">
                        <img src="<?php bloginfo('template_url'); ?>/img/categories/cosmetic.webp" alt="Косметика">
                        </div>
 
                    </div>
                    <div class="articles-adapt__text categories-adapt_text">Косметика</div>
                </a>
                <a href="<?php echo $dom; ?>" class="articles-adapt__column articles-adapt__column_small">
                    <div class="articles-adapt__item">
                        <div class="articles-adapt__img _ibg">
                        <img src="<?php bloginfo('template_url'); ?>/img/categories/for_home.webp" alt="Дом">
                        </div>
 
                    </div>
                    <div class="articles-adapt__text categories-adapt_text">Дом</div>
                </a>
            </div>
            <div class="articles-adapt-row__full ">
                <a href="<?php echo $wear; ?>" class="articles-adapt__column">
                    <div class="articles-adapt__item articles-adapt__item_big">
                        <div class="articles-adapt__img _ibg">
                        <img src="<?php bloginfo('template_url'); ?>/img/categories/wear.webp"  alt="Одежда и обувь">
 
                        </div>
 
                    </div>
                    <div class="articles-adapt__text categories-adapt_text">Одежда и обувь</div>
                </a>
            </div>
            <div class="articles-adapt-row__small">
                <a href="<?php echo $masks; ?>" class="articles-adapt__column articles-adapt__column_small">
                    <div class="articles-adapt__item ">
 
                        <div class="categories-adapt_img">
                        <img src="<?php bloginfo('template_url'); ?>/img/categories/mask.webp" alt="Гигиенические маски">
 
                        </div>
 
                    </div>
                    <div class="articles-adapt__text categories-adapt_text">Гигиенические маски</div>
                </a>
                <a href="<?php echo $toys; ?>" class="articles-adapt__column articles-adapt__column_small">
                    <div class="articles-adapt__item">
                        <div class="articles-adapt__img _ibg ">
                        <img src="<?php bloginfo('template_url'); ?>/img/categories/decor.webp" alt="Мелочи жизни">
                        </div>
 
                    </div>
                    <div class="articles-adapt__text">Мелочи жизни</div>
                </a>
            </div>
            <div class="articles-adapt-row__full "><a href="<?php echo $bundle; ?>" class="articles-adapt__column"><div class="articles-adapt__item articles-adapt__item_big"><div class="categories-adapt_img"><img src="<?php bloginfo('template_url'); ?>/img/categories/bundle.webp" alt="Подарочные наборы">
</div></div><div class="articles-adapt__text ">Подарочные наборы</div></a></div>
        </div>
<!-- /categories adapt row-->
 
 
 
    </div>
</div>
<div class="categories" style="margin-top: 50px;">
    <div class="categories__container _container">
        <div class="categories__title title"><a href="<?php echo get_permalink(7152); ?>">Отзывы</a></div>
        <div class="categories__body" style="display: block !important;">
                <?php echo do_shortcode('[testimonial_view id="2"]');?>
            </div>
        </div>
    </div>
</div>
 
<?php
$meta_query  = WC()->query->get_meta_query();
$tax_query   = WC()->query->get_tax_query();

$tax_query[] = array(
    'taxonomy' => 'product_visibility',
    'field'    => 'name',
    'terms'    => 'featured',
    'operator' => 'IN',
);
 
// $args = array(
//  'post_type'           => 'product',
//  'post_status'         => 'publish',
//  'ignore_sticky_posts' => 1,
//  // 'posts_per_page'      => $atts['per_page'],
//  // 'orderby'             => $atts['orderby'],
//  // 'order'               => $atts['order'],
//  'meta_query'          => $meta_query,
//  'tax_query'           => $tax_query,
// );
 
$query_args = array(
    'posts_per_page'    => 8,
    'no_found_rows'     => 1,
    'post_status'       => 'publish',
    'post_type'         => 'product',
    'meta_query'        => WC()->query->get_meta_query(),
    'post__in'          => array_merge(array(0), wc_get_product_ids_on_sale())
);
$loop = new WP_Query($query_args);
 
 
//$loop = new WP_Query($args);
if ($loop->have_posts()) {
?>
 
    <div class="hits">
        <div class="hits__container _container">
            <div class="hits__top">
                <div class="hits__title title">Скидки</div>
                <div class="hits__title_adapt">Скидки</div>
 
                <a href="<?php echo get_permalink(7766); ?>" class="hits__link">Смотреть все</a>
 
            </div>
            <div class="hits__slider slider-hits">
                <div class="slider-hits__body _swiper">
                    <?php
 
                    while ($loop->have_posts()) : $loop->the_post();
                        global $product; ?>
                        <div class="slider-hits__slide hits-slide">
                            <?php if ($product->is_on_sale()) : ?>
                                <?php echo apply_filters('woocommerce_sale_flash', '<div class="ribbon ribbon-top-right"><span>' . esc_html__('Sale!', 'woocommerce') . '</span></div>', $post, $product); ?>
 
                            <?php
                            endif;
                            ?>
                            <div class="hits-slide__labels">
                                <?php echo do_shortcode('[ti_wishlists_addtowishlist product_id="' . $product->get_id() . '" loop="yes"]'); ?>
                            </div>
                            <a href="<?php the_permalink(); ?>" class="hits-slide__img"><img src="<?php echo wp_get_attachment_image_url($product->get_image_id(), 'medium'); ?>" alt="<?php echo the_title('', ''); ?>" /></a>
                            <div class="hits-slide__title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></div>
                            <div class="hits-slide__bottom slide-bottom">
                                <div class="slide-bottom__column">
                                    <div class="hits-slide__subtitle"><?php echo wp_trim_words($product->get_description(), 10, '&hellip;'); ?></div>
                                    <div class="hits-slide__price"><?php echo $product->get_price_html(); ?></div>
                                </div>
                                <div class="slide-bottom__column">
                                    <a href="/?add-to-cart=<?php echo $product->get_id(); ?>" data-quantity="1" data-product_id="<?php echo $product->get_id(); ?>" class="slide-bottom__basket add_to_cart_button ajax_add_to_cart">
                                        <img src="<?php bloginfo('template_url'); ?>/img/cart.svg" alt="Корзина">
                                    </a>
                                </div>
                            </div>
                        </div>
                    <?php endwhile; ?>
                </div>
 
                <div class="slider-hits__arrows hits-arrows">
                    <div class="hits-arrows__arrow hits-arrows__arrow_prev"></div>
                    <div class="hits-arrows__arrow hits-arrows__arrow_next"></div>
                </div>
            </div>
        </div>
    </div>
<?php
    wp_reset_query();
} else {
    echo '<hr style="margin-bottom:50px; border-color:#fff">';
}
?>
 
 
<div class="articles ">
    <div class="articles__container _container">
 
        <?php
        //get latest post from cat id 119
        $args = array(
            'posts_per_page' => 7, // we need only the latest post, so get that post only
            'cat' => '119', // Use the category id, can also replace with category_name which uses category slug
        );
        $q = new WP_Query($args);
 
        if ($q->have_posts()) {
            $q->the_post();
            //Your template tags and markup like:
        ?>
            <div class="articles__title title"><a href="<?php echo get_category_link(119); ?>">Статьи и обзоры</a></div>
            <div class="articles__row">
 
 
                <a href="<?php echo get_permalink($id); ?>" class="articles__column">
                    <div class="articles__item">
                        <div class="articles__dates">
                            <div class="articles__date"><?php echo esc_html(get_the_title()) . ' ';
                                                        echo get_the_date(); ?></div>
                        </div>
                        <div class="articles__img _ibg">
                            <?php echo get_the_post_thumbnail($id, 'medium'); ?>
                        </div>
                    </div>
                </a>
                <div class="articles__column">
                    <div class="articles__items items-article">
 
                        <?php
                        while ($q->have_posts()) {
                            $q->the_post();
                        ?>
                            <a href="<?php echo get_permalink($id); ?>" class="items-article__column">
                                <div class="items-article__item item-article">
                                    <div class="item-article__img _ibg">
                                        <?php echo get_the_post_thumbnail($id, 'medium'); ?>
 
                                    </div>
 
                                    <div class="articles__dates">
                                        <div class="articles__date"><?php echo esc_html(get_the_title()) . ' ';
                                                                    echo get_the_date(); ?></div>
                                    </div>
 
                                </div>
                            </a>
                        <?php
                        }
                        ?>
 
                    </div>
 
                </div>
            </div>
            <div class="articles-adapt__row articles-adapt-row">
 
 
 
                <div class="articles-adapt-row__small">
                    <?php $q->the_post(); //берем N=0 статью из выдачи последних
                    ?>
                    <a href="<?php echo get_permalink($id); ?>" class="articles-adapt__column articles-adapt__column_small">
                        <div class="articles-adapt__item">
                            <div class="articles-adapt__img _ibg">
                                <?php echo get_the_post_thumbnail($id, 'medium'); ?>
                            </div>
                            <div class="articles__dates">
                                <div class="articles__date"><?php echo get_the_date(); ?></div>
                            </div>
 
                        </div>
                        <div class="articles-adapt__text"><?php echo esc_html(get_the_title()); ?></div>
                    </a>
                    <?php $q->the_post(); //берем N=0 статью из выдачи последних
                    ?>
                    <a href="<?php echo get_permalink($id); ?>" class="articles-adapt__column articles-adapt__column_small">
                        <div class="articles-adapt__item">
                            <div class="articles-adapt__img _ibg">
                                <?php echo get_the_post_thumbnail($id, 'medium'); ?>
                            </div>
                            <div class="articles__dates">
                                <div class="articles__date"><?php echo get_the_date(); ?></div>
                            </div>
 
                        </div>
                        <div class="articles-adapt__text"><?php echo esc_html(get_the_title()); ?></div>
                    </a>
                </div>
 
                <div class="articles-adapt-row__full ">
                    <?php $q->the_post(); //берем N=0 статью из выдачи последних
                    ?>
                    <a href="<?php echo get_permalink($id); ?>" class="articles-adapt__column">
                        <div class="articles-adapt__item articles-adapt__item_big">
                            <div class="articles-adapt__img _ibg">
                                <?php echo get_the_post_thumbnail($id, 'medium'); ?>
                            </div>
                            <div class="articles__dates">
                                <div class="articles__date"><?php echo get_the_date(); ?></div>
                            </div>
                        </div>
                        <div class="articles-adapt__text"><?php echo esc_html(get_the_title()); ?></div>
                    </a>
                </div>
 
                <div class="articles-adapt-row__small">
                    <?php $q->the_post(); //берем N=0 статью из выдачи последних
                    ?>
                    <a href="<?php echo get_permalink($id); ?>" class="articles-adapt__column articles-adapt__column_small">
                        <div class="articles-adapt__item">
                            <div class="articles-adapt__img _ibg">
                                <?php echo get_the_post_thumbnail($id, 'medium'); ?>
                            </div>
                            <div class="articles__dates">
                                <div class="articles__date"><?php echo get_the_date(); ?></div>
                            </div>
 
                        </div>
                        <div class="articles-adapt__text"><?php echo esc_html(get_the_title()); ?></div>
                    </a>
                    <?php $q->the_post(); //берем N=0 статью из выдачи последних
                    ?>
                    <a href="<?php echo get_permalink($id); ?>" class="articles-adapt__column articles-adapt__column_small">
                        <div class="articles-adapt__item">
                            <div class="articles-adapt__img _ibg">
                                <?php echo get_the_post_thumbnail($id, 'medium'); ?>
                            </div>
                            <div class="articles__dates">
                                <div class="articles__date"><?php echo get_the_date(); ?></div>
                            </div>
 
                        </div>
                        <div class="articles-adapt__text"><?php echo esc_html(get_the_title()); ?></div>
                    </a>
                </div>
                <div class="articles-adapt-row__full ">
                    <?php $q->the_post(); //берем N=0 статью из выдачи последних
                    ?>
                    <a href="<?php echo get_permalink($id); ?>" class="articles-adapt__column">
                        <div class="articles-adapt__item articles-adapt__item_big">
                            <div class="articles-adapt__img _ibg">
                                <?php echo get_the_post_thumbnail($id, 'medium'); ?>
                            </div>
                            <div class="articles__dates">
                                <div class="articles__date"><?php echo get_the_date(); ?></div>
                            </div>
                        </div>
                        <div class="articles-adapt__text"><?php echo esc_html(get_the_title()); ?></div>
                    </a>
                </div>
 
                <div class="articles-adapt-row__full ">
                    <?php $q->the_post(); //берем N=0 статью из выдачи последних
                    ?>
                    <a href="<?php echo get_permalink($id); ?>" class="articles-adapt__column">
                        <div class="articles-adapt__item articles-adapt__item_big">
                            <div class="articles-adapt__img _ibg">
                                <?php echo get_the_post_thumbnail($id, 'medium'); ?>
                            </div>
                            <div class="articles__dates">
                                <div class="articles__date"><?php echo get_the_date(); ?></div>
                            </div>
                        </div>
                        <div class="articles-adapt__text"><?php echo esc_html(get_the_title()); ?></div>
                    </a>
                </div>
 
 
            </div>
        <?php
        }
        wp_reset_postdata();
        ?>
    </div>
</div>
 
 
<div class="about">
    <div class="about__container _container">
        <!-- <div class="about__title title"> О компании <span class="about__span">kedro</span><span class="about_span about__span_g">shop.ru</span></div> -->
        <div class="about__row">
            
            <div class="articles-adapt__column">
                <?php
                if (have_posts()) :
 
                    while (have_posts()) :
                        the_post();
                        //the_content();
                        $content_parts = get_extended( $post->post_content );
                        echo apply_filters('the_content', $content_parts['main']);
                        echo "<button class=\"show_more mobile btn\">Подробнее&hellip;</button>";
                        echo "<div class=\"extended_part\">";
                        echo apply_filters('the_content', $content_parts['extended']);
                        echo "</div>";
                     endwhile;
 
                endif;
                ?>
 
            </div>
            <!-- <div class="about__column">
                <div class="about__img">
                    <picture>
                        <source srcset="<?php bloginfo('template_url'); ?>/img/about_img.webp" type="image/webp"><img src="<?php bloginfo('template_url'); ?>/img/about_img.jpg" alt="">
                    </picture>
                </div>
            </div> -->
        </div>
    </div>
</div>
 
<?php
//включаем блок подписки
include(get_template_directory() . '/inc/subscribe_bar.php');
?>
 
 
 
<?php
//get_sidebar();
get_footer();