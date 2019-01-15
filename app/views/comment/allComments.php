<?php $this->title = "Tous les commentaires" ?>
<p><a href="user/userAdmin">Accueil administration</a></p>
<p><a href="home/homepage">Voir le blog</a></p><br>

 <!-- Tous les commentaires insérés dans un tableau -->
<div class="container-fluid">
</div>
    <div class="table-responsive">
        <table id='tab'class="display">
            <thead>
                <tr>
                  <th scope="col">Chapitres</th>
                  <th scope="col">Date</th>
                  <th scope="col">Auteur</th>
                  <th scope="col">Commentaires</th>
                  <th scope="col">Signalement</th>
                  <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
            <?php foreach ($allComments as $comment): ?>
                <tr>
                <td><?= htmlspecialchars($comment->getchapter()->title()) ?></td>
                <td><?= htmlspecialchars($comment->getDate()) ?></td>
                <td><?= htmlspecialchars($comment->getAuthor()) ?></td>
                <td><?= htmlspecialchars($comment->getContent()) ?></td>
                <td><?= htmlspecialchars($comment->getReport()) ?></td>
                <td>
                    <form action="<?='comment/validate/'. htmlspecialchars($comment->getId()) ?>" method="post">
                        <button type="submit" class="btn btn-success btn-sm" name="validate" id="validate"><span title="Accepter le commentaire"><i class="fas fa-check"></i></span></button>
                    </form>

                    <form action="<?='comment/delete/'. htmlspecialchars($comment->getId()) ?>" method="post">
                        <button type="submit" class="btn btn-danger btn-sm" name="deleteComment" id="deleteComment"><span title="Supprimer le commentaire"><i class="fas fa-times"></i></span></button>
                    </form>
                </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </div>

<script type="text/javascript" src="public/js/table.js"></script>
