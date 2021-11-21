<div class="bredcrums">

    <div class="bredcrums__container _container">

        <div class="desktop_breadcrumb" typeof="BreadcrumbList" vocab="https://schema.org/">

            <?php

            // if ( function_exists('yoast_breadcrumb') ) {

            //   yoast_breadcrumb( '<div class="bredcrums__row">','</div>' );

            // }

            //echo do_shortcode( '[flexy_breadcrumb]');
            if (function_exists('bcn_display')) {
                bcn_display();
            }

            ?>

        </div>



        <div class="mobile_breadcrumb">

            <div class="brr backlink"><button class="nobtn fa fa-long-arrow-left" onclick="window.history.go(-1); return false;"></button></div>

            <?php echo do_shortcode('[ivory-search id="11212" ]'); ?>

            <?php
            if (is_shop() || is_product_category() || is_page(array(7754, 7761, 7766))) :
            ?>
                <div class="filter_ico">
                    <span></span>
                </div>

                <div class="filter_mobile">
                    <div>
                        <a href="#" class="mobile_filter_back"><i class="fa fa fa-long-arrow-left"></i></a>
                        <span>Фильтр</span>
                    </div>
                    <?php echo do_shortcode('[premmerce_filter] '); ?>

                </div>
            <?php endif; ?>



            <div class="ya-share2" data-curtain data-limit="0" data-more-button-type="short" data-services="messenger,vkontakte,facebook,odnoklassniki,telegram,twitter,viber,whatsapp,moimir,skype"></div>

            <br>
            <div class="active_mobile_filter">
                <?php echo do_shortcode('[premmerce_active_filters] '); ?>
            </div>


            <div class="brr title">

                <?php echo (!is_product_category()) ? the_title() : woocommerce_page_title('', true);;

                ?></div>

        </div>





        <?php //if (function_exists('dimox_breadcrumbs')){dimox_breadcrumbs();} 
        ?>





        <!-- </div> -->

    </div>

</div>

<?php

if (is_product_category() or is_shop() or is_product() or is_page(array(7754, 7761, 7766))) {

?>

    <div class="mobile__menu_category">

        <button class="btn  icon-menu-second">Категории товаров</button>

    </div>

<?php

}

?>



<?php

/*=============================================

=            BREADCRUMBS			            =

=============================================*/

/*

 * "Хлебные крошки" для WordPress

 * автор: Dimox

 * версия: 2019.03.03

 * лицензия: MIT

*/

// function dimox_breadcrumbs()

// {



//     /* === ОПЦИИ === */

//     $text['home']     = 'Главная'; // текст ссылки "Главная"

//     $text['category'] = '%s'; // текст для страницы рубрики

//     $text['search']   = 'Результаты поиска по запросу "%s"'; // текст для страницы с результатами поиска

//     $text['tag']      = 'Записи с тегом "%s"'; // текст для страницы тега

//     $text['author']   = 'Статьи автора %s'; // текст для страницы автора

//     $text['404']      = 'Ошибка 404'; // текст для страницы 404

//     $text['page']     = 'Страница %s'; // текст 'Страница N'

//     $text['cpage']    = 'Страница комментариев %s'; // текст 'Страница комментариев N'



//     $wrap_before    = '<div class="bredcrums__row" itemscope itemtype="http://schema.org/BreadcrumbList">'; // открывающий тег обертки

//     $wrap_after     = '</div><!-- .breadcrumbs -->'; // закрывающий тег обертки

//     $sep            = ''; //<span class="breadcrumbs__separator"> › </span>'; // разделитель между "крошками"

//     $before         = '<div class="bredcrums__item"><span class="bredcrums__title">'; //<span class="breadcrumbs__current">'; // тег перед текущей "крошкой"

//     $after          = '</span></div>'; //'</span>'; // тег после текущей "крошки"



//     $show_on_home   = 0; // 1 - показывать "хлебные крошки" на главной странице, 0 - не показывать

//     $show_home_link = 1; // 1 - показывать ссылку "Главная", 0 - не показывать

//     $show_current   = 1; // 1 - показывать название текущей страницы, 0 - не показывать

//     $show_last_sep  = 1; // 1 - показывать последний разделитель, когда название текущей страницы не отображается, 0 - не показывать

//     /* === КОНЕЦ ОПЦИЙ === */



//     global $post;

//     $home_url       = home_url('/');

//     $link           = '<div class="bredcrums__item" itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">';

//     $link          .= '<a class="bredcrums__link" href="%1$s" itemprop="item"><span itemprop="name">%2$s</span></a>';

//     $link          .= '<meta itemprop="position" content="%3$s" />';

//     $link          .= '</div>';

//     $parent_id      = ($post) ? $post->post_parent : '';

//     $home_link      = sprintf($link, $home_url, $text['home'], 1);



//     if (is_home() || is_front_page()) {



//         if ($show_on_home) echo $wrap_before . $home_link . $wrap_after;

//     } else {



//         $position = 0;



//         echo $wrap_before;



