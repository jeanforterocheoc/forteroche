$(document).ready(function(){
    // Ouvre la fenêtre modale au click "Signalez" 
    $('.reporting').click(function(e) {
        e.preventDefault(); 
        $('#commentId').val($(this).data('comment-id'));
        
    });

    // Enrgistrement du signalement au click "Valider" dans modal 
    $('.submit-reporting').click(function(e) {
        e.preventDefault(); 
        var commentId = $('#commentId').val();
        
        $.ajax({
            url: 'post/moderateComment/' + commentId,
            
            success: function(){
                $(".modal-body").html("<p><b>Le signalement a été transmis !</b></p>");
                $('.submit-reporting').attr("disabled", "disabled");
                // $('.reporting').attr("disabled", "disabled");
                disabledReporting();
            }
        });
    });
});

function disabledReporting()
{
    var commentId = $('#commentId').val();     
    $('.reporting').attr("disabled", "disabled"); 
    console.log(commentId);
}

