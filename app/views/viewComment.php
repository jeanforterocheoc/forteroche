<!-- <?php $this->title = $post->title() ?>
<article>
    <header>
    <a href="../home/posts"><h1>Tous les épisodes</h1></a>
        <h2 class='postTitle'><?= $post->title() ?></h2>
        <time><?= $post->date() ?></time> 
    </header>
    <p><?= $post->content() ?></p>   
</article>
<hr />
<header>
    <h2 class="comment">Commentaires à propos de l'épisode : <?= $post->title() ?></h2> 
    <h3>Laissez le votre:</h3> 
</header>

<form action="" method="post">
    <label for="name">Votre nom</label><br>
    <input type="text" name="name" id="name"><br><br>
    <label for="comment">Votre commentaire</label><br>
    <textarea name="text" id="" cols="30" rows="10" placeholder=""></textarea><br><br>
    <input type="button" value="Envoyer">
</form>

<?php foreach ($comments as $comment): ?> 
    <p><?= $comment->author() ?></P>    
    <p><?= $comment->date() ?></P>
    <p><?= $comment->content() ?></p>
 <?php endforeach; ?>    -->

 



 