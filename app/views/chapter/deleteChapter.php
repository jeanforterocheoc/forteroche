<?php $this->title = 'Supprimer un commentaire' ?>

<div class="container-fluid">
  <p class="returnChapters"><i class="fas fa-arrow-circle-left"><a href="chapter/allChapters">Retour aux chapitres</a></i></p>
  <h5>Supprimer le chapitre : <?= $deleteChapter->getTitle() ?> </h5>
  <div class="jumbotron bg-black">
    <article>
        <header>
          <h2 class='postTitle'><?= $deleteChapter->getTitle() ?></h2> 
        </header>
        <section><?= $deleteChapter->getContent() ?></section>  
    </article>
    <form class="deleteChapter" action="chapter/deleteChapter/<?= $deleteChapter->getId() ?>" method="post">
      <button type="submit" class="btn btn-danger" name="confirmDelete" id="confirmDelete">Confirmer</button>
    </form>
  </div>
</div>