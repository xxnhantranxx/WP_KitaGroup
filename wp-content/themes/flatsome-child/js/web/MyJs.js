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

    $(window).on('scroll', function () {
        $('.VideoWebsite').each(function () {
            var videoElement = $(this).find('video')[0];
            var offsetTop = $(this).offset().top; // Vị trí phần tử so với đầu trang
            var windowHeight = $(window).height(); // Chiều cao cửa sổ trình duyệt
            var scrollTop = $(window).scrollTop(); // Vị trí cuộn hiện tại của trang

            // Kiểm tra nếu phần tử nằm trong tầm nhìn cộng thêm 300px
            if (scrollTop + windowHeight >= offsetTop + 300) {
                if (videoElement && videoElement.paused) {
                    videoElement.play(); // Tự động phát video
                }
            }
        });
    });
});
