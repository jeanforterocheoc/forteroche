$(document).ready(function(){ 
    // A REVOIR actualisation du profil user SESSION
    $('.modifyUser').on('click', function(e){
        e.preventDefault();
          
        
         $('#userId').val($(this).data('user-id'));
         $('#username').val($(this).data('user-username'));
         $('#password').val($(this).data('user-password'));
         $('#email').val($(this).data('user-email'));

         // Modification du profil
         $('.submit-modifUser').on('click', function(e){
             var userId = $('#userId').val();
             var username = $('#username').val();
             var password = $('#password').val();
             var email = $('#email').val();

            // console.log(userId, username, password, email);
             $.ajax({
                 url:'user/modifyUser/',
                 type: 'POST',
                 cache: false,
                 data: {
                        userId:userId, 
                        username: username,  
                        password: password, 
                        email:email
                        },
                 
                 success: function() {
                            //  $(".modal-body").html("<p><b>Le profil a été modifié !</b></p>");
                            //  $(".modProfil").fadeIn('slow');
                            
                             
                         }  
             });
             e.preventDefault(); 

         });
         
    });
 });