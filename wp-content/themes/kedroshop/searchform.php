<form role="search" method="get" id="searchform" action="<?php echo home_url('/'); ?>">
    <div><label class="screen-reader-text" for="s"><?php __('Search for:'); ?></label></div>

    <input autocomplete="off" type="text" data-error="Ошибка" data-value="Я ищу" class="page-top__input" id="s" name="s" value="<?php get_search_query(); ?>">
    <button type="submit" id="searchsubmit" class="page-top__search">
        <picture>
            <source srcset="<?php bloginfo('template_url'); ?>/img/search.webp" type="image/webp"><img src="<?php bloginfo('template_url'); ?>/img/search.webp" alt="">
        </picture>
    </button>
</form>