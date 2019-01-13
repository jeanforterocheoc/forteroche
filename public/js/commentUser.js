setInterval(function(){
  $("#comments_user").load("PostController.php",function(){});
},1000);

$("#submit").click(function(){
  var name = $("#name").val();
  var message = $("#message").val();

  $("name").val("");
  $("message").val("");

  $.ajax({
    async: false,
    type: 'GET',
    url: 'post/postComment?name='+name+'&message='+message
  });

});
