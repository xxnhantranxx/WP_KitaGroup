var swiperPaginationData = JSON.parse(
    document.querySelector(".nhan-tran-pagination").getAttribute("data-nav")
);
var HomeBanner = new Swiper(".HomeBanner", {
    loop: true, // Bật chế độ vòng lặp vô hạn
    slidesPerView: 1,
    // slidesPerGroup: 3,
    spaceBetween: 0,
    navigation: {
        nextEl: '.swpier_prj-next',
        prevEl: '.swpier_prj-prev',
    },
    grabCursor: true,
    autoplay: {
        delay: 5000,
        disableOnInteraction: false,
    },
    // freeMode: true,
    pagination: {
        el: ".nhan-tran-pagination",
        clickable: true,
        renderBullet: function (index, className) {
            // Thêm số 0 nếu index + 1 nhỏ hơn 10
            const formattedIndex = (index + 1) < 10 ? "0" + (index + 1) : (index + 1);
            return '<span class="' + className + '">' + "<span class='_2rgx'>" + formattedIndex + "</span>" + swiperPaginationData[index] + '</span>';
        }
    },
    on: {
        slideChange: function () {
            // Đồng bộ hóa pagination phụ
            const activeIndex = this.realIndex; // Lấy chỉ số thực của slide
            const bullets = document.querySelectorAll(".swiper-pagination span");
            bullets.forEach((bullet, index) => {
                bullet.classList.toggle("active", index === activeIndex);
            });
        },
    },
    breakpoints: {
        640: { 
            slidesPerView: 1,
            spaceBetween: 0,
         },
        768: { 
            slidesPerView: 1,
            spaceBetween: 0,
         },
        1024: { 
            slidesPerView: 1,
            spaceBetween: 0, 
        },
    },
});

// Tạo pagination phụ
const nhanTranPagination = document.querySelector(".swiper-pagination");
swiperPaginationData.forEach((text, index) => {
    const bullet = document.createElement("span");
    bullet.className = "bullet";
    bullet.addEventListener("click", () => HomeBanner.slideToLoop(index)); // Thêm sự kiện click
    nhanTranPagination.appendChild(bullet);
});

var HomeSlideProduct = new Swiper(".HomeSlideProduct", {
    loop: true, // Bật chế độ vòng lặp vô hạn
    slidesPerView: 1,
    // slidesPerGroup: 3,
    spaceBetween: 16,
    navigation: {
        nextEl: '.cntt-button-next',
        prevEl: '.cntt-button-prev',
    },
    grabCursor: true,
    autoplay: {
        delay: 5000,
        disableOnInteraction: false,
    },
    // freeMode: true,
    // pagination: {
    //     el: '.swiper-pagination',
    //     clickable: true,
    // },
    breakpoints: {
        640: { 
            slidesPerView: 2,
            spaceBetween: 8, 
         },
        768: { 
            slidesPerView: 3,
            spaceBetween: 16,
         },
        1024: { 
            slidesPerView: 4,
            spaceBetween: 16,
        },
    },
});

var SubSlide11 = new Swiper(".SubSlide11", {
    loop: true,
    spaceBetween: 15,
    slidesPerView: 6,
    slideToClickedSlide: true,
    // autoplay: {
    //     delay: 2500,
    //     disableOnInteraction: false,
    // },
    navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
    },
    breakpoints: {
        320: { 
            slidesPerView: 2,
            spaceBetween: 3,
        },
        768: { 
            slidesPerView: 4,
            spaceBetween: 10,
        },
        1024: { 
            slidesPerView: 6,
            spaceBetween: 15, 
        },
    },
});
var MainSlide11 = new Swiper(".MainSlide11", {
    loop: true,
    spaceBetween: 0,
    effect: "fade",
    autoHeight: true,
    // autoplay: {
    //     delay: 2500,
    //     disableOnInteraction: false,
    // },
    navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
    },
    thumbs: {
      swiper: SubSlide11,
    },
});


// Cập nhật tiêu đề khi slide thay đổi
SubSlide11.on('transitionEnd', function () {
    var activeSlide = document.querySelector('.SubSlide11 .swiper-slide-active');
    if (activeSlide) {
        var heading = activeSlide.getAttribute('data-heading');
        document.getElementById('activeHeading').textContent = heading || '';

        var content = activeSlide.getAttribute('data-content');
        document.getElementById('activeContent').textContent = content || '';
    }
});

// Hiển thị tiêu đề ban đầu khi trang tải
document.addEventListener('DOMContentLoaded', function () {
    setTimeout(function () {
        var initialSlide = document.querySelector('.SubSlide11 .swiper-slide-active');
        if (initialSlide) {
            var initialHeading = initialSlide.getAttribute('data-heading');
            document.getElementById('activeHeading').textContent = initialHeading || '';

            var initialContent = initialSlide.getAttribute('data-content');
            document.getElementById('activeContent').textContent = initialContent || '';
        }
    }, 1500); // Delay nhẹ để Swiper khởi tạo xong
});

// Lắng nghe sự kiện click trên mỗi slide
document.querySelectorAll('.SubSlide11 .swiper-slide').forEach(function (slide) {
    slide.addEventListener('click', function () {
        // Lấy tiêu đề từ thuộc tính data-heading của slide được click
        var heading = this.getAttribute('data-heading');
        // Cập nhật nội dung ra phần tử #activeHeading
        document.getElementById('activeHeading').textContent = heading || '';

        var content = this.getAttribute('data-content');
        // Cập nhật nội dung ra phần tử #activeHeading
        document.getElementById('activeContent').textContent = content || '';
    });
});

var Sun_SlideCard = new Swiper(".Sun_SlideCard", {
    loop: true,
    effect: "coverflow",
    grabCursor: true,
    centeredSlides: true,
    slidesPerView: "auto", // Điều chỉnh để các slide bên ngoài chỉ hiện ra một phần
    slideToClickedSlide: true,
    coverflowEffect: {
        rotate: 0,
        stretch:150, // Khoảng cách các slide gần lại
        depth: 200, // Tạo chiều sâu, làm nổi bật slide trung tâm
        modifier: 3, // Tăng kích thước tương đối của slide trung tâm
        slideShadows: true, // Bật bóng cho các slide
    },
    pagination: {
        el: ".swiper-pagination",
        clickable: true,
    },
    navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
    },
});

var SubSlide11 = new Swiper(".ContentSeclect5", {
    loop: true,
    spaceBetween: 15,
    slidesPerView: 2,
    slideToClickedSlide: true,
    navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
    },
    breakpoints: {
        320: { 
            slidesPerView: 1,
            spaceBetween: 3,
        },
        768: { 
            slidesPerView: 2,
            spaceBetween: 10,
        },
        1024: { 
            slidesPerView: 2,
            spaceBetween: 15, 
        },
    },
});
var MainSlide11 = new Swiper(".ContentSeclect5thumb", {
    loop: true,
    spaceBetween: 0,
    effect: "fade",
    autoHeight: true,
    autoplay: {
        delay: 2500,
        disableOnInteraction: false,
    },
    thumbs: {
      swiper: SubSlide11,
    },
});