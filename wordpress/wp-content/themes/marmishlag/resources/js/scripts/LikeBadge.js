jQuery(document).ready(function ($) {


  $(".c-card input[type='checkbox']").click(function () {
    if ($(this).is(":checked")) {
      $(this).addClass("isChecked");
      $(this).attr("data-state", "checked");
      let isChecked = $(this).is(":checked"); 
      $(this).attr("checked");
      $(this).closest("article.c-card").addClass("cardIsLove");

      localStorage.setItem('checked', isChecked);
  
    } else if ($(this).is(":not(:checked)")) {
      $(this).removeClass("isChecked");
      $(this).attr("data-state", "unchecked");
      $(this).closest("article.c-card").removeClass("cardIsLove");
    }
  });

  // stored in localStorage as string, `toggle` needs boolean
let isChecked = localStorage.getItem('checked') === 'false' ? false : true;
$(".c-card input[type='checkbox']").toggle(isChecked);
});
