
<?php $this->title = 'Nouveau roman de Jean Forteroche : Billet simple pour l\'Alaska'; ?> 
<article>
    <header>
    <?php foreach ($posts as $post) : ?>
        <h1 class='postTitle'><?= $post->title() ?></h1>
        <time><?= $post->date() ?></time>  
    </header>
    <p><?= $post->content() ?></p>
    <a href="<?='index.php?action=post&id='. $post->id() ?>">Lire la suite</a>
    <?php endforeach; ?>
</article>



 