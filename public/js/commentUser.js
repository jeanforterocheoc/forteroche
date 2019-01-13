$(document).ready(function(){
  $('.submit-commentUser').click(function() {
    console.log('Hello');

    var author = $('#author').val();
    var content = $('#content').val();
    var postId = $('#postId').val();
    var dataString = 'author=' + author + '&content=' + content + '&postId=' + postId;
    $("#flash").show();
    $("#flash").fadeIn(400).html('<img src="../images/ajax-loader.gif" align="absmiddle">&nbsp;<span class="loading">Loading Comment...</span>');
    $.ajax({
      type: "POST",
      url: 'post/addComment' + postId,
      data: dataString,
      cache: false,
      success: function(html){
        $("ol#update").append(html);
        $("ol#update li:last").fadeIn("slow");
        document.getElementById('author').value='';
        document.getElementById('content').value='';
        $("#author").focus();
        $("#flash").hide();
      }
    });
  });
  return false;
});
