// Signalement d'un commentaire pour qu'il soit éventuellement modéré
$(document).ready(function(){
  // Affichage de la fenêtre modale
  $('.reporting').click(function(e) {
    e.preventDefault();
    $(".modal-body").empty();
    $('.submit-reporting').attr("disabled", false);
    $('#commentId').val($(this).data('comment-id'));
  });

  // Signalement
  $('.submit-reporting').click(function(e) {
    e.preventDefault();
    var commentId = $('#commentId').val();
     
    $.post({
      url: 'posts/moderateComment/' + commentId,
      success: function(){
                  $(".modal-body").html("<p><b>Le signalement a été transmis !</b></p>");
                  $('.submit-reporting').attr("disabled", "disabled");
                  $('[data-comment-id = "'+commentId+'"]').hide();
                }
    });
  });
});
