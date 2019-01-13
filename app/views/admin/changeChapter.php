<?php $this->title = 'Modifier un chapitre' ?>
<h4>Vous souhaitez modifier l'épisode intitulé : <?= $changeChapter->title() ?></h4>
<p><a href="user/userAdmin">accueil administration</a></p>
<div class="container-fluid">
    <article>
        <header>
            <h2 class='postTitle'><?= $changeChapter->title() ?></h2>
            <time>Publié le <?= $changeChapter->date() ?></time> 
        </header>
        <p><?= $changeChapter->content() ?></p>  
    </article>

    <form action="" method="post">
        <label for="title">Titre du chapitre</label><br>
        <input type="text"  name="title" id="title" placeholder="Titre du chapitre"><br><br>
        <label for="content">Contenu du chapitre</label><br>
        <!-- <textarea name="content" id="content" cols="100" rows="30" placeholder="Titre du chapitre"></textarea><br><br> -->
        <textarea name="mytextarea" id="mytextarea" cols="100" rows="30" placeholder="Contenu du chapitre"></textarea><br><br>    
        <button type="submit" id="btn_changeChapter">Modifier</button>
    </form>
</div>