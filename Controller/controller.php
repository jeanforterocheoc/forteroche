<?php

require 'Model/model.php';

// Affiche la liste de tous les billets du blog
function home() {
    $posts = getPosts();
    require 'View/viewHome.php';
}

// Affiche les détails sur un billet
function post($postId) {
    $post = getPost($postId);
    $comments = getComment($postId);
    require 'View/viewPost.php';
}

// Affiche une erreur
function error($msgError) {
    require 'View/viewError.php';
}