//         if ($show_home_link) {

//             $position += 1;

//             echo $home_link;

//         }



//         if (is_category()) {

//             $parents = get_ancestors(get_query_var('cat'), 'category');

//             foreach (array_reverse($parents) as $cat) {

//                 $position += 1;

//                 if ($position > 1) echo $sep;

//                 echo sprintf($link, get_category_link($cat), get_cat_name($cat), $position);

//             }

//             if (get_query_var('paged')) {

//                 $position += 1;

//                 $cat = get_query_var('cat');

//                 echo $sep . sprintf($link, get_category_link($cat), get_cat_name($cat), $position);

//                 echo $sep . $before . sprintf($text['page'], get_query_var('paged')) . $after;

//             } else {

//                 if ($show_current) {

//                     if ($position >= 1) echo $sep;

//                     echo $before . sprintf($text['category'], single_cat_title('', false)) . $after;

//                 } elseif ($show_last_sep) echo $sep;

//             }

//         } 

//         elseif($post->post_type == 'wpm-testimonial' || is_single( 7152 )){



//             echo $sep . sprintf($link, get_permalink(7152 ), 'Отзывы', 2);



//             // $parents = get_ancestors(get_query_var('cat'), 'category');

//             // foreach (array_reverse($parents) as $cat) {

//             //     $position += 2;

//             //     if ($position > 2) echo $sep;

//             //     echo sprintf($link, get_category_link($cat), get_cat_name($cat), $position);

//             // }

//             // if (get_query_var('paged')) {

//             //     $position += 2;

//             //     $cat = get_query_var('cat');

//             //     echo $sep . sprintf($link, get_category_link($cat), get_cat_name($cat), $position);

//             //     echo $sep . $before . sprintf($text['page'], get_query_var('paged')) . $after;

//             // } else {

//                 // if ($position > 1) echo $sep;

//                 // echo sprintf($link, get_post_type_archive_link($post_type->name), $post_type->labels->name, $position);

//                 if ($show_current) echo $sep . $before . get_the_title() . $after;

//                 elseif ($show_last_sep) echo $sep;

//             // }

//         }

//         elseif (is_product_category()) {



//             echo $sep . sprintf($link, get_permalink( wc_get_page_id( 'shop' ) ), 'Товары', 2);



//             $parents = get_ancestors(get_query_var('cat'), 'category');

//             foreach (array_reverse($parents) as $cat) {

//                 $position += 2;

//                 if ($position > 2) echo $sep;

//                 echo sprintf($link, get_category_link($cat), get_cat_name($cat), $position);

//             }

//             if (get_query_var('paged')) {

//                 $position += 2;

//                 $cat = get_query_var('cat');

//                 echo $sep . sprintf($link, get_category_link($cat), get_cat_name($cat), $position);

//                 echo $sep . $before . sprintf($text['page'], get_query_var('paged')) . $after;

//             } else {

//                 if ($show_current) {

//                     if ($position >= 2) echo $sep;

//                     echo $before .  sprintf($text['category'], single_cat_title('', false)) . $after;

//                 } elseif ($show_last_sep) echo $sep;

//             }

//         } 



//         // elseif (isset($post)) {



//         // } 









//         elseif (is_search()) {

//             if (get_query_var('paged')) {

//                 $position += 1;

//                 if ($show_home_link) echo $sep;

//                 echo sprintf($link, $home_url . '?s=' . get_search_query(), sprintf($text['search'], get_search_query()), $position);

//                 echo $sep . $before . sprintf($text['page'], get_query_var('paged')) . $after;

//             } else {

//                 if ($show_current) {

//                     if ($position >= 1) echo $sep;

//                     echo $before . sprintf($text['search'], get_search_query()) . $after;

//                 } elseif ($show_last_sep) echo $sep;

//             }

//         } elseif (is_year()) {

//             if ($show_home_link && $show_current) echo $sep;

//             if ($show_current) echo $before . get_the_time('Y') . $after;

//             elseif ($show_home_link && $show_last_sep) echo $sep;

//         } elseif (is_month()) {

//             if ($show_home_link) echo $sep;

//             $position += 1;

//             echo sprintf($link, get_year_link(get_the_time('Y')), get_the_time('Y'), $position);

//             if ($show_current) echo $sep . $before . get_the_time('F') . $after;

//             elseif ($show_last_sep) echo $sep;

//         } elseif (is_day()) {

//             if ($show_home_link) echo $sep;

//             $position += 1;

//             echo sprintf($link, get_year_link(get_the_time('Y')), get_the_time('Y'), $position) . $sep;

//             $position += 1;

//             echo sprintf($link, get_month_link(get_the_time('Y'), get_the_time('m')), get_the_time('F'), $position);

//             if ($show_current) echo $sep . $before . get_the_time('d') . $after;

//             elseif ($show_last_sep) echo $sep;

//         } elseif (is_single() && !is_attachment()) {









//             if (get_post_type() != 'post') {

//                 $position += 1;

