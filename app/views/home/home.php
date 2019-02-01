<?php $this->title = 'Billet simple pour l\'Alaska'; ?>
<section class="container">
    <div class="jumbotron bg-white">
        <p>Bienvenue!<br>Pour mon douzième roman,j'ai souhaité vous le faire découvrir dans un tout autre format que celui d'un livre papier,un blog.<br>Jean Forteroche</p>
    </div>  
</section>
<section class="container">
    <div class="box drop-shadow lifted">
        <article>
            <h2 class="lastChapter"><i class="fas fa-book-open"></i>Dernier chapitre</h2>
            
        <?php foreach ($homePage as $post) : ?>
            <h3 class='postTitle'><?= $post->title() ?></h3>
            <hr>
            <time><i class="far fa-calendar-alt"></i>Publié le : <?= $post->date() ?></time>
            <hr>
            <p><?= substr($post->content(), 0, 100)?>[...]</p>
            <p><a class= "btn btn-primary" href="<?='posts/postComment/'. htmlspecialchars($post->id()) ?>">Lire la suite</a></p>
        <?php endforeach; ?>
        </article>
    </div> 
</section>

