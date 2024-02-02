document.addEventListener('DOMContentLoaded', function () {

  // Инициализация первого слайдера
  if (document.querySelector(".swiper-container-1")) {
    var swiper_1 = new Swiper(".swiper-container-1", {
      slidesPerView: 1,
      spaceBetween: 30,
      loop: true,
      pagination: {
        el: ".swiper-pagination-1",
        clickable: !0
      },
      autoHeight: true,
    });
  }

  // Инициализация второго слайдера
  if (document.querySelector('.swiper-container-2')) {
    var swiper2 = new Swiper('.swiper-container-2', {
      spaceBetween: 30,
      effect: 'fade',
      loop: true,
      pagination: {
        el: '.swiper-pagination',
        clickable: true,
      },
      autoHeight: true,
    });
  }

  // Анимация для слайдов
  setInterval(function () {
    jQuery('.swiper-slide-active .swiper-slide__item-pic').addClass('animated');
    jQuery('.swiper-wrapper .swiper-slide__item-pic').addClass('animate__fadeOut');
    jQuery(".swiper-slide-next .swiper-slide__item-pic, .swiper-slide-prev .swiper-slide__item-pic").removeClass('animate__fadeOut');
  }, 5000); // предположительно задержка 5 секунд

  // Инициализация третьего слайдера
  if (document.querySelector(".swiper-container-3")) {
    var swiper_3 = new Swiper(".swiper-container-3", {
      slidesPerView: 3,
      spaceBetween: 30,
      freeMode: !0,
      loop: true,
      pagination: {
        el: ".swiper-pagination",
        clickable: !0
      },
      autoHeight: true,
    });
  }

  // Инициализация четвертого слайдера
  if (document.querySelector('.swiper-container-4')) {
    var swiper_5 = new Swiper('.swiper-container-4', {
      slidesPerView: 3,
      spaceBetween: 30,
      loop: true,
      pagination: {
        el: '.swiper-pagination-4',
        clickable: true,
      },
      autoHeight: true,
    });
  }

  // Инициализация шестого слайдера
  if (document.querySelector('.swiper-container-6')) {
    var swiper_6 = new Swiper('.swiper-container-6', {
      slidesPerView: 1,
      spaceBetween: 10,
      loop: true,
      pagination: {
        el: '.swiper-pagination-6',
        clickable: true,
      },
      breakpoints: {
        640: {
          slidesPerView: 1,
          spaceBetween: 20,
        },
        768: {
          slidesPerView: 4,
          spaceBetween: 40,
        },
        1024: {
          slidesPerView: 5,
          spaceBetween: 50,
        },
      }
    });
  }

  // Инициализация галереи
  if (document.querySelector(".gallery-thumbs") && document.querySelector(".gallery-top")) {
    var galleryThumbs = new Swiper(".gallery-thumbs", {
      spaceBetween: 10,
      slidesPerView: 4,
      loop: true,
      freeMode: !0,
      loopedSlides: 5,
      watchSlidesVisibility: !0,
      watchSlidesProgress: !0
    });
    var galleryTop = new Swiper(".gallery-top", {
      spaceBetween: 10,
      loop: true,
      loopedSlides: 5,
      navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev"
      },
      thumbs: {
        swiper: galleryThumbs
      }
    });
  }

  // Обработчики кликов для элементов управления
  jQuery("#nav-icon").click(function () {
    jQuery(this).toggleClass("open");
  });

  jQuery("body").on("click", ".menu-control__button", function () {
    jQuery(".header__bottom").toggleClass("show-nawigation");
    return false;
  });

  document.querySelector('.footer-email a[href^="mailto:"]').addEventListener('click', function () {
    ym(46896057, 'reachGoal', 'footerEmailClick');
  });

});
