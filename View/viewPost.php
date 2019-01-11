<?php $title = $post['title']; ?> 
<?php ob_start(); ?>
<article>
    <header>
        <h1 class="postTitle"><?= $post['title'] ?></h1>
        <time><?= $post['date'] ?></time>
    </header>
    <p><?= $post['content'] ?></p>
</article>
<hr />
<header>
    <h1 id="commentOn">Commentaires à propos du billet: <?= $post['title'] ?> </h1>
    <h2></h2>
</header>
<?php foreach ($comments as $comment): ?>
    <p><?= $comment['date'] ?></p>
    <p><?= $comment['author'] ." "?> écrit :</p>
    <p><?= $comment['title'] ?></p>
    <p><?= $comment['content'] ?></p>
<?php endforeach; ?>
<?php $content = ob_get_clean(); ?>

<?php require 'View/template.php'; ?>