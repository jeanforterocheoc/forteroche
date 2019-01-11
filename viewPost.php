<?php $title = $post['post_title']; ?>

<?php ob_start(); ?>
<article>
    <header>
        <h1 class="postTitle"><?= $post['post_title'] ?></h1>
        <time><?= $post['post_date'] ?></time>
    </header>
    <p><?= $post['post_content'] ?></p>
</article>
<hr />
<header>
    <h1 id="commentOn">Commentaires à propos du billet <?= $post['post_title'] ?></h1>
</header>
<?php foreach ($comments as $comment): ?>
    <p><?= $comment['comment_author'] ?>écrit :</p>
    <p><?= $comment['comment_content'] ?></p>
<?php endforeach; ?>
<?php $content = ob_get_clean(); ?>

<?php require 'template.php'; ?>