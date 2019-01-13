<?php $this->title = htmlspecialchars($postComment->title()) ?>
<h1><a href="../home/homePage">Homepage</a></h1> 
<article>
    <header>
    <a href="../posts/posts"><h1>Tous les épisodes</h1></a>
        <h2 class='postTitle'><?= htmlspecialchars($postComment->title()) ?></h2>
        <time>Publié le <?= htmlspecialchars($postComment->date()) ?></time> 
    </header>
    <p><?= htmlspecialchars($postComment->content()) ?></p>  
</article>
<hr />
<header>
    <h2 class="comment">Commentaires à propos de l'épisode : <?= htmlspecialchars($postComment->title()) ?></h2>  
</header>
<?php foreach ($comments as $comment): ?> 
    <p><?= htmlspecialchars($comment->author()) ?></P>    
    <p><?= htmlspecialchars($comment->date()) ?></P>
    <p><?= htmlspecialchars($comment->content()) ?></p>
 <?php endforeach; ?>
 <hr />
 <form action="" method="post">
    <label for="name">Votre pseudo</label><br>
    <input type="text" name="name" id="name" placeholder="Votre pseudo"><br><br>
    <label for="comment">Laissez votre commentaire</label><br>
    <textarea name="text" id="" cols="30" rows="10" placeholder="Votre commentaire"></textarea><br><br>
    <input type="button" value="Envoyer">
</form>




