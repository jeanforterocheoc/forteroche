<h1>Vous souhaitez modifier l'épisode intitulé : <?= htmlspecialchars($modifEpisode->title()) ?></h1>
<?php $this->title = htmlspecialchars($modifEpisode->title()) ?>
<article>
    <header>
        <h2 class='postTitle'><?= htmlspecialchars($modifEpisode->title()) ?></h2>
        <time>Publié le <?= htmlspecialchars($modifEpisode->date()) ?></time> 
    </header>
    <p><?= htmlspecialchars($modifEpisode->content()) ?></p>  
</article>

<form action="" method="post">
    <label for="title">Titre du chapitre</label><br>
    <input type="text"  name="title" id="title" placeholder="Titre du chapitre"><br><br>
    <label for="content">Contenu du chapitre</label><br>
    <textarea name="content" id="content" cols="100" rows="30" placeholder="Titre du chapitre"></textarea><br><br>
    <button type="submit">Modifier</button>
</form>