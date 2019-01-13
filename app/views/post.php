<?php $this->title = htmlspecialchars($postComment->title()) ?>
<h1><a class= "btn btn-info btn-lg" href="home/homepage">Page d'accueil</a></h1> 
<article>
    <header>
    <a class= "btn btn-info btn-lg" href="posts/posts"><h1>Tous les épisodes</h1></a>
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
 <form action="<?='post/addComment/'. htmlspecialchars($postComment->id()) ?>" method="post">
    <div class="form-group">
        <label for="author">Votre pseudo</label><br>
        <input type="text" class="form-control" name="author" id="author" placeholder="Votre pseudo"><br><br>
    </div>

    <div class="form-group">
        <label for="content">Laissez votre commentaire</label><br>
        <textarea name="content" class="form-control" id="content" cols="30" rows="10" placeholder="Votre commentaire"></textarea><br><br>
    </div>
    
    <input type="hidden" name="postId" value="<?php echo $_GET['id'] ?>">
    <button type="submit" class="btn btn-primary">Envoyer</button>
</form>





