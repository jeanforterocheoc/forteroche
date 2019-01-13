<div class="container-fluid">
    <p><a href="user/userAdmin">accueil administration</a></p>

    <h4>Vous souhaitez rédiger un nouveau chapitre</h4>
    <form action="" method="post">
        <label for="title">Titre</label><br>
        <input type="text" value="<?=htmlspecialchars($title)?>" name="title_newChapter" id="title_newChapter" placeholder="Titre du chapitre"><br><br>
        <label for="content">Contenu</label><br>
        <textarea name="content_newChapter" id="mytextarea" cols="100" rows="30" placeholder="Contenu du chapitre"><?=strip_tags(htmlentities($content, ENT_QUOTES, 'UTF-8'))?></textarea><br><br>
        <button type="submit" class="btn btn-dark">Publier</button>
    </form>
</div>

