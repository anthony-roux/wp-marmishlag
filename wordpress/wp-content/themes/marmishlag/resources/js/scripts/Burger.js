jQuery(document).ready(function ($) {
  $("#nav-burger").click(function () {
    $("#header__center").toggleClass("translate-x-full flex is-clicked");
    $("#header__ul").toggleClass("hidden");
    $(this).closest('.header').toggleClass("overflow-hidden");

  });

  $("#header__ul li").click(function () {
    $("#header__center").toggleClass("translate-x-full");
   
  });

  $("#header__ul .c-dropdown li").click(function () {
    $("#header__center").toggleClass("translate-x-full");
   
  });

});
