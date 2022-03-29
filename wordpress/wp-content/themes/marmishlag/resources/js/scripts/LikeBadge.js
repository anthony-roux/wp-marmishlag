jQuery(document).ready(function ($) {
  $(".c-card input[type='checkbox']").click(function () {
    if ($(this).is(":checked")) {
      $(this).addClass("isChecked");
      $(this).attr("data-state", "checked");
    } else if ($(this).is(":not(:checked)")) {
      $(this).removeClass("isChecked");
      $(this).attr("data-state", "unchecked");
    }
  });
});
