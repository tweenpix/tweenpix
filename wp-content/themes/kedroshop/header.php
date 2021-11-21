<?php

/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package kedroshop
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>

<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<meta name="viewport" content="user-scalable=no, initial-scale=1.0, maximum-scale=1.0, width=device-width">
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<?php wp_head(); ?>
	<meta name="yandex-verification" content="4f8010d9a360f4ab" />
  <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css"/>	
</head>
 
<body <?php //body_class(); 
		?>>
	<?php wp_body_open(); ?>
	<div id="page" class="wrapper">
		
	
<?php
$messenger_phone = "79260520348";
$messenger_text = "Здравствуйте! Я сайта kedroshop.ru";
?>
    
    <div class="main_container">
      <input type="checkbox" class="btn_apex chat mainbutton">
      <a class="btn_apex chat totop" href="#" id="toTop" rel="nofollow">&uarr;</a>
      <div class="btn_apex chat bitrix"></div>
      <a class="btn_apex chat viber" target="_blank" href="viber://chat?number=%2B<?php echo $messenger_phone;?>" rel="nofollow"></a>
      <a class="btn_apex chat whatsapp" target="_blank" href="https://wa.me/<?php echo $messenger_phone;?>?text=<?php echo urlencode( $messenger_text ); ?>" rel="nofollow"></a>
      <a class="btn_apex chat telegram" target="_blank" href="tg://resolve?domain=Kedroshopru" rel="nofollow"></a>
    </div>   
			<?php
		if (is_front_page() != true) {
		?>

			<!--burger menu-->


			<div style="display: none;">
				<aside data-da=".header__body,768,0" class="page__side side-page header_menu">
					<div class="side-page__title">Каталог товаров</div>

					 <?php


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
						'items_wrap'      => '<ul id="burger_mobile" class="side-page__list">%3$s</ul>',
						'depth'           => 3,
						'walker'          => '',
					]);
					?>
					<div class="submenu"></div>
					<div class="subsubmenu"></div>
				</aside>
			</div>
			<!--burger end-->



			<!--isn't home page-->
			<header class="header">
			<!-- id="icon-burger" -->
				<div  class="menu__icon icon-menu">
					<span></span>
					<span></span>
					<span></span>
				</div>
				<div class="header__container _container">
					<a href="<?php echo home_url(); ?>" class="header__logo">
						<picture>
							<source srcset="<?php bloginfo('template_url'); ?>/img/logo.webp" type="image/webp"><img src="<?php bloginfo('template_url'); ?>/img/logo.png" alt="">
						</picture>
					</a>
					<div class="mobile_only">
						<a href="/">
							<span>KEDRO</span>
							<span>SHOP.RU</span>
						</a>
					</div>
					<div class="top-header__column_adapt">

						<!-- id="menu-burger" -->
					</div>
					<div id="menu-burger" class="header__body ">
						<div class="header__body-text">
							<div class="header__top top-header">
								<div class="top-header__body">
									<div class="top-header__column">
										<div data-da=".header__logo,768,1" class="top-header__text">
											Магазин продукции
											из <span>ливанского кедра и экоматериалов</span>
										</div>
									</div>
									<div class="top-header__column">
										<a href="<?php echo get_permalink(wc_get_page_id('shop')); ?>" id="btn_mobile_menu" class="top-hader__btn-2 btn">В каталог товаров</a><br><br>
										<a href="<?php echo get_permalink(7250); ?>" class="top-header__btn">Купить оптом</a>
										<?php

										// <ul class="top-header__list">
										// <li><a href="points.html" class="top-header__link">Пункты выдачи</a></li>
										// <li><a href="garant.html" class="top-header__link">Гарантии и возврат</a></li>
										// <li><a href="#" class="top-header__link">Сотрудничество</a></li>
										// <li><a href="vacancies.html" class="top-header__link">Вакансии</a></li>

										// </ul>
										//top_main меню
										wp_nav_menu([
											'menu'            => 'top_main',
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
											'link_class'      => 'top-header__link',
											'list_item_class'  => '',
											'items_wrap'      => '<ul id="%1$s" class="top-header__list">%3$s</ul>',
											'depth'           => 0,
											'walker'          => '',
										]); ?>
									</div>
								</div>
							</div>
							<div class="header__bottom bottom-header">
								<div class="bottom-header__body">
									<div class="bottom-header__column">
										<?php
										//main меню
										wp_nav_menu([
											'menu'            => 'main',
											'container'       => 'div',
											'container_class' => 'bottom-header__column',
											'container_id'    => '',
											'menu_class'      => 'menu',
											'menu_id'         => '',
											'echo'            => true,
											'fallback_cb'     => 'wp_page_menu',
											'before'          => '',
											'after'           => '',
											'link_before'     => '',
											'link_after'      => '',
											'link_class'      => 'bottom-header__link',
											'list_item_class'  => '',
											'items_wrap'      => '<ul id="%1$s" class="bottom-header__list">%3$s</ul>',
											'depth'           => 0,
											'walker'          => '',
										]); ?>
									</div>
									<div class="bottom-header__column">
										<div class="bottom-header__phone phone-header">
											<a data-da=".header__container,768,2" href="tel:+79260520348" class="phone-header__icon "></a>
											<div class="phone-header__body">
												<a href="tel:+79260520348" class="phone-header__phone">+ 7 ( 926 )-052-03-48</a>
												<a href="#" class="phone-header__link call_back_form">Заказать звонок</a>
											</div>
										</div>
									</div>
								</div>
							</div>

						</div>
					</div>
				</div>
			</header>


			<!-- HEADER SCROLL  bgn -->
			<header class="js-header">
				<div class="header__container _container">
					<a href="<?php echo home_url(); ?>" class="header__logo">
						<picture>
							<source srcset="<?php bloginfo('template_url'); ?>/img/logo.webp" type="image/webp"><img src="<?php bloginfo('template_url'); ?>/img/logo.png" alt="">
						</picture>
					</a>

					<div class="top-header__column_adapt">
						<div class="page-top__icons ">
													<a href="<?php echo get_permalink( get_option('woocommerce_myaccount_page_id') ); ?>" title="Личный кабинет" class="page-top__icon page-top__icon_acc page-top__icon_adapt"></a>
							<?php echo do_shortcode('[ti_wishlist_products_counter]'); ?>
							<a href="<?php echo esc_url(wc_get_cart_url()); ?>" class="page-top__icon page-top__icon_basket page-top__icon_basket_adapt">
								<div class="page-top__label"><span class="count_cart"></span></div>
								<img src="<?php bloginfo('template_url'); ?>/img/cart.svg" alt="Корзина">
							</a>
						</div>
					</div>
					<div class="header__body">
							<div class="page-top__inputs">
								<a href="#" class="page-top__search_btn"> <svg focusable="false" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24px">
										<path d="M15.5 14h-.79l-.28-.27C15.41 12.59 16 11.11 16 9.5 16 5.91 13.09 3 9.5 3S3 5.91 3 9.5 5.91 16 9.5 16c1.61 0 3.09-.59 4.23-1.57l.27.28v.79l5 4.99L20.49 19l-4.99-5zm-6 0C7.01 14 5 11.99 5 9.5S7.01 5 9.5 5 14 7.01 14 9.5 11.99 14 9.5 14z"></path>
									</svg></a>
								<div class="page-top__search_conteiner">
									<?php //get_search_form();
									//echo do_shortcode('[aws_search_form]');
									echo do_shortcode('[ivory-search id="11224" title="frontpage"]');
									?>
								</div>

							</div>
							<div class="page-top__icons ">
							<a href="<?php echo get_permalink( get_option('woocommerce_myaccount_page_id') ); ?>" title="Личный кабинет" class="page-top__icon page-top__icon_acc page-top__icon_adapt"></a>
								<?php echo do_shortcode('[ti_wishlist_products_counter]'); ?>
								<?php //woocommerce_mini_cart();
								?>
								<a href="<?php echo esc_url(wc_get_cart_url()); ?>" class="page-top__icon page-top__icon_basket page-top__icon_basket_adapt">
									<div class="page-top__label"><span class="count_cart"></span></div>
									<img src="<?php bloginfo('template_url'); ?>/img/cart.svg" alt="Корзина">
								</a>
							</div>
							<div class="bottom-header__phone phone-header">
								<a href="tel:+79260520348" class="phone-header__icon "></a>
								<div class="phone-header__body">
									<a href="tel:+79260520348" class="phone-header__phone">+ 7 ( 926 )-052-03-48</a>
									<a href="#" class="phone-header__link call_back_form">Заказать звонок</a>
								</div>
							</div>
					</div>
				</div>
			</header>
			<!-- HEADER SCROLL   end -->

		<?php
		} else {
		?>



			<!--this is home page-->
			<header class="header  home-page-header">
				<div id="icon-burger" class="menu__icon icon-menu">
					<span></span>
					<span></span>
					<span></span>
				</div>
				<div class="header__container _container">
					<a href="<?php echo home_url(); ?>" class="header__logo">
						<picture>
							<source srcset="<?php bloginfo('template_url'); ?>/img/logo.webp" type="image/webp"><img src="<?php bloginfo('template_url'); ?>/img/logo.png" alt="">
						</picture>
					</a>
					<div class="mobile_only">
						<a href="/">
							<span>KEDRO</span>
							<span>SHOP.RU</span>
						</a>
					</div>
					<div class="top-header__column_adapt">
						<div class="page-top__icons " data-da=".page-top__row,768,1">
						<a href="<?php echo get_permalink( get_option('woocommerce_myaccount_page_id') ); ?>" title="Личный кабинет" class="page-top__icon page-top__icon_acc page-top__icon_adapt"></a>
							<?php echo do_shortcode('[ti_wishlist_products_counter]'); ?>
							<a href="<?php echo esc_url(wc_get_cart_url()); ?>" class="page-top__icon page-top__icon_basket page-top__icon_basket_adapt">
								<div class="page-top__label"><span class="count_cart"></span></div>
								<img src="<?php bloginfo('template_url'); ?>/img/cart.svg" alt="Корзина">
							</a>
						</div>
					</div>
					<div class="header__body">
						<div class="header__body-text">

							<div class="header__top top-header">
								<div class="top-header__body">
									<div class="top-header__column">
										<div data-da=".header__logo,800,1" class="top-header__text">
											<?php //echo get_bloginfo('description', 'display');
											?>
											Магазин продукции из <span>ливанского кедра и экоматериалов</span>
										</div>
									</div>
									<div class="top-header__column">
										<a href="<?php echo get_permalink(7250); ?>" class="top-header__btn">Купить оптом</a>
										<?php

										// <ul class="top-header__list">
										// <li><a href="points.html" class="top-header__link">Пункты выдачи</a></li>
										// <li><a href="garant.html" class="top-header__link">Гарантии и возврат</a></li>
										// <li><a href="#" class="top-header__link">Сотрудничество</a></li>
										// <li><a href="vacancies.html" class="top-header__link">Вакансии</a></li>

										// </ul>
										//top_main меню
										wp_nav_menu([
											'menu'            => 'top_main',
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
											'link_class'      => 'top-header__link',
											'list_item_class'  => '',
											'items_wrap'      => '<ul id="%1$s" class="top-header__list">%3$s</ul>',
											'depth'           => 0,
											'walker'          => '',
										]); ?>
									</div>
								</div>
							</div>
							<div class="header__bottom bottom-header">
								<div class="bottom-header__body">
									<?php
									//main меню
									wp_nav_menu([
										'menu'            => 'main',
										'container'       => 'div',
										'container_class' => 'bottom-header__column',
										'container_id'    => '',
										'menu_class'      => 'menu',
										'menu_id'         => '',
										'echo'            => true,
										'fallback_cb'     => 'wp_page_menu',
										'before'          => '',
										'after'           => '',
										'link_before'     => '',
										'link_after'      => '',
										'link_class'      => 'bottom-header__link',
										'list_item_class'  => '',
										'items_wrap'      => '<ul id="%1$s" class="bottom-header__list">%3$s</ul>',
										'depth'           => 0,
										'walker'          => '',
									]); ?>
									<div class="bottom-header__column">
										<div class="bottom-header__phone phone-header">
											<a data-da=".header__container,768,2" href="tel:+79260520348" class="phone-header__icon "></a>
											<div class="phone-header__body">
												<a href="tel:+79260520348" class="phone-header__phone">+ 7 ( 926 )-052-03-48</a>
												<a href="#" class="phone-header__link call_back_form">Заказать звонок</a>
											</div>
										</div>
									</div>
								</div>
							</div>
							<a href="<?php echo get_permalink(wc_get_page_id('shop')); ?>" class="top-header__btn-2 btn">В каталог</a>

						</div>
					</div>
				</div>
			</header>

			<!-- HEADER SCROLL   bgn -->
			<header class="js-header">
				<div class="header__container _container">
					<a href="<?php echo home_url(); ?>" class="header__logo">
						<picture>
							<source srcset="<?php bloginfo('template_url'); ?>/img/logo.webp" type="image/webp"><img src="<?php bloginfo('template_url'); ?>/img/logo.png" alt="">
						</picture>
					</a>
					<div class="top-header__column_adapt">
						<div class="page-top__icons ">
												<a href="<?php echo get_permalink( get_option('woocommerce_myaccount_page_id') ); ?>" title="Личный кабинет" class="page-top__icon page-top__icon_acc page-top__icon_adapt"></a>
							<?php echo do_shortcode('[ti_wishlist_products_counter]'); ?>
							<a href="<?php echo esc_url(wc_get_cart_url()); ?>" class="page-top__icon page-top__icon_basket page-top__icon_basket_adapt">
								<div class="page-top__label"><span class="count_cart"></span></div>
								<img src="<?php bloginfo('template_url'); ?>/img/cart.svg" alt="Корзина">
							</a>
						</div>
					</div>
					<div class="header__body">
						<div class="js-header__menu btn">
							<div class="js-header__burger">
								<span></span>
								<span></span>
								<span></span>
							</div>
							<span class="js-header__text">Меню</span>			
						</div> 
						<!-- <div class="js-header__body"> -->
							<div class="js-header__content ">
								<div  class="page">
									<div class="page__container _container">
										<aside data-da=".header__body,767.98,0" class="page__side side-page">
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
												'items_wrap'      => '<ul id="burger_mobile" class="side-page__list">%3$s</ul>',
												'depth'           => 0,
												'walker'          => '',
											]); ?>
								            <div class="submenu"></div>
								            <div class="subsubmenu"></div>
										</aside>
									</div>
								</div>
							</div>
						<!-- </div> -->
						<div class="page-top__inputs">
							<a href="#" class="page-top__search_btn"> <svg focusable="false" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24px">
									<path d="M15.5 14h-.79l-.28-.27C15.41 12.59 16 11.11 16 9.5 16 5.91 13.09 3 9.5 3S3 5.91 3 9.5 5.91 16 9.5 16c1.61 0 3.09-.59 4.23-1.57l.27.28v.79l5 4.99L20.49 19l-4.99-5zm-6 0C7.01 14 5 11.99 5 9.5S7.01 5 9.5 5 14 7.01 14 9.5 11.99 14 9.5 14z"></path>
								</svg></a>
							<div class="page-top__search_conteiner">
								<?php //get_search_form();
								//echo do_shortcode('[aws_search_form]');
								echo do_shortcode('[ivory-search id="11224" title="frontpage"]');
								?>								
							</div>

						</div>
						<div class="page-top__icons ">
						<a href="<?php echo get_permalink( get_option('woocommerce_myaccount_page_id') ); ?>" title="Личный кабинет" class="page-top__icon page-top__icon_acc page-top__icon_adapt"></a>
							<?php echo do_shortcode('[ti_wishlist_products_counter]'); ?>
							<?php //woocommerce_mini_cart();
							?>
							<a href="<?php echo esc_url(wc_get_cart_url()); ?>" class="page-top__icon page-top__icon_basket page-top__icon_basket_adapt">
								<div class="page-top__label"><span class="count_cart"></span></div>
								<img src="<?php bloginfo('template_url'); ?>/img/cart.svg" alt="Корзина">
							</a>
						</div>
						<div class="bottom-header__phone phone-header">
							<a href="tel:+79260520348" class="phone-header__icon "></a>
							<div class="phone-header__body">
								<a href="tel:+79260520348" class="phone-header__phone">+ 7 ( 926 )-052-03-48</a>
								<a href="#" class="phone-header__link call_back_form">Заказать звонок</a>
							</div>
						</div>
					</div>
				</div>
			</header>
			<!-- HEADER SCROLL  end -->

		<?php
		} ?> 
        <div class="page__menu-category" id="category-list"></div>
        <script>
        	$(document).ready(function () {
        		if($('.side-page__list')[1]) {
		        	$('.page__menu-category').css('top', $('.side-page__list')[1].offsetTop + 'px');
		        	$('.page__menu-category').css('left', $('.side-page__list')[1].offsetLeft + $('.side-page__list')[1].offsetWidth + 20 + 'px');        			
        		}

        	})
        </script>
