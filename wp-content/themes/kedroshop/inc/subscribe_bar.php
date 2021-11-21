<div class="subscribe">
	<div class="subscribe__bg _ibg">
		<picture>
			<source srcset="<?php bloginfo('template_url'); ?>/img/sub-img.webp" type="image/webp"><img src="<?php bloginfo('template_url'); ?>/img/sub-img.jpg" alt="">
		</picture>
	</div>
	<div class="subscribe__body">
		<div class="subscribe__title title">Подписаться на новости</div>
		<div class="subscribe__subtitle">Узнавайте первыми о наших новинках и акциях</div>
		<div  class="subscribe__form form-subscribe">
			<div class="form-subscribe__line">
				<!-- <input autocomplete="off" type="text" name="form[]" data-error="Ошибка" data-value="Введите e-mail" class="form-subscribe__input _email ">
				<button type="submit" class="form-subscribe__btn btn">Подписаться</button> -->
				<?php echo do_shortcode( '[mailpoet_form id="4"]' );?>
			</div>
</div>
		<div class="subscribe__subtext">Отправляя данные, вы соглашаетесь с <a href="<?php echo get_permalink(7108); ?>">политикой
				конфиденциальности</a></div>
	</div>
</div>