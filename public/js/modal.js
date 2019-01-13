$(document).ready(function(){
    // Lorsque l'on clique sur show on affiche la fenêtre modale
    $('a.show-window').click(function(e) {
        e.preventDefault(); // Empêche le navigateur de réaliser son action par défaut
        
        $.get($(this).attr('href'), function(data) {
            $('.window-bg .window-content').html(data);
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

    function resizeModal(){
        var modal = $('#modal');
        // On récupère la largeur de l'écran et la hauteur de la page afin de cacher la totalité de l'écran
        var winH = $(document).height();
        var winW = $(window).width();
        
        // le fond aura la taille de l'écran
        $('#fond').css({'width':winW,'height':winH});
        
        // On récupère la hauteur et la largeur de l'écran
        var winH = $(window).height();
        // On met la fenêtre modale au centre de l'écran
        modal.css('top', winH/2 - modal.height()/2);
        modal.css('left', winW/2 - modal.width()/2);
     }

});