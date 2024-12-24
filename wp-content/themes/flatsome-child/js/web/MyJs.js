jQuery(document).ready(function ($) {
    var widthWindow = $(window).width();
    wow = new WOW({
        boxClass: "wow", // default
        animateClass: "animated", // default
        offset: 0, // default
        mobile: true, // default
        live: true, // default
    });
    wow.init();
    $(".header-nav-main .menu-item a").each(function () {
        var text = $(this).text();
        $(this).html("<span>" + text + "</span>");
        $(this).children("span").attr("data-hover", text);
    });

    $(".GroupProducts .item-stack").hover(
        function () {
            // over
            $(".GroupProducts .item-stack").removeClass("active");
            $(this).addClass("active");
            },
            function () {
            // out
            $(".GroupProducts .item-stack").removeClass("active");
        }
    );

    $('._4nyh').click(function(){
        $('._6vbq').hide();
        $('._1dfv').show();
    });

    $(".fl-input").each(function () {
        if ($(this).val()) {
          $(this).closest(".fl-wrap-input").addClass("has-value");
        } else {
          $(this).closest(".fl-wrap-input").removeClass("has-value");
        }
      });
      $(".fl-input").on("keyup change", function(){
          if ($(this).val()) {
              $(this).closest(".fl-wrap-input").addClass("has-value");
          } else {
              $(this).closest(".fl-wrap-input").removeClass("has-value");
          }
      });
});
