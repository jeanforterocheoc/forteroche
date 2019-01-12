<hr>
<?php foreach ($comments as $comment): ?> 
    <p><?= $comment->date() ?></P>
    <p><?= $comment->author() ?></P>
    <p><?= $comment->content() ?></p>
 <?php endforeach; ?>

 



 