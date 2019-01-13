<?php $this->title = "Tous les commentaires" ?>
<p><a href="user/userAdmin">Accueil administration</a></p>

 <!-- Tous les commentaires insérés dans un tableau -->
<div class="container-fluid">
    <h2>Voici l'intégralité des commentaires:</h2><br>
    <table class="table table-dark">
        <thead>
            <tr>
            <th scope="col">commentId</th>
            <!-- <th scope="col">Numéro<br>du chapitre</th> -->
            <th scope="col">Date</th>
            <th scope="col">Auteur</th>
            <th scope="col">Commentaire</th>
            <th scope="col">Signalement</th>
            <th scope="col">Action à réaliser</th>
            </tr>
        </thead>
        <tbody>
        <?php foreach ($allComments as $comment): ?>
            <tr>
            <td><?= htmlspecialchars($comment->id()) ?></td>
            <!-- <td><?= htmlspecialchars($comment->postId()) ?></td> -->
            <td><?= htmlspecialchars($comment->date()) ?></td> 
            <td><?= htmlspecialchars($comment->author()) ?></td>
            <td><?= htmlspecialchars($comment->content()) ?></td>
            <td><?= htmlspecialchars($comment->report()) ?></td>
            <td>
                <form action="<?='admin/validate/'. htmlspecialchars($comment->id()) ?>" method="post">
                    <input type="hidden" name="comment_id" value="<?=$comment->report()?>">
                    <button type="submit" class="btn btn-success btn-sm" name="validate" id="validate">Approuver</button>   
                    <button type="submit" class="btn btn-danger btn-sm" name="delete" id="delete">Supprimer</button> 
                </form>
            </td>
            </tr>
        <?php endforeach; ?> 
        </tbody>
    </table>
</div>
<!--Pagination  -->
<div class="row">
    <div class="col-lg-12">
        <ul class="pagination pagination-lg">
            <?php if($currentPage - 1 == 0): ?>
                <li class="page-item disabled">
                    <span><i class="fas fa-arrow-alt-circle-left"></i></span>
                </li>
            <?php else : ?>
                <li class="page-item">
                    <a href="admin/allComments?page=<?=$currentPage - 1 ?>"><i class="fas fa-arrow-alt-circle-left"></i></a>
                </li>
            <?php endif;?>
            <?php 
            for ($i = 1; $i <= $nbPages; $i++) {
                if($i == $currentPage): ?>
            
                <li class="page-item-active">
                    <a><?= $i ?></a>        
                </li>           
            <?php else : ?>
                <li class="page-item">
                    <a href="admin/allComments?page=<?= $i ?>"><i><?= $i ?></i></a>
                </li>
            <?php endif; 
            } ?> <!-- Fin boucle -->
            <?php if($currentPage + 1 > $nbPages): ?>
                <li class="page-item disabled">
                    <span><i class="fas fa-arrow-alt-circle-right"></i></span>
                </li>
            <?php else : ?>
                <li class="page-item">
                    <a href="admin/allComments?page=<?=$currentPage + 1 ?>"><i class="fas fa-arrow-alt-circle-right"></i></a>
                </li>
            <?php endif; ?>     
        </ul>
    </div>
</div>

 