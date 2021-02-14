(function ($) {
  "user strict";
  // Preloader Js
  $(window).on('load', function () {
    $('.loader').fadeOut(1000);
    var img = $('.bg_img');
    img.css('background-image', function () {
      var bg = ('url(' + $(this).data('background') + ')');
      return bg;
    });
  });
  $(document).ready(function () {
    $('.select-bar').niceSelect();
    $('.faq-wrapper .faq-title').on('click', function (e) {
      var element = $(this).parent('.faq-item');
      if (element.hasClass('open')) {
        element.removeClass('open');
        element.find('.faq-content').removeClass('open');
        element.find('.faq-content').slideUp(300, "swing");
      } else {
        element.addClass('open');
        element.children('.faq-content').slideDown(300, "swing");
        element.siblings('.faq-item').children('.faq-content').slideUp(300, "swing");
        element.siblings('.faq-item').removeClass('open');
        element.siblings('.faq-item').find('.faq-title').removeClass('open');
        element.siblings('.faq-item').find('.faq-content').slideUp(300, "swing");
      }
    });
    $('.games__step__item .step__title').on('click', function (e) {
      var step = $(this).parent('.games__step__item');
      if (step.hasClass('open')) {
        step.removeClass('open');
        step.find('.step__body').slideUp(300, "swing");
      } else {
        step.addClass('open');
        step.children('.step__body').slideDown(300, "swing");
      }
    });
    $("ul>li>.submenu").parent("li").addClass("menu-item-has-children");
    $('.header-bar').on('click', function () {
      $(this).toggleClass('active');
      $('.overlay').toggleClass('active');
      $('.menu').toggleClass('active');
      $('.right__menu').removeClass('active');
    })
    $('.right__menu_show').on('click', function () {
      $('.right__menu').toggleClass('active');
      $('.menu').removeClass('active');
    })
    $('.overlay').on('click', function () {
      $(this).removeClass('active');
      $('.header-bar').removeClass('active');
      $('.menu').removeClass('active');
    })
    var scrollPosition = window.scrollY;
    if (scrollPosition >= 1) {
      $("header").addClass('active');
    }
    var header = $("header");
    $(window).on('scroll', function () {
      if ($(this).scrollTop() < 1) {
        header.removeClass("active");
      } else {
        header.addClass("active");
      }
    });
    $('.banner-slider').owlCarousel({
      loop: false,
      responsiveClass: true,
      nav: true,
      dots: true,
      autoplay: true,
      autoplayTimeout: 1500,
      autoplayHoverPause: true,
      autoHeight:true,
      items:1,
      animateOut: 'fadeOutRight',
      animateIn: 'fadeInRight',
      navText: ['<i class="las la-angle-left"></i>','<i class="las la-angle-right"></i>']
    })
    $('.social-icons li a').on('mouseover', function(e) {
      var social = $(this).parent('li');
      if(social.children('a').hasClass('active')) {
        social.siblings('li').children('a').removeClass('active');
        $(this).addClass('active');
      } else {
        social.siblings('li').children('a').removeClass('active');
        $(this).addClass('active');
      }
    });
  });
})(jQuery);
