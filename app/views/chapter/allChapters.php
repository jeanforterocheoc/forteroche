<?php $this->title = 'Tous les chapitres'; ?>

<div class="container">
  <div class="row">
    <div class="col-md-12">
      <div class="table-responsive">
        <table class="table table-bordered tableAllchapters">
          <caption>L'ensemble des chapitres</caption>
          <thead>
            <tr>
            <th>Publié le</th>
            <th>Titre</th>
            <th>Chapitre</th>
            <th>Actions</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($allChapters as $post) : ?>
            <tr>
              <td><?= $post->getDate() ?></td>
              <td><?= $post->getTitle() ?></td>
              <td><?= substr($post->getContent(), 0, 100) ?>[...]</td>
              <td>
                <form action="<?='chapter/oneChapter/'. $post->getId() ?>" method="post">
                  <button type="submit" target="_blank" class="btn btn-success btn-sm" name="editer" id="editer"><span title="Editer le chapitre"><i class="far fa-eye"></i></span></button>
                </form>
                <form action="<?='chapter/changeChapter/'. $post->getId() ?>" method="post">
                  <button type="submit" class="btn btn-primary btn-sm" name="changeChapter" id="changeChapter"><span title="Modifier le chapitre"><i class="fas fa-pen"></i></span></i></button>
                </form>
                <form action="<?='chapter/deleteChapter/'. $post->getId() ?>" method="post">
                  <button type="submit" class="btn btn-danger btn-sm" name="deleteChapter" id="deleteChapter"><span title="Supprimer le chapitre"><i class="fas fa-times"></span></i></button>
                </form>
              </td>
            </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
<!--Pagination  -->
<div class="row">
  <div class="col-lg-12">
    <ul class="pagination pagination-lg allChapters">
      <?php if($currentPage - 1 == 0): ?>
        <li class="page-item disabled">
            <span><i class="fas fa-arrow-alt-circle-left"></i></span>
        </li>
      <?php else : ?>
        <li class="page-item">
            <a href="chapter/allChapters?page=<?=$currentPage - 1 ?>"><i class="fas fa-arrow-alt-circle-left"></i></a>
        </li>
      <?php endif;?>
      <?php
      for ($i = 1; $i <= $nbPages; $i++) {
        if($i == $currentPage): ?>

        <li class="page-item-active">
            <a><?= $i ?></a>
        </li>
      <?php else : ?>
        <li class="page-item">
            <a href="chapter/allChapters?page=<?= $i ?>"><i><?= $i ?></i></a>
        </li>
      <?php endif;
      } ?> <!-- Fin boucle -->
      <?php if($currentPage + 1 > $nbPages): ?>
          <li class="page-item disabled">
              <span><i class="fas fa-arrow-alt-circle-right"></i></span>
          </li>
      <?php else : ?>
          <li class="page-item">
              <a href="chapter/allChapters?page=<?=$currentPage + 1 ?>"><i class="fas fa-arrow-alt-circle-right"></i></a>
          </li>
      <?php endif; ?>
    </ul>
  </div>
</div>
