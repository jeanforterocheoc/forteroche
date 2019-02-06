<?php $this->title = 'Rédiger un chapitre' ?>

<div class="container-fluid newChapter">
  <h5>Rédiger un nouveau chapitre</h5>
  <div class="jumbotron bg-black ">
    <form class="newChapter" action="" method="post">
      <div class="form-label title">
        <label for="title">Titre</label>
        <input type="text" value="<?=$title?>" name="title" id="title" placeholder="Titre du chapitre">
      </div>
      <div class="form-label content">      
        <label for="content">Contenu</label>
        <textarea name="mytextarea" id="mytextarea" cols="100" rows="30" placeholder="Contenu du chapitre"></textarea>
      </div>  
      <button type="submit" class="btn btn-primary">Publier</button>   
    </form>
  </div>
</div>

