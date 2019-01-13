<?php $this->title = 'Nouveau roman de Jean Forteroche : Billet simple pour l\'Alaska'; ?> 
<div class="container-fluid">
    <article>
        <header>
        <?php foreach ($homePage as $post) : ?>
            <h3 class='postTitle'><?= htmlspecialchars($post->title()) ?></h3>
            <time>Publié le :<?= htmlspecialchars($post->date()) ?></time>  
        </header>
        <p><?=htmlspecialchars(substr($post->content(), 0, 100))?> ...</p> 
        <a class= "btn btn-primary" href="<?='post/postComment/'. htmlspecialchars($post->id()) ?>">Lire la suite</a>
        <br>
        <br>
        <a class="btn btn-outline-dark" href="posts/posts"><h4>Tous les épisodes</h4></a>
        <?php endforeach; ?>
    </article>
</div>


 