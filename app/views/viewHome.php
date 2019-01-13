<?php $this->title = 'Nouveau roman de Jean Forteroche : Billet simple pour l\'Alaska'; ?> 
<article>
    <header>
    <?php foreach ($homePage as $post) : ?>
        <h1 class='postTitle'><?= htmlspecialchars($post->title()) ?></h1>
        <time>Publié le :<?= htmlspecialchars($post->date()) ?></time>  
    </header>
    <p><?= htmlspecialchars($post->content());?></p>
    <!-- <p><?=htmlspecialchars(substr($post->content(), 0, 15))?></p> -->
    <a href="<?='../post/postComment/'. htmlspecialchars($post->id()) ?>">Lire la suite</a>
    <a href="../posts/posts"><h2>Tous les épisodes</h2></a>
    <?php endforeach; ?>
</article>



 