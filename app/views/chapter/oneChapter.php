<?php $this->title = $oneChapter->getTitle() ?>
      <div class="container-fluid">
        <p class="returnChapters"><i class="fas fa-arrow-circle-left"><a href="chapter/allChapters">Retour aux chapitres</a></i></p>
        <div class="jumbotron bg-black">
          <article>
            <header>
              <h2 class='postTitle'><?= $oneChapter->getTitle() ?></h2><br>
            </header>
            <section><?= $oneChapter->getContent() ?></section>
          </article> 
        </div>   
      </div>
