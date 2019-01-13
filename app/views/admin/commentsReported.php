<?php $this->title = "Tous les commentaires" ?>
<p><a href="user/userAdmin">Accueil administration</a></p>

<div class="container-fluid">
    <h2>Voici les commentaires signalés:</h2><br>
    <table class="table table-dark">
        <thead>
            <tr>
            <th scope="col">commentId</th>
            <!-- <th scope="col">Numéro<br>du chapitre</th> -->
            <th scope="col">Date</th>
            <th scope="col">Auteur</th>
            <th scope="col">Commentaire</th>
            <th scope="col"><a href="admin/commentsReported" id="sortReport">Signalement</a></th>
            <th scope="col">Valider le<br>commentaire</th>
            <th scope="col">Supprimer le<br>commentaire</th>
            </tr>
        </thead>
        <tbody>
        <?php foreach ($commentsReported as $comment): ?>
            <tr>
            <td><?= htmlspecialchars($comment->id()) ?></td>
            <!-- <td><?= htmlspecialchars($comment->postId()) ?></td> -->
            <td><?= htmlspecialchars($comment->date()) ?></td> 
            <td><?= htmlspecialchars($comment->author()) ?></td>
            <td><?= htmlspecialchars($comment->content()) ?></td>
            <td><?= htmlspecialchars($comment->report()) ?></td>
            <td>
                <form action="<?='admin/validate/'. htmlspecialchars($comment->id()) ?>" method="post">
                    <input type="hidden" name="comment_id" value="<?=$comment->report()?>">
                    <button type="submit" class="btn btn-success btn-sm" name="validate" id="validate">Approuver</button>   
                </form>
            </td>
            <td>
                <form action="<?='admin/delete/'. htmlspecialchars($comment->id()) ?>" method="post">
                    <input type="hidden" name="comment_id" value="<?=$comment->report()?>">
                    <button type="submit" class="btn btn-danger btn-sm" name="deleteComment" id="deleteComment">Supprimer</button> 
                </form>
            </td>   
            </tr>
        <?php endforeach; ?> 
        </tbody>
    </table>
</div>