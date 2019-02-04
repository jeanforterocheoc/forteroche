<?php $this->title = 'Nouveau roman de Jean Forteroche : Billet simple pour l\'Alaska'; ?>

<div class="container">
<?php foreach ($posts as $post) : ?>
  <div class="card text-center">
    <div class="card-header">
      Billet simple pour l'Alaska - Jean Forteroche
    </div>
    <div class="card-body">
      <h5 class=" card-title chapterTitle"><?= htmlspecialchars($post->getTitle()) ?></h3>
      <time>Publié le <?= htmlspecialchars($post->getDate()) ?></time>
      <p class="card-text"><?=substr($post->getContent(), 0, 100)?>[...]</p>
      <a class= " card-link btn btn-primary" href="<?='posts/postComment/'. htmlspecialchars($post->getId()) ?>">Lire la suite</a>
    </div>
  </div>
<?php endforeach; ?>

  <!--Pagination  -->
  <nav aria-label="Page posts">
      <ul class="pagination pagination-sm">
      <?php if ($currentPage - 1 == 0): ?>
        <li class="page-item disabled">
          <span><i class="fas fa-arrow-alt-circle-left"></i></span>
        </li>
      <?php else : ?>
        <li class="page-item">
          <a class="page-link" href="posts/posts?page=<?=$currentPage - 1 ?>"><i class="fas fa-arrow-alt-circle-left"></i></a>
        </li>
      <?php endif;?>
      <?php
        for ($i = 1; $i <= $nbPages; $i++) {
          if ($i == $currentPage): ?>
            <li class="page-item-active">
              <a class="page-link"><?= $i ?></a>
            </li>
        <?php else : ?>
            <li class="page-item">
              <a class="page-link" href="posts/posts?page=<?= $i ?>"><i><?= $i ?></i></a>
            </li>
        <?php endif;
        } ?> <!-- Fin boucle -->
        <?php if ($currentPage + 1 > $nbPages): ?>
          <li class="page-item disabled">
            <span><i class="fas fa-arrow-alt-circle-right"></i></span>
          </li>
        <?php else : ?>
          <li class="page-item">
            <a class="page-link" href="posts/posts?page=<?=$currentPage + 1 ?>"><i class="fas fa-arrow-alt-circle-right"></i></a>
          </li>
        <?php endif; ?>
      </ul>
   </nav> 
</div> 

