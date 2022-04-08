jQuery(document).ready(function ($) {
  const allCardsMiniButton = $(".c-card-mini__btn");
  
  console.log(allCardsMiniButton);

  $(allCardsMiniButton).each(function() {
    $(this).on("click", function () {
      $(this).closest(".c-card--mini").toggleClass("card-mini-is-active")
      $(".card-mini-is-active .c-card--mini__back").removeClass("z-[-1]");
      $(".card-mini-is-active .c-card--mini__back").addClass("z-[11]");
      $(".card-mini-is-active h3").addClass("text-secondary");
      $(this).toggleClass("flex opacity-0");
    });
  });



});
