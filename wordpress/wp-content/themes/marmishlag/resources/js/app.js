// Navigation toggle
jQuery(document).ready(function ($) {
  const main_navigation = $("#primary-menu");

  $("#primary-menu-toggle").on("click", function (e) {
    e.preventDefault();

    main_navigation.toggleClass("hidden");
  });
});
