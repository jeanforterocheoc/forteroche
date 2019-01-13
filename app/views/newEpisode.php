<div class="container-fluid">
    <h4>Vous souhaitez rédiger un nouveau chapitre</h4>
    <form action="" method="post">
        <label for="title">Titre</label><br>
        <input type="text" value="<?=$title?>" name="title" id="title" placeholder="Titre du chapitre"><br><br>
        <label for="content">Contenu</label><br>
        <textarea name="content" id="content" cols="100" rows="30" placeholder="Contenu du chapitre"></textarea><br><br>
        <button type="submit" class="btn btn-dark">Publier</button>
    </form>
</div>

