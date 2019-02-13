<?php $this->title = "Tous les commentaires" ?>

<h4>Tous les commentaires et signalements</h4>
<div class="table-responsive tableComments">
  <table id='tab'class="display">
    <thead>
      <tr>
        <th scope="col">Chapitres</th>
        <th scope="col">Date</th>
        <th scope="col">Auteur</th>
        <th scope="col">Commentaires</th>
        <th scope="col">Signalements</th>
        <th scope="col">Action</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($allComments as $comment): ?>
        <tr>
          <td><?= htmlspecialchars($comment->getchapter()->getTitle()) ?></td>
          <td><?= htmlspecialchars($comment->getDate()) ?></td>
          <td><?= htmlspecialchars($comment->getAuthor()) ?></td>
          <td><?= htmlspecialchars($comment->getContent()) ?></td>
          <td><?= htmlspecialchars($comment->getReport()) ?></td>
          <td>
            <form action="<?='comment/validate/'. htmlspecialchars($comment->getId()) ?>" method="post">
              <button type="submit" class="btn btn-success btn-sm" name="validate" id="validate"><span title="Accepter le commentaire"><i class="fas fa-check"></i></span></button>
            </form>
            <br>
            <form action="<?='comment/delete/'. htmlspecialchars($comment->getId()) ?>" method="post">
              <button type="submit" class="btn btn-danger btn-sm" name="deleteComment" id="deleteComment"><span title="Supprimer le commentaire"><i class="fas fa-times"></i></span></button>
            </form>
          </td>
        </tr>
      <?php endforeach; ?>
    </tbody>
  </table>
</div>


