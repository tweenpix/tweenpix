<div class="content-page__top page-top">
	<div data-da=".header__container,768,2" class="page-top__row">
		<div class="page-top__column">
			<div data-da=".header__container,768,1" class="page-top__inputs">
				<!-- <a href="#" class="page-top__search_btn" > <svg focusable="false" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24px"><path d="M15.5 14h-.79l-.28-.27C15.41 12.59 16 11.11 16 9.5 16 5.91 13.09 3 9.5 3S3 5.91 3 9.5 5.91 16 9.5 16c1.61 0 3.09-.59 4.23-1.57l.27.28v.79l5 4.99L20.49 19l-4.99-5zm-6 0C7.01 14 5 11.99 5 9.5S7.01 5 9.5 5 14 7.01 14 9.5 11.99 14 9.5 14z"></path></svg></a> -->
				<div data-da=".page-top__search_body,768,0" class="page-top__search_conteiner">
					<?php //get_search_form();
					//echo do_shortcode( '[aws_search_form]' );
					echo do_shortcode( '[ivory-search id="11224" title="frontpage"]' );
					?>

				</div>

				<div class="page-top__search_body">
					<a href="#" class="page-top__search_remove"></a>
				</div>  
			</div>
		</div>

		<div data-da=".header__container,768,2" class="page-top__column page-top__column_adapt">
			<div class="page-top__icons ">
			<a href="<?php echo get_permalink( get_option('woocommerce_myaccount_page_id') ); ?>" title="Личный кабинет" class="page-top__icon page-top__icon_acc page-top__icon_adapt"></a>
				<?php echo do_shortcode('[ti_wishlist_products_counter]');?>
				<?php //woocommerce_mini_cart();
				?>
				<a href="<?php echo esc_url(wc_get_cart_url()); ?>" class="page-top__icon page-top__icon_basket page-top__icon_basket_adapt">
					<div class="page-top__label"><span class="count_cart"></span></div>
					<img src="<?php bloginfo('template_url'); ?>/img/cart.svg" alt="Корзина">
				</a>
			</div>
		</div>
	</div>
</div>
