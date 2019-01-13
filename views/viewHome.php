<?php $this->title = 'Nouveau roman de Jean Forteroche : Billet simple pour l\'Alaska'; ?> 
<article>
    <header>
    <?php foreach ($firstPage as $post) : ?>
        <h1 class='postTitle'><?= htmlspecialchars($post->title()) ?></h1>
        <time>Publié le :<?= htmlspecialchars($post->date()) ?></time>  
    </header>
    <p><?= htmlspecialchars($post->content());?></p> 
    <a href="<?='../post/'. htmlspecialchars($post->id()) ?>">Lire la suite</a>
    <?php endforeach; ?>
</article>



 