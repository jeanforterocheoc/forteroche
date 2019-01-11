<?php $title = 'Nouveau roman de Jean Forteroche : Billet simple pour l\'Alaska '; ?>

<?php ob_start(); ?>
<?php foreach ($posts as $post): ?> 
    <article>
        <header>
            <a href="<?= "index.php?action=post&id=" .$post['id'] ?>">
                <h1 class="postTitle"><?= $post['title'] ?></h1>
            </a>
            <time><?= $post['date'] ?></time>
        </header>
        <p><?= $post['content'] ?></p>
    </article>
<?php endforeach; ?>
<?php $content = ob_get_clean(); ?>

<?php require 'View/template.php'; ?>