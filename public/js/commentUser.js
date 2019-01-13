$(document).ready(function(){
  // $('.submit-commentUser').click(function(e) {
  $("#formAjax").on('submit',function(e) {
    e.preventDefault();
    // console.log($(this).serialize());

    var author = $('#author').val();
    var commentUser = $('#commentUser').val();
    var postId = $('#postId').val();
    console.log(commentUser);
    var dataString = 'author=' + author + '&commentUser=' + commentUser + '&postId=' + postId;

    $.ajax({
      url: 'post/addComment/' + postId,
      type: "POST",
      data: dataString,

      success: function(html){
        console.log('Hello');
        console.log(dataString);
        $("#messages").append("<p>" + author + " dit : " + commentUser + "</p>");
      },
      error: function(){
        console.log('erreur!');
      }
    });
  });
  // return false;
});
