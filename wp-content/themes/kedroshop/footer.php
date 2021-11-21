<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package kedroshop
 */

?>

<footer class="footer">
	<div class="footer__content _container">
		<div class="footer__top top-footer">
			<div class="top-footer__row">
				<div class="top-footer__column top-footer__column_adapt">
					<a href="/" class="footer__logo"><picture><source srcset="<?php bloginfo('template_url');?>/img/logo.webp" type="image/webp"><img src="<?php bloginfo('template_url');?>/img/logo.png" alt=""></picture></a>
					<div class="footer__socials socials-footer">
						<div class="socials-footer__title">Мы в социальных сетях:
						</div>
						<div class="socials-footer__body">
							<!-- <a rel="nofollow" href="#" class="socials-footer__icon _icon-fb"></a> -->
							<a rel="nofollow" href="https://www.instagram.com/kedroshop.ru/" class="socials-footer__icon _icon-insta" target="_blank"></a>
							<!-- <a rel="nofollow" href="#" class="socials-footer__icon _icon-odnoklassniki"></a> -->
							<a rel="nofollow" href="https://vk.com/kedroshopru" class="socials-footer__icon _icon-vk" target="_blank"></a>
						</div>
					</div>
				</div>
				<div data-spollers="768,max" class="top-footer__column">
						<div data-spoller class="top-footer__title">Каталог</div>

						<?php
					// 	<ul class="top-footer__list">
					// 	<li><a href="#" class="top-footer__link">Хиты продаж</a></li>
					// 	<li><a href="katalog-1.html" class="top-footer__link">Новинки</a></li>
					// 	<li><a href="#" class="top-footer__link">Скидки</a></li>
					// 	<li><a href="#" class="top-footer__link">Носки</a></li>
					// 	<li><a href="#" class="top-footer__link">Бандажи</a></li>
					// 	<li><a href="pillow.html" class="top-footer__link">Подушки</a></li>
					// 	<li><a href="#" class="top-footer__link">Стельки</a></li>
					// 	<li><a href="#" class="top-footer__link">Масла</a></li>
					// 	<li><a href="buy.html" class="top-footer__link">Купить оптом</a></li>
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
				'link_class'      => 'top-footer__link',
				'list_item_class'  => '',
				'items_wrap'      => '<ul id="%1$s" class="top-footer__list">%3$s</ul>',
				'depth'           => 0,
				'walker'          => '',
			]); ?>
				</div>
				<div data-spollers="768,max" class="top-footer__column ">
					<div data-spoller class="top-footer__title">информация</div>

					<?php
					// <ul class="top-footer__list ">
					// <li><a href="about.html" class="top-footer__link">О магазине</a></li>
					// <li><a href="delivery.html" class="top-footer__link">Оплата и доставка</a></li>
					// <li><a href="points.html" class="top-footer__link">Пункты выдачи</a></li>
					// <li><a href="garant.html" class="top-footer__link">Гарантии и возврат</a></li>
					// <li><a href="vacancies.html" class="top-footer__link">Вакансии</a></li>
					// <li><a href="#" class="top-footer__link">Сотрудничество</a></li>
					// <li><a href="reviews.html" class="top-footer__link">Статьи и обзоры</a></li>
					// </ul>
			//shop_menu меню
			wp_nav_menu([
				'menu'            => 'footer_info_menu',
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
				'link_class'      => 'top-footer__link',
				'list_item_class'  => '',
				'items_wrap'      => '<ul id="%1$s" class="top-footer__list">%3$s</ul>',
				'depth'           => 0,
				'walker'          => '',
			]); ?>
				</div>
				<div data-spollers="768,max" class="top-footer__column">
					<div data-spoller class="top-footer__title">контакты</div>
					<div class="top-footer__body">
						<a data-da=".footer__logo,768,2" href="mailto:<?php echo antispambot("kedrdo@yandex.ru");?>" class="top-footer__email"><?php echo antispambot("kedrdo@yandex.ru");?></a>
						<a data-da=".footer__logo,768,2" href="tel:+79260520348" class="top-footer__tel">+7 (926) 052-03-48</a>
						<div class="top-footer__location">Московская обл. 
							г. Мытищи <br>
							ул. Пролетарская, д.11</div>
						<a data-da=".footer__socials,768,2" href="<?php echo get_permalink(443);?>" class="top-footer__btn btn">Подробнее</a>
						<div data-da=".footer__bottom,768,0" class="top-footer__payment footer-peyment">
							<div class="footer-peyment__title">Способы оплаты:</div>
							<div class="footer-peyment__body">
								<div class="footer-peyment__icon"><img src="<?php bloginfo('template_url');?>/img/payment/01.png" alt=""></div>
								<div class="footer-peyment__icon"><img src="<?php bloginfo('template_url');?>/img/payment/02.png" alt=""></div>
								<div class="footer-peyment__icon"><img src="<?php bloginfo('template_url');?>/img/payment/03.png" alt=""></div>
								<div class="footer-peyment__icon"><img src="<?php bloginfo('template_url');?>/img/payment/04.png" alt=""></div>
								<div class="footer-peyment__icon"><img src="<?php bloginfo('template_url');?>/img/gpay.svg" height="24" alt="Google Pay" style="display: block; height:24px; width:auto; filter:grayscale(100%)"></div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="footer__bottom bottom-footer">
			<div class="bottom-footer__row">
				<div class="bottom-footer__copy">2021 kedroshop.ru online все права защищены
				<a href="https://apexweb.ru/" target="_blank" style="opacity:0.5; display:block">Сделано с ❤ APEXWEB</a>
				</div>
				<a href="<?php echo get_permalink(7108);?>" class="bottom-footer__polit">Политика обработки персональных данных</a>
			</div>
		</div>
	</div>
</footer> 
	

<div class="popup popup_massagename-message" id="thanks_email">
	<div class="popup__content">
		<div class="popup__body">
			<p>Ваше сообщение отправлено!</p>
			<div class="popup__close"></div>
		</div>
	</div>
</div>




<div class="popup popup_video" id="showme_video_1">
	<div class="popup__content">
		<div class="popup__body">
			<div class="popup__close popup__close_video"></div>
			<div class="popup__video _video"></div>
			<div class="popup__bg _ibg"><picture><source srcset="<?php bloginfo('template_url');?>/img/slide-bg.webp" type="image/webp"><img src="<?php bloginfo('template_url');?>/img/slide-bg.png" alt=""></picture></div>
		</div>
	</div>
</div>


<div class="popup popup_massagename-message" id="call_back_form">
	<div class="popup__content">
		<div class="popup__body">
			<div class="popup__close popup__close_video"></div>
			<h4 class="hits__title title">Заказать обратный звонок</h4>
			<?php echo do_shortcode( '[contact-form-7 id="8611" title="Обратный звонок"]' );?>
			<div class="popup__close"></div>
		</div>
	</div>
</div>

<?php wp_footer(); ?>
<script defer="defer" src="https://yastatic.net/share2/share.js"></script>
</body>
</html>