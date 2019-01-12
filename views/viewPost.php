<?php $this->title = $post->title() ?>
<article>
    <header>
   
        <h1 class='postTitle'><?= $post->title() ?></h1>
        <time><?= $post->date() ?></time> 
    </header>
    <p><?= $post->content() ?></p>   
</article>
<hr />
<header>
    <h2 class="comment">Commentaires à propos de l'épisode : <?= $post->title() ?></h2>  
</header>
<?php foreach ($comments as $comment): ?> 
    <p><?= $comment->author() ?></P>    
    <p><?= $comment->date() ?></P>
    <p><?= $comment->content() ?></p>
 <?php endforeach; ?>   




