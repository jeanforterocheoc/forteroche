<?php $this->title = $postComment->title() ?>

    <div class="container-fluid">
        <article>
            <header>
                <a class="btn btn-primary" href="posts/posts">Tous les chapitres</a>
                <h2 class='postTitle'><?= $postComment->title() ?></h2>
                <b><time>Publié le <?= $postComment->date() ?></time></b>
            </header>
            <br>
            <section>
                <p><?= $postComment->content() ?></p>
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
            <!-- <p><a href="<?='post/moderateComment/'. htmlspecialchars($comment->id()) ?>" class="btn btn-outline-warning btn-sm" role="button">Signalez</a></p> -->
            <!-- <p><a href="" class="show-window" role="button">Signalez</a></p> -->
            <div id="resultat"></div>
            <form name= "multiform" id="multiform" action="<?='post/moderateComment/'. htmlspecialchars($comment->id()) ?>" method="post" enctype="multipart/form-data">
                <input type="hidden" name="comment_report" id="comment_report" value="<?=$comment->report()?>">
                <input type="hidden" name="id"  value="<?=$comment->id()?>">
                <button type="submit" name="btnReport" id="btnReport" class="show-window">Signalez</button>
            </form>

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

    <!-- Fenêtre modale -->
    <div class="window-bg">
        <div class="window">
            <div class="window">
                <p class="window-title">Fenêtre modale!</p>
                <div class="window-content"></div>
                <div class="window-buttons">
                    <a href="" class="button window-close">Fermer</a>
                </div>
            </div>
        </div>
    </div>

    
    <script type="text/javascript" src="public/js/modal.js" ></script>
    <script type="text/javascript" src="public/js/report.js"></script> 





