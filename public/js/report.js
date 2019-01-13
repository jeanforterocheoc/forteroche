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

