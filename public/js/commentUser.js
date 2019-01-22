$(document).ready(function(){
  $("#formAjax").on('submit',function(e) {
    e.preventDefault();

    var author = $('#author').val();
    var commentUser = $('#commentUser').val();
    var postId = $('#postId').val();
    var dataString = 'author=' + author + '&commentUser=' + commentUser + '&postId=' + postId;
    
    $.ajax({
      url: 'post/addComment/' + postId,
      type: "POST",
      data: dataString,

      success: function(){

            $("#messages").append("<p>" + author + " dit : " + commentUser + "</p>");
            $('#author').val('');
            $('#commentUser').val('');
      },
      error: function(){
        console.log('erreur!');
      }
    });
  });
});


