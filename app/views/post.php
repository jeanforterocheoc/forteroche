<?php $this->title = htmlspecialchars($postComment->title()) ?>
<div class="container-fluid">
    <article>
        <header>
            <a class="btn btn-primary" href="posts/posts">Tous les chapitres</a>
            <h2 class='postTitle'><?= htmlspecialchars($postComment->title()) ?></h2>
            <b><time>Publié le <?= htmlspecialchars($postComment->date()) ?></time></b>
        </header>
        <br>
        <section>
            <p><?= htmlspecialchars($postComment->content()) ?></p>
        </section>     
    </article>
    <hr />
    <header>
        <h2 class="comment">Commentaires à propos du chapitre : <?= htmlspecialchars($postComment->title()) ?></h2>  
    </header>
    <?php foreach ($comments as $comment): ?> 
        <p><?= htmlspecialchars($comment->author()) ?></P>    
        <p><?= htmlspecialchars($comment->date()) ?></P>
        <p><?= htmlspecialchars($comment->content()) ?></p>
        <h4><a href="<?='post/moderateComment/'. htmlspecialchars($comment->id()) ?>" class="btn btn-outline-warning btn-sm" role="button">Signalez</a></h4>
    <?php endforeach; ?>
    <hr />
    <!-- Formulaire pour le commentaire user -->
    <form class="form-signin" action="<?='post/addComment/'. htmlspecialchars($postComment->id()) ?>" method="post">
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
</div>





