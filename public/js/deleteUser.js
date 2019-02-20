// Suppression d'un profil utilisateur dans la partie administration
$(document).ready(function(){ 
  $('.deleteUser').on('click', function(){  
    // Récupération de l'id du profil
    $('#userId').val($(this).data('user-id'));
    
    // Suppression du profil
    $('.submit-delete').on('click', function(){
        var userId = $('#userId').val();
        
        $.ajax({
          url:'user/deleteUser/' + userId,
          type: 'POST',
          cache: false,
          success: function() {
                      $(".modal-body").html("<p><b>Le profil a été supprimé !</b></p>");
                      $(".deleteProfile" + userId).fadeOut('slow');   
                    }   
        });   
     }); 
  });
});