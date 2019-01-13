<?php $this->title = $post->title() ?>
<article>
    <header>
    <a href="../home/posts"><h1>Tous les épisodes</h1></a>
        <h2 class='postTitle'><?= $post->title() ?></h2>
        <time><?= $post->date() ?></time> 
    </header>
    <p><?= $post->content() ?></p>   
</article>




