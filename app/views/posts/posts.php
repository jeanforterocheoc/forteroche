<?php $this->title = 'Nouveau roman de Jean Forteroche : Billet simple pour l\'Alaska'; ?>

<article>
  <header>
    <?php foreach ($posts as $post) : ?>
      <h3 class='chapterTitle'><?= htmlspecialchars($post->title()) ?></h3>
      <time>Publié le <?= htmlspecialchars($post->date()) ?></time>
    </header>
    <p><?=substr($post->content(), 0, 100)?>[...]</p>
    <a class= "btn btn-primary" href="<?='post/postComment/'. htmlspecialchars($post->id()) ?>">Lire la suite</a>
  <?php endforeach; ?>
</article>
