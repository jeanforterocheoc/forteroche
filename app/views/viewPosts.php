<?php $this->title = 'Nouveau roman de Jean Forteroche : Billet simple pour l\'Alaska'; ?>
<h1><a href="index.php?controller=home&action=homepage">Homepage</a></h1> 
<article>
    <header>
    <?php foreach ($posts as $post) : ?>
        <h2 class='postTitle'><?= htmlspecialchars($post->title()) ?></h2>
        <time>Publié le <?= htmlspecialchars($post->date()) ?></time>  
    </header>
    <p><?= htmlspecialchars($post->content()) ?></p>
    <a href="<?='index.php?controller=home&action=homepage&id='. htmlspecialchars($post->id()) ?>">Lire la suite</a>
    <?php endforeach; ?>
</article>
