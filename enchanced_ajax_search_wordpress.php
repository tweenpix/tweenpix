<?php
//AJAX расширенный поиск

//для вставки расширенной формы поиска использовать в шаблоне php get_search_form();



function ba_ajax_search()
{

    $catfind = array();

    $taxonomy     = 'product_cat'; //Woocommerce taxanomy name
    $orderby      = 'name';
    $show_count   = 0;      //set 1 for yes, 0 for no
    $pad_counts   = 0;      //set 1 for yes, 0 for no
    $hierarchical = 1;      //set 1 for yes, 0 for no  
    $title        = '';
    $empty        = 0;

    $args = array(
        'taxonomy'     => $taxonomy,
        'orderby'      => $orderby,
        'show_count'   => $show_count,
        'pad_counts'   => $pad_counts,
        'hierarchical' => $hierarchical,
        //'title_li'     => $title,
        'hide_empty'   => $empty,
        'field' => 'name',
        'terms' => $_POST['term']
    );

    //get all woocommerce categories on the basis of $args  
    $get_all_categories = get_categories($args);
    foreach ($get_all_categories as $cat) {
        if ($cat->category_parent == 0) {
            $category_id = $cat->term_id;
            if (mb_stristr($cat->name, $_POST['term']) !== false) {
                array_push($catfind, '<a href="' . get_term_link($cat->slug, 'product_cat') . '">' . $cat->name . '</a>');
            }
            //Create arguments for child category
            //        $args2 = array(
            //                'taxonomy'     => $taxonomy,
            //                'child_of'     => 0,
            //                'parent'       => $category_id,
            //                'orderby'      => $orderby,
            //                'show_count'   => $show_count,
            //                'pad_counts'   => $pad_counts,
            //                'hierarchical' => $hierarchical,
            //                'title_li'     => $title,
            //                'hide_empty'   => $empty
            //        );
            //
            //        //Get child category
            //        $sub_cats = get_categories( $args2 );
            //        if($sub_cats) {
            //            foreach($sub_cats as $sub_category) {
            //            array_push($catfind,'<a href="'. get_term_link($sub_category->slug, 'product_cat') .'">'. $sub_category->name .'</a>');
            //            }   
            //        }
        }
    }


    //////////////////////

    if (count($catfind) > 0) {
        $catfind_bool = true;
    }


    $args = array(
        's' => $_POST['term'],

    );
    $the_query = new WP_Query($args);
    if ($the_query->have_posts()) {

        //выводим категории

        echo '<div class="categories">';
        foreach ($catfind as $v) {
            echo '<div>' . $v . '</div>';
        }
        echo '</div>';

        while ($the_query->have_posts()) {
            $the_query->the_post();

?>
            <div class="result_item clear <?php echo  $catfind_bool ? 'second' : ''; ?>">
                <?php
                if (has_post_thumbnail()) {
                ?>
                    <a href="<?php the_permalink(); ?>"><?
                                                        the_post_thumbnail(array('class' => 'post_thumbnail')); ?>
                    </a><?
                    } else {
                        ?>
                    <img src="<?php bloginfo('template_directory'); ?>/images/noimage.png" />
                <?php } ?>
                <a href="<?php the_permalink(); ?>">
                    <p><?php echo $sku = get_post_meta(get_the_ID(), '_sku', true); ?></p>
                    <span class="description__item"><?php the_title(); ?></span>
                    <p>
                        <? $price = get_post_meta(get_the_ID(), '_regular_price', true);
                        $sale_price = get_post_meta(get_the_ID(), '_sale_price', true);

                        if ($sale_price > 0) {
                            echo  '<span class="saleprice">' . $sale_price . '&nbsp;₽</span>';
                            echo '<span class="oldprice">' . $price . '&nbsp;₽</span>';
                        } else {
                            echo '<span class="saleprice">' . $price . '&nbsp;₽</span>';
                        }
                        ?>

                    </p>
                </a>
            </div>
        <?php
        }
    } else {
        ?>
        <div class="result_item">
            <span class="not_found">Ничего не найдено, попробуйте другой запрос</span>
        </div>
<?php
    }
    exit;
}
add_action('wp_ajax_nopriv_ba_ajax_search', 'ba_ajax_search');
add_action('wp_ajax_ba_ajax_search', 'ba_ajax_search');

?>