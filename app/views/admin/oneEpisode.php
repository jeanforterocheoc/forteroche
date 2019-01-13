<?php $this->title = htmlspecialchars($oneEpisode->title()) ?>
<article>
    <header>
        <h2 class='postTitle'><?= htmlspecialchars($oneEpisode->title()) ?></h2>
        <time>Publié le <?= htmlspecialchars($oneEpisode->date()) ?></time> 
    </header>
    <p><?= htmlspecialchars($oneEpisode->content()) ?></p>  
</article>
<hr />
<header>
    <h3 class="comment">Commentaires à propos de l'épisode : <?= htmlspecialchars($oneEpisode->title()) ?></h3>  
</header>
<?php foreach ($comments as $comment): ?> 
    <p><?= htmlspecialchars($comment->author()) ?></P>    
    <p><?= htmlspecialchars($comment->date()) ?></P>
    <p><?= htmlspecialchars($comment->content()) ?></p>
<?php endforeach; ?>
