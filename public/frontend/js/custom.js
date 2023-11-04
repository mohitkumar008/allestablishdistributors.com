$(document).ready(function () {
  $(window).scroll(function () {
    var scrollTop = $(window).scrollTop();
    if (scrollTop > 249) {
      $(".header").addClass("fadeOutLeft");
      $(".header").removeClass("fadeInLeft");

      $(".header-sticky").addClass("fadeInDown");
      $(".header-sticky").addClass("d-block");
      $(".header-sticky").removeClass("fadeOutUp");
      $(".header-sticky").addClass("animated");
    } else {
      $(".header").addClass("fadeInLeft");
      $(".header").removeClass("fadeOutLeft");
      $(".header-sticky").addClass("d-none");
      $(".header-sticky").addClass("fadeOutUp");
      $(".header-sticky").removeClass("fadeInUp");
    }
  });

});

$(function () {
  $(".toggle-menu").click(function () {
    $(".exo-menu").toggleClass("display");
  });
});


