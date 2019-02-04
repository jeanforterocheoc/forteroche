<?php $this->title = 'Supprimer un commentaire' ?>
<p><a href="user/userAdmin">Accueil administration</a></p>
<p><a href="home/homepage" target="_blank">Voir le blog</a></p><br>

<div class="container-fluid">
    <h4>Vous désirez supprimer ce chapitre intitulé : <?= $deleteChapter->getTitle() ?> </h4>
    
    <article>
        <header>
            <h2 class='postTitle'><?= $deleteChapter->getTitle() ?></h2>
            <time>Publié le <?= $deleteChapter->getDate() ?></time> 
        </header>
        <p><?= $deleteChapter->getContent() ?></p>  
    </article>

    <form action="chapter/deleteChapter/<?= $deleteChapter->getId() ?>" method="post">
        <button type="submit" name="confirmDelete" id="confirmDelete">Confirmer</button>
    </form>
</div>