<div class="sidebar_widget_slider">
    <div class="hits__container _container">
 
 
        <div class="hits__slider slider-hits">
            <div class="slider-widget__body _swiper">
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
 
                        <div class="slider-widget__slide hits-slide">
                            <?php if ($product->is_on_sale()) : ?>
                                <?php echo apply_filters('woocommerce_sale_flash', '<div class="ribbon ribbon-top-right"><span>' . esc_html__('Sale!', 'woocommerce') . '</span></div>', $post, $product); ?>
 
                            <?php
                            endif;
                            ?>
                            <div class="hits-slide__labels">
                                <?php echo do_shortcode('[ti_wishlists_addtowishlist product_id="' . $product->get_id() . '" loop="yes"]'); ?>
                            </div>
                            <a href="<?php the_permalink(); ?>" class="hits-slide__img"><img src="<?php echo wp_get_attachment_image_url($product->get_image_id(), 'large'); ?>" alt="<?php echo the_title('', ''); ?>" /></a>
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

        </div>
    </div>
</div>