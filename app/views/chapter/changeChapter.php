<?php $this->title = 'Modifier un chapitre' ?>

<div class="container-fluid">
  <p class="returnChapters"><i class="fas fa-arrow-circle-left"><a href="chapter/allChapters">Retour aux chapitres</a></i></p>
  <h5>Modifier le chapitre : <?= $changeChapter->getTitle() ?></h5>
  <div class="jumbotron bg-black">
    <article>
      <form class="changeChapter" action="" method="post">
        <div class="form-label title">
          <label for="title">Titre</label>
          <input type="text"  name="title" id="title" value="<?= $changeChapter->getTitle() ?>">
        </div> 
        <div class="form-label content">
          <label for="content">Contenu du chapitre</label>
          <textarea name="mytextarea" id="mytextarea" cols="100" rows="30" ><?= $changeChapter->getContent() ?></textarea>    
        </div> 
        <button type="submit" class="btn btn-success" id="btn_changeChapter">Modifier</button>
      </form>
    </article>
  </div>
</div>