//                 $post_type = get_post_type_object(get_post_type());

//                 if ($position > 1) echo $sep;

//                 echo sprintf($link, get_post_type_archive_link($post_type->name), $post_type->labels->name, $position);

//                 if ($show_current) echo $sep . $before . get_the_title() . $after;

//                 elseif ($show_last_sep) echo $sep;

//             } else {



//                 $cat = get_the_category();

//                 $catID = $cat[0]->cat_ID;

//                 $parents = get_ancestors($catID, 'category');

//                 $parents = array_reverse($parents);

//                 $parents[] = $catID;



//                 foreach ($parents as $cat) {

//                     $position += 1;

//                     if ($position > 1) echo $sep;

//                     echo sprintf($link, get_category_link($cat), get_cat_name($cat), $position);

//                 }

//                 if (get_query_var('cpage')) {

//                     $position += 1;

//                     echo $sep . sprintf($link, get_permalink(), get_the_title(), $position);

//                     echo $sep . $before . sprintf($text['cpage'], get_query_var('cpage')) . $after;

//                 } else {

//                     if ($show_current) echo $sep . $before . get_the_title() . $after;

//                     elseif ($show_last_sep) echo $sep;

//                 }









//             }

//         } elseif (is_post_type_archive()) {

//             $post_type = get_post_type_object(get_post_type());

//             if (get_query_var('paged')) {

//                 $position += 1;

//                 if ($position > 1) echo $sep;

//                 echo sprintf($link, get_post_type_archive_link($post_type->name), $post_type->label, $position);

//                 echo $sep . $before . sprintf($text['page'], get_query_var('paged')) . $after;

//             } else {

//                 if ($show_home_link && $show_current) echo $sep;

//                 if ($show_current) echo $before . $post_type->label . $after;

//                 elseif ($show_home_link && $show_last_sep) echo $sep;

//             }

//         } elseif (is_attachment()) {

//             $parent = get_post($parent_id);

//             $cat = get_the_category($parent->ID);

//             $catID = $cat[0]->cat_ID;

//             $parents = get_ancestors($catID, 'category');

//             $parents = array_reverse($parents);

//             $parents[] = $catID;

//             foreach ($parents as $cat) {

//                 $position += 1;

//                 if ($position > 1) echo $sep;

//                 echo sprintf($link, get_category_link($cat), get_cat_name($cat), $position);

//             }

//             $position += 1;

//             echo $sep . sprintf($link, get_permalink($parent), $parent->post_title, $position);

//             if ($show_current) echo $sep . $before . get_the_title() . $after;

//             elseif ($show_last_sep) echo $sep;

//         } elseif (is_page() && !$parent_id) {

//             if ($show_home_link && $show_current) echo $sep;

//             if ($show_current) echo $before . get_the_title() . $after;

//             elseif ($show_home_link && $show_last_sep) echo $sep;

//         } elseif (is_page() && $parent_id) {

//             $parents = get_post_ancestors(get_the_ID());

//             foreach (array_reverse($parents) as $pageID) {

//                 $position += 1;

//                 if ($position > 1) echo $sep;

//                 echo sprintf($link, get_page_link($pageID), get_the_title($pageID), $position);

//             }

//             if ($show_current) echo $sep . $before . get_the_title() . $after;

//             elseif ($show_last_sep) echo $sep;

//         } elseif (is_tag()) {

//             if (get_query_var('paged')) {

//                 $position += 1;

//                 $tagID = get_query_var('tag_id');

//                 echo $sep . sprintf($link, get_tag_link($tagID), single_tag_title('', false), $position);

//                 echo $sep . $before . sprintf($text['page'], get_query_var('paged')) . $after;

//             } else {

//                 if ($show_home_link && $show_current) echo $sep;

//                 if ($show_current) echo $before . sprintf($text['tag'], single_tag_title('', false)) . $after;

//                 elseif ($show_home_link && $show_last_sep) echo $sep;

//             }

//         } elseif (is_author()) {

//             $author = get_userdata(get_query_var('author'));

//             if (get_query_var('paged')) {

//                 $position += 1;

//                 echo $sep . sprintf($link, get_author_posts_url($author->ID), sprintf($text['author'], $author->display_name), $position);

//                 echo $sep . $before . sprintf($text['page'], get_query_var('paged')) . $after;

//             } else {

//                 if ($show_home_link && $show_current) echo $sep;

//                 if ($show_current) echo $before . sprintf($text['author'], $author->display_name) . $after;

//                 elseif ($show_home_link && $show_last_sep) echo $sep;

//             }

//         } elseif (is_404()) {

//             if ($show_home_link && $show_current) echo $sep;

//             if ($show_current) echo $before . $text['404'] . $after;

//             elseif ($show_last_sep) echo $sep;

//         } elseif (has_post_format() && !is_singular()) {

//             if ($show_home_link && $show_current) echo $sep;

//             echo get_post_format_string(get_post_format());

//         }





//         echo $wrap_after;

//     }

// } // end of dimox_breadcrumbs()

?>