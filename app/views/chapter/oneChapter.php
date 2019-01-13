<?php $this->title = $oneChapter->title() ?>
<p><a href="user/userAdmin">Accueil administration</a></p>
<p><a href="chapter/allChapters">Tous les chapitres</a></p><br>
<p><a href="home/homepage">Voir le blog</a></p><br>

<div class="container-fluid">
    <article>
        <header>
            <h2 class='postTitle'><?= $oneChapter->title() ?></h2><br>
            <time>Publié le <?= $oneChapter->date() ?></time><br><br>
        </header>
        <p><?= $oneChapter->content() ?></p>
    </article>    
</div>
