// Navigation toggle
jQuery(document).ready(function ($) {
  const main_navigation = jQuery("#primary-menu");

  jQuery("#primary-menu-toggle").on("click", function (e) {
    e.preventDefault();

    main_navigation.toggleClass("hidden");
  });
  $(function () {
    $(".btn").click(function () {
      $(".form-signin").toggleClass("form-signin-left");
      $(".form-signup").toggleClass("form-signup-left");
      $(".frame").toggleClass("frame-long");
      $(".signup-inactive").toggleClass("signup-active");
      $(".signin-active").toggleClass("signin-inactive");
      $(".forgot").toggleClass("forgot-left");
      $(this).removeClass("idle").addClass("active");
    });
  });
});
