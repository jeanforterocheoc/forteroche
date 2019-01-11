<?php
require 'model.php';

try {
    if (isset($_GET['post_id'])) {
        // intval renvoie la valeur numérique du paramètre ou 0 en cas d'échec
        $id = intval($_GET[post_id]);
        if ($id != 0) {
            $post = getPost($id);
            $comments = getComment($id);
            require 'viewPost.php';
        }
        else {
            throw new Exception("identifiant du billet non valide");
        }
    }
    else {
        throw new Exception("Aucun identifiant de billet ");
    }
}
catch (Exception $e) {
    $msgError = $e->getMessage() ;
   require 'viewHome.php';
}