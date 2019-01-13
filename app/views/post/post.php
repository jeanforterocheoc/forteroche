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
    
        <h4 class="postComment">Commentaires</h4>
        <?php foreach ($comments as $comment): ?> 
            <p><?= htmlspecialchars($comment->getAuthor()) ?></P>    
            <p><?= htmlspecialchars($comment->getDate()) ?></P>
            <p><?= htmlspecialchars($comment->getContent()) ?></p>
            <p><?= htmlspecialchars($comment->getId()) ?></p>

            <!-- Bouton signalment modal -->
            <button type="button" class="btn btn-primary btn-sm reporting" data-comment-id = "<?= $comment->getId() ?>" data-toggle="modal" data-target="#reportModal"> 
            Signaler
            </button>
        <?php endforeach; ?>

        <!-- Fenêtre modale -->
        <div class="modal fade" id="reportModal" tabindex="-1" role="dialog" aria-labelledby="title-report" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="title-report">Confirmer un signalement</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary submit-reporting">Valider</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                </div>
                </div>
                <input type="hidden" name="id" id="commentId"  value="">
            </div>
        </div>

        <!-- Formulaire pour le commentaire user -->
        <hr />
        <h4 class="addComment">Laissez votre commentaire</h4>   
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

<script type="text/javascript" src="public/js/report.js"></script> 





