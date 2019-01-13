<?php $this->title = 'Espace administration'; ?>
<h1>Voici l'ensemble des épisodes!</h1> 
<article>
    <header>
    <?php foreach ($posts as $post) : ?>
        <h2 class='postTitle'><?= htmlspecialchars($post->title()) ?></h2>
        <time>Publié le <?= htmlspecialchars($post->date()) ?></time>  
    </header>
    <p><?= htmlspecialchars($post->content()) ?></p>
    <?php endforeach; ?>
</article>
