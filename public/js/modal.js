$(document).ready(function(){
    // Lorsque l'on clique sur show on affiche la fenêtre modale
    $('a.show-window').click(function(e) {
        e.preventDefault(); // Empêche le navigateur de réaliser son action par défaut
        
        $.post($(this).attr('action'), function(data) {
            $('.window-bg .windowContent').html(data);
            show_window();
        });
    });

    // Affiche la fenêtre modale
    function show_window() {
        $('.window-bg').show();
    }

    // Ferme la fenêtre modale
    function close_window() {
        $('.window-bg').hide();
    }
    
    // Fermeture de la fenêtre au click
    $('.window-bg .window-close').click(function(e) {
        e.preventDefault();
        close_window();
    });

    function show_window() {
        $('.window-bg .window').fadeTo(0, 0).css('top', '40%'); // Remise à zéro des paramètres avant l'animation
        $('.window-bg').fadeIn(250); // Fondu du fond de la fenêtre
        $('.window-bg .window').animate({
            top: '50%',
            opacity: 1
        }, 250); // Animation de la fenêtre
    }
    
    function close_window() {
        $('.window-bg .window').fadeTo(0, 1).css('top', '50%'); // Remise à zéro des paramètres avant l'animation
        $('.window-bg').fadeOut(250); // Fondu du fond de la fenêtre
        $('.window-bg .window').animate({
            top: '40%',
            opacity: 0
        }, 250); // Animation de la fenêtre
    }

    
    
});