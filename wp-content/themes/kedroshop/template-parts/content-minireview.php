<?php
if (has_post_thumbnail()) {
    // $thumb = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID('large')));
    // $url = $thumb[0];
    $thumbnail = get_the_post_thumbnail($id, 'large');
} ?>


<div class="reviews__column_row">
    <div class="rewiews__item item-reviews">
        <div class="left_col">
            <a href="<?php echo esc_url(get_permalink()); ?>">
                <div class="reviews__mini_img">
                    <?php echo $thumbnail; ?>
                </div>
            </a>
        </div>
        <div class="right_col"><?php the_title('<a class="item-reviews__title" href="' . esc_url(get_permalink()) . '">', '</a>'); ?>
            <?php 

                echo '<!--mini content-->';
                echo '<p class="main_content"><a href="' . get_permalink() . '">';
                the_excerpt();
                echo '</a></p>';
                echo '<p><a href="' . get_permalink() . '">Подробнее&hellip;</a></p><!--morelink-->';

            ?>
            <div class="bottom_row"><span class="entry-date"><?php echo get_the_date(); ?></span><span class="comment-content"><img alt="<?php comments_number(); ?>" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAYAAAAf8/9hAAAABmJLR0QA/wD/AP+gvaeTAAAAmUlEQVQ4jcXTsQkCQRBG4c/zEC1Ci1C0CRvQ2AbsQYswN7vswMzMXEFL0BIM5DKD2+CQC2QXcaI3C++fYWBJrA7WmEf6BygTFigzVAkBVZYgg58EzHANvMUm8A3TtpDiox9gHHiEYeAJ+p9u3hL4wiXwvfF+bpv+/yPm6OGIk/pgC6y+9J/NpsASe3RjtnmkyLBTf67oipr8BgHtFOk/rjDiAAAAAElFTkSuQmCC" /><?php echo get_comments_number_text('0','1','%');?></span><span class="comment_views"><img alt="" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAYAAAAf8/9hAAAAGXRFWHRTb2Z0d2FyZQBBZG9iZSBJbWFnZVJlYWR5ccllPAAAAbpJREFUeNrUk8FKAlEUhu9oqRQ2JCG0UBgNWijWQkFhiAqaXERLceE21+16A1+gRQshCFy5MGiTCROBguEqzGkVI0kgumihOKQw3f4zOL2Aqw58MHPv+f9zzr0zAuecLRIOtmAsbCAgrIf5KGtgHyggBHzzvC+ggxp4AiNbZxsIMDh1u91niqJs5XI5v6Zpq41Gw0WbsizPIpHIpFQqDWu12vt0Oi1Cd0d1aQQPOE8kEhf1el2uVCrbpmmuBwIB12RiMAIiF63RHuVQLmksrdPpTKPq42AwmBqGwQlVVTlFsXjNZfmAK8oJR1fc3qdc0pB2CS7ZZDLpQ/uu2WxmzVUoFFDZZJeXV9Z7OBxln59vzN6nXNKgUJYMblqt1vpoNNr2IChBkiSmqk2WSh1ZAo/HzZaXpT+DbwQ0H6R1OhyOfrfb/Wk2m2Y8Ht8QRdGLeZmmvbJQaIeJog/VNXZ4uGcZ67rez+fz9ziLW7oVAXPYV5FEA8fpdDqayWSivV5vs91ue6liLBYbB4PBfrlc7lSr1Q4aeMDyM52TbWB/FysgAnaBH3jn62MwBC9AA4b97Qj//19Y2OBXgAEA3HnRUkre/J0AAAAASUVORK5CYII=" /><?php if(function_exists('the_views')) { the_views(); } ?><span></div>
        </div>

    </div>
</div>