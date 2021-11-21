// The code is valid=================================================
$(".woocommerce-result-count").appendTo("#result_count");

function enable_update_cart() {
  $('[name="update_cart"]').removeAttr("disabled").hide();
}

function quantity_step_btn() {
  var timeoutPlus;
  $(".quantity__button_plus")
    .one()
    .on("click", function () {
      $input = jQuery(this).prev(".quantity__input").children("input.qty");
      var val = parseInt($input.val());
      var step = $input.attr("step");
      step = "undefined" !== typeof step ? parseInt(step) : 1;
      $input.val(val + step).change();

      if (timeoutPlus != undefined) {
        clearTimeout(timeoutPlus);
      }
      timeoutPlus = setTimeout(function () {
        $('[name="update_cart"]').trigger("click");
      }, 1000);
    });

  var timeoutMinus;
  $(".quantity__button_minus")
    .one()
    .on("click", function () {
      $input = jQuery(this).next(".quantity__input").children("input.qty");
      var val = parseInt($input.val());
      var step = $input.attr("step");
      step = "undefined" !== typeof step ? parseInt(step) : 1;
      if (val > 1) {
        $input.val(val - step).change();
      }

      if (timeoutMinus != undefined) {
        clearTimeout(timeoutMinus);
      }
      timeoutMinus = setTimeout(function () {
        $('[name="update_cart"]').trigger("click");
      }, 1000);
    });

  var timeoutInput;
  jQuery("div.woocommerce").on("change", ".qty", function () {
    if (timeoutInput != undefined) {
      clearTimeout(timeoutInput);
    }
    timeoutInput = setTimeout(function () {
      $('[name="update_cart"]').trigger("click");
    }, 1000);
  });
}

$(document).ready(function () {
  //scroll to top
  $(window).scroll(function (event) {
    event.preventDefault();
    if ($(this).scrollTop()) {
      $("#toTop").fadeIn();
    } else {
      $("#toTop").fadeOut();
    }
  });

  $("#toTop").click(function () {
    $("html, body").animate({ scrollTop: 0 }, 1000);
  });
  ///////////////

  if (typeof $("select.woovr-variation-select") !== "undefined") {
    $(".woocommerce-variation-price").hide();
    var optionSelected = $(this).find("option:first");
    optionSelected.attr("selected", true);
    optionSelected.click();
    var valueSelected = optionSelected.val();
    var textSelected = optionSelected.attr("data-pricehtml");
    $(
      "main.page .pillow.product.type-product .pillow__container._container .pillow__row .pillow__column.pillow__column_big .pillow__body.body-pillow .pillow__price p.price"
    ).html(textSelected);
  }

  $("select.woovr-variation-select").on(
    "click, focus, blur, change",
    function () {
      $(".woocommerce-variation-price").hide();
      var optionSelected = $(this).find("option:selected");
      var valueSelected = optionSelected.val();
      var textSelected = optionSelected.attr("data-pricehtml");
      $(
        "main.page .pillow.product.type-product .pillow__container._container .pillow__row .pillow__column.pillow__column_big .pillow__body.body-pillow .pillow__price p.price"
      ).html(textSelected);
    }
  );
  $("select.woovr-variation-select").on("show_variation", function () {
    $(".woocommerce-variation-price").attr("style", "display:none");
  });

  enable_update_cart();
  quantity_step_btn();

  $("#tab-title-description").trigger("click");

$(window).on('load',function () {
  setTimeout(function () {
    $(".woocommerce-message").fadeOut("fast");
  }, 5000); // <-- time in mseconds
});

  $(document.body).on("updated_wc_div,removed_from_cart", function () {
    setTimeout(function () {
      $(".woocommerce-message").fadeOut("fast");
    }, 5000); // <-- time in mseconds
  });

  $("a.add_to_cart_button").click(function () {
    $this = $(this);
    $(document.body).on("added_to_cart", function () {
      // $($this).removeClass("_adding");
      $($this).closest(".hits-slide").css("opacity", "");
      // $($this).addClass("_added");
    });
    $(document.body).on("adding_to_cart", function () {
      $($this).closest(".hits-slide ").css({"opacity":"0.2",'cursor':'default'});
      // $($this).addClass("_adding");
    });
  });

  //modal video1
  $(".showme_video_1").on("click", function (event) {
    event.preventDefault();
    $this = $(this);
    $("#showme_video_1").addClass("_active");
    $("#showme_video_1")
      .find(".popup__video._video")
      .append(
        '<iframe src="https://www.youtube.com/embed/kvcEQNj8EeQ" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>'
      );
  });

  //modal menu
  $("#btn_mobile_menu").on("click", function (event) {
    event.preventDefault();
    $this = $(this);
    $("#mobile__cat_menu").addClass("_active");
    $(".mobile__cat_menu").fadeIn();
  });
  //modal callback
  $(".call_back_form").on("click", function (event) {
    event.preventDefault();
    $this = $(this);
    $("#call_back_form").addClass("_active");
  });
});

