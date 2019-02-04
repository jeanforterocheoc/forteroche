<?php $this->title = $oneChapter->getTitle() ?>
<p><a href="user/userAdmin">Accueil administration</a></p>
<p><a href="chapter/allChapters">Tous les chapitres</a></p>
<p><a href="home/homepage" target="_blank">Voir le blog</a></p><br>

<div class="container-fluid">
    <article>
        <header>
            <h2 class='postTitle'><?= $oneChapter->getTitle() ?></h2><br>
            <time>Publié le <?= $oneChapter->getDate() ?></time><br><br>
        </header>
        <p><?= $oneChapter->getContent() ?></p>
    </article>    
</div>
