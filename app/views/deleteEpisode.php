<h1>Vous désirez supprimer ce chapitre intitulé : <?= htmlspecialchars($deleteEpisode->title()) ?> </h1>
<?php $this->title = htmlspecialchars($deleteEpisode->title()) ?>
<article>
    <header>
        <h2 class='postTitle'><?= htmlspecialchars($deleteEpisode->title()) ?></h2>
        <time>Publié le <?= htmlspecialchars($deleteEpisode->date()) ?></time> 
    </header>
    <p><?= htmlspecialchars($deleteEpisode->content()) ?></p>  
</article>

<form action="admin/deleteEpisode/<?= htmlspecialchars($deleteEpisode->id()) ?>" method="post">
    <button type="submit" name="supprimer" id="supprimer">Supprimer</button>
</form>