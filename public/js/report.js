// $('.form-disabled').on('submit', function(){
//     console.log('submitted');
//     var self = $(this),
//         button = self.find('input[type="submit"], button'),
//         submitValue = button.data('submit-value');


//         button.attr('disabled', 'disabled').val("En cours...");
// //         button.attr('disabled', 'disabled').val((submitValue) ? submitValue : 'Traitement en cours...');
        

//     // return false; // stop le traitement du formulaire pour visualiser console.log
// });

//////////////////////////////////////////////////////////////////////////////////////////////////////////


// $(document).ready(function()
//     {
//             // alert("hello!!!!")
//         $('#btnReport').click(function()
//         {
//                 $.ajax({
//                     type: "POST",
//                     url: '/blog_forteroche/post/moderateComment/id',
//                     // url: 'C:\\wamp64\\www\\blog_forteroche\\app\\models\\manager\\CommentManager.php',
//                     // url: '/blog_forteroche/app/models/manager/CommentManager.php',


//                     data: 'comment_report='+$(this).val(),
//                     // beforeSend: function(){
//                     //     $('#')
//                     // },
                            

//                     success : function(resultat){
                       
//                             console.log(resultat);
//                             $('#resultat').html("<p>Le signalement a été transmis ! </p>")
                            
                            
                        
//                         // alert(response)
//                     },
//                     error : function(xhr, ajaxOptions, thrownError){
//                         var errorMsg = 'Ajax request failed: ' + xhr.responseText;
//                         $('#resultat').html(errorMsg);
//                     } 
//                 }); 
//                 $(this).delay(1200,function(){            
//                     $(this).attr("disabled", "disabled");
//                 }); 
//         });
//     });

//////////////////////////////////////////////////////////////////////////////////////////////
// $("form#data").submit(function(e){
    

//     var formData = new FormData($(this)[0]);
//     $.ajax({
//         url: '/blog_forteroche/post/moderateComment/id',
//         type: 'POST',
//         data: formData,
//         // async: false,
//         cache: false,
//         contentType: false,
//         processData: false,
//         success: function (returndata) {
//             alert(returndata);
//             // $(this).attr("disabled", "disabled");
//         }

//     });
//     $(this).attr("disabled", "disabled");
//     // e.preventDefault();

//     // return false;
// });
//////////////////////////////////////////////////////////////////////////////////////
$("#multiform").submit(function(e){
    var formObj = $(this);
    var formURL = formObj.attr("action");
    var formData = new FormData(this);
    $.ajax({
        url: formURL,
        type: 'POST',
        data: formData,
        mimeType:"multipart/form-data",
        contentType: false,
        cache: false,
        processData: false,
        success: function(resultat)
        {
            $("#resultat").html("<p><b>Le signalement a été transmis</b></p>")
        },
        error : function(resultat){
            $('#resultat').html("<p>Erreur dans l'envoi du signalement</p>");
        } 
    });
    e.preventDefault();
});
$('#btnReport').click(function(){
    $("#multiform").submit();
    $(this).attr("disabled", "disabled");
})

