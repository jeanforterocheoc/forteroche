<?php $this->title = 'Nouveau roman de Jean Forteroche : Billet simple pour l\'Alaska'; ?> 
<article>
    <header>
    <?php foreach ($homePage as $post) : ?>
        <h2 class='postTitle'><?= htmlspecialchars($post->title()) ?></h2>
        <time>Publié le :<?= htmlspecialchars($post->date()) ?></time>  
    </header>
    <p><?=htmlspecialchars(substr($post->content(), 0, 100))?> ...</p> 
    <a class= "btn btn-primary" href="<?='post/postComment/'. htmlspecialchars($post->id()) ?>">Lire la suite</a>
    <br>
    <br>
    <a class= "btn btn-info btn-lg" href="posts/posts"><h3>Tous les épisodes</h3></a>
    <?php endforeach; ?>
</article>



 