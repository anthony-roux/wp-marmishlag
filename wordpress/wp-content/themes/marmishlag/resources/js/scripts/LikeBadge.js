jQuery(document).ready(function ($) {
  const allCards = $(".c-card .card-likeable");
  // console.log(allCards);

  $(allCards).each(function () {
    $(this).on("click", function (e) {
      const likeId = $(this).prev().attr("data-id");
      var myInputs = $("[data-id=" + likeId + "]");
      $.ajax({

        url: '/wp-admin/admin-post.php',
        type: 'POST',
        data: `action=push_favorite&postId=${likeId}`,
        
        success: function(result){

    
        }
    
     });  

      for (let i = 0; i < myInputs.length; i++) {
        const element = myInputs[i];
        if ($(element).hasClass("favorite")) {
          $(element).prop("checked", "");
          $(element).toggleClass("favorite");
          $(element).closest("article.c-card").toggleeClass("cardIsLove");
        } else {
          $(element).prop("checked", "true");
          $(element).toggleClass("favorite");
          $(element).closest("article.c-card").toggleClass("cardIsLove");
        }
      }
      e.preventDefault();
    });
  });


       

return false;});