jQuery(document).on("updated_cart_totals", function () {
  enable_update_cart();
  quantity_step_btn();
});

document.addEventListener(
  "wpcf7mailsent",
  function (event) {
    if (
      "7781" == event.detail.contactFormId ||
      "7817" == event.detail.contactFormId
    ) {
      // Change 123 to the ID of the form
      jQuery("#thanks_email").addClass("_active"); //this is the bootstrap modal popup id
    }

    if ("8611" == event.detail.contactFormId) {
      // Change 123 to the ID of the form
      jQuery("#call_back_form")
        .find(".popup__body")
        .html(
          '<div class="page-slide__title"><span>Мы скоро Вам перезвоним</span></div>'
        );
      jQuery("#call_back_form").delay(3000).fadeOut(1000);
    }
  },
  false
);
// The code is valid=================================================

// SEARCH COPY

// The code is valid=================================================

const search = document.querySelector(".page-top__search_btn");
const searchBody = document.querySelector(".page-top__search_body");
const searchRemove = document.querySelector(".page-top__search_remove");

search.addEventListener("click", function (e) {
  e.stopPropagation();
  console.log('search clicked');
  searchBody.classList.add("_active");
});

searchRemove.addEventListener("click", function (e) {
  e.stopPropagation();

  searchBody.classList.remove("_active");
});

// The code is valid=================================================

//activate burger menu
$(".icon-menu-second").on("click", function (e) {
  e.preventDefault();
  $(".icon-menu").click();
});
//

$("#wpmtst-submission-form")
  .find('input[type="text"], input[type="email"],input[type="url"], textarea')
  .addClass("input");
$("#wpmtst-submission-form").find('input[type="submit"]').addClass("btn");

// HEADER SCROLL
var jsHeader = $(".js-header");

jsHeader.addClass("header--fixed");

$(window).scroll(function () {
  if ($(window).scrollTop() > 50) {
    jsHeader.addClass("header--is-show");
  } else {
    jsHeader.removeClass("header--is-show");
  }
});

// var asideScroll = $('.page__side');

// $(window).scroll(function () {

//   if ($(window).scrollTop() > 50) {
//     asideScroll.addClass('aside--scroll');
//   } else {
//     asideScroll.removeClass('aside--scroll');
//   }

// });

// $(function () {
//   $('.js-header__body').click(function () {
//     $('.js-header__burger').toggleClass('_active');
//     $('.js-header__content').toggleClass('active');

//     if ($(".js-header__content").hasClass("active")) {
//       $('.js-header__content').fadeIn(1000);
//     } else {
//       $(".js-header__content").fadeOut(1000);
//     }
//   });
// });

$(function () {
  $(".js-header__menu").click(function () {
    $(".js-header__burger").toggleClass("_active");
    $(".js-header__content").toggleClass("active");

    if ($(".js-header__content").hasClass("active")) {
      $(".js-header__content").fadeIn(1000);
    } else {
      $(".js-header__content").fadeOut(1000);
    }
  });
});

var pageContent = $(".page__content");
var jsHeaderMenu = $(".js-header__menu");
$(window).scroll(function () {
  if ($(window).scrollTop() > 600) {
    jsHeaderMenu.fadeIn(750);
  } else {
    jsHeaderMenu.fadeOut(400);
    $(".js-header__content").fadeOut(400);
  }
});

