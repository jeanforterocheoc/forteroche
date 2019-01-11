<?php
/** Renvoie la liste de tous les billets, triés par identifiant décroissant */
function getPosts() {
    $db = getDb();
    $posts = $db->query('SELECT post_id as id, post_title as title, post_content as content, post_date as date FROM posts ORDER BY post_id DESC');
    return $posts;
}

/** Renvoie des informations sur un billet */
function getPost($postId)
{
    $db = getDb();
    $post = $db->prepare('SELECT post_id as id, post_title as title, post_content as content, post_date as date FROM posts WHERE post_id=?');
    $post->execute(array($postId));
    if ($post->rowCount() == 1) {
        return $post->fetch();
    } else {
        throw new Exception("Aucun post ne correspond à l'identifiant " .$postId);
    }
}

/** Renvoie la liste des commentaires associés à un billet */
function getComment($postId) {
    $db = getDb();
    $comments = $db->prepare('SELECT post_id as id, post_title as title, post_content as content, post_date as date FROM posts WHERE post_id=?');
    $comments->execute(array($postId));
    return $comments;
}

/**Effectue la connexion à la DB
 * Instancie et renvoie l'objet PDO associé
 */
function getDb() {
    $db = new PDO('mysql:host=localhost;dbname=blog_forteroche;charset=utf8', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
    return $db;
}