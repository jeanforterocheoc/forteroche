<?php $this->title = 'Billet simple pour l\'Alaska'; ?>
<div class="container-fluid">
  <article>
    <header>
  <?php foreach ($homePage as $post) : ?>
      <h3 class='postTitle'><?= $post->title() ?></h3>
      <time>Publié le : <?= $post->date() ?></time>
    </header>
    <p><?= substr($post->content(), 0, 100)?>[...]</p>
    <a class= "btn btn-primary" href="<?='post/postComment/'. htmlspecialchars($post->id()) ?>">Lire la suite</a>
    <br>
    <br>

  <?php endforeach; ?>
  </article>
</div>

<!--Pagination  -->
      <nav id="homePagination" aria-label="navigation">
        <ul class="pagination">
            <?php if($currentPage - 1 == 0): ?>
                <li class="page-item disabled">
                  <a class="page-link previous" href="home/homePage?page=<?=$currentPage - 1 ?> " tabindex="-1" aria-disabled="true">Précédent</a>
                </li>
            <?php else : ?>
                <li>
                    <a class="page-link previous" href="home/homePage?page=<?=$currentPage - 1 ?> ">Précédent</a>
                </li>
            <?php endif;?>
            <?php
            for ($i = 1; $i <= $nbPages; $i++) {
                if($i == $currentPage): ?>

                <li class="page-item-active number">
                    <a><?= $i ?></a>
                </li>
            <?php else : ?>
                <li class="page-item number">
                    <a href="home/homePage?page=<?= $i ?>"><i><?= $i ?></i></a>
                </li>
            <?php endif;
            } ?> <!-- Fin boucle -->
            <?php if($currentPage + 1 > $nbPages): ?>
                <li class="page-item disabled">
                  <a  class="page-link" href="home/homePage?page=<?=$currentPage + 1 ?> ">Suivant</a>
                </li>
            <?php else : ?>
                <li class="page-item">
                  <a class="page-link" href="home/homePage?page=<?=$currentPage + 1 ?> ">Suivant</a>
                </li>
            <?php endif; ?>
        </ul>
      </nav>
