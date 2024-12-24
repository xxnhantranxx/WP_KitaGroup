
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
        el: '.swiper-pagination',
        clickable: true,
        verticalClass: 'swiper-pagination-vertical',
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