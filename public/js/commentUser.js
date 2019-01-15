$(document).ready(function(){
  $("#formAjax").on('submit',function(e) {
    e.preventDefault();

    var author = $('#author').val();
    var commentUser = $('#commentUser').val();
    var postId = $('#postId').val();
    var showModal = $('#showModal').val();
    var dataString = 'author=' + author + '&commentUser=' + commentUser + '&postId=' + postId;
    // console.log(dataString);
    $.ajax({
      url: 'post/addComment/' + postId,
      type: "POST",
      data: dataString,

      success: function(){

            $("#messages").append("<p>" + author + " dit : " + commentUser + "</p>");
            // $("#messages").append("<button type='button' class='btn btn-primary btn-sm reporting' data-comment-id = '<?= $comment->getId() ?>' data-toggle='modal' data-target='#reportModal'>Signalez</button>")
            $('#author').val('');
            $('#commentUser').val('');
      },
      error: function(){
        console.log('erreur!');
      }
    });
  });
});