var pageContent = $(".page__content");
$(document).ready(function () {
  $(".js-header__menu").click(function () {
    if (pageContent) {
      pageContent.appendTo(".page__container");
      pageContent = null;
    } else if(pageContent != null) {
      pageContent.replaceWith();
      // pageContent = true;
    }
  });
});

// $(init);

// function init() {
//   var pageContent = $(".page__content")

//   // Assign a click event to each div's paragraph
//   $(".js-header__menu").click(function () {
//     if (pageContent) {
//       pageContent.appendTo(".page__container");
//       // pageContent = null;

//     }
//     else {
//       pageContent.detach();
//       // pageContent = true;

//     }
//   });

// }

// var pageContent = $(".page__content")
// $('.js-header__menu').click(function () {
//   if ($('.page__content').length > 0) {
//     pageContent.detach();

//   } else {
//     pageContent.appendTo(".page__container");
//   }
// });

//       // if ($('div').is('.page__content')) {
//       //   pageContent.appendTo(".page__container");
//       //   pageContent.detach();
//       // }
//       // else {
//       // }

// var pageContent = $(".page__content")
// $(document).ready(function () {
//   $('.js-header__menu').click(function () {
//     if (pageContent) {
//       pageContent.appendTo(".page__container");
//       pageContent = null;

//     }else {

//       pageContent.detach();
//     }

//   })
// });

$(document.body).on("updated_wc_div", function () {
  console.log("let hide this");

  setTimeout(function () {
    jQuery(".woocommerce-message").fadeOut("fast");
  }, 5000);
});

$(document).ready(function () {
  jQuery.cachedScript = function (url, options) {
    options = $.extend(options || {}, {
      dataType: "script",
      cache: true,
      url: url,
    });
    return jQuery.ajax(options);
  };
  console.log($(location).attr("href"));

  $(window).one("click", function (event) {
    console.log('bitrix loading...');
    
    $.cachedScript(
      "https://cdn-ru.bitrix24.ru/b18514142/crm/site_button/loader_1_ciar85.js"
    ).done(function (script, textStatus) {
      console.log("bitrix is " + textStatus);
      $(".b24-widget-button-wrapper").appendTo(".bitrix");
      $(".b24-widget-button-wrapper").css({
        position: "relative",
        left: "0",
        top: "0",
      });
      $(".b24-widget-button-block").css({
        width: "50px",
        height: "50px",
      });
      $(".b24-widget-button-inner-block").css({ height: "50px" });
      $(".b24-widget-button-inner-mask").hide();
      $(
        ".b24-widget-button-inner-container, .bx-touch .b24-widget-button-inner-container"
      ).css({ transform: "scale(1)" });
    });
  });

  function ym_load() {
    $.cachedScript("https://mc.yandex.ru/metrika/tag.js").done(function (
      script,
      textStatus
    ) {
      (function (m, e, t, r, i, k, a) {
        m[i] =
          m[i] ||
          function () {
            (m[i].a = m[i].a || []).push(arguments);
          };
        m[i].l = 1 * new Date();
        (k = e.createElement(t)),
          (a = e.getElementsByTagName(t)[0]),
          (k.async = 1),
          (k.src = r),
          a.parentNode.insertBefore(k, a);
      })(
        window,
        document,
        "script",
        "https://mc.yandex.ru/metrika/tag.js",
        "ym"
      );

      ym(71941702, "init", {
        clickmap: true,
        trackLinks: true,
        accurateTrackBounce: true,
        webvisor: true,
        ecommerce: "dataLayer",
      });
      console.log("ym loaded " + textStatus);
    });
    console.log('ym done');
  }

  if (
    navigator.userAgent.indexOf("YandexBot") > -1 ||
    navigator.userAgent.indexOf("YandexMetrika") > -1
  ) {
    console.log('ym loading...');
    ym_load();
  } else if ($(location).attr("href") == "https://kedroshop.ru/") {
    $(window).one("scroll", function (event) {
      // event.preventDefault();
      window.setTimeout(function () {
        console.log('ym loading timeout...');
        ym_load();
      }, 15000);
    });
  } else {
    console.log('ym loading...');
    ym_load();
  }

$('.show_more').on('click',function(){
  
  $('.show_more').slideToggle(500, function () {
    $('.extended_part').slideToggle();  
  });
  

});

});
