 <?php $this->title = "Tous les commentaires" ?>
 <a href="admin/homeAdmin">Accueil</a>
 <div class="container-fluid">
    <table class="table table-dark">
        <thead>
            <tr>
            <th scope="col">commentId</th>
            <th scope="col">postId</th>
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
            <td><?= htmlspecialchars($comment->postId()) ?></td>
            <td><?= htmlspecialchars($comment->date()) ?></td>      
            <td><?= htmlspecialchars($comment->author()) ?></td>
            <td><?= htmlspecialchars($comment->content()) ?></td>
            <td><?= htmlspecialchars($comment->report()) ?></td>
            <td><form action="<?='admin/validate/'. htmlspecialchars($comment->id()) ?>" method="post">
                    <input type="hidden" name="comment_id" value="<?=$comment->report()?>">
                    <button type="submit" name="validate" id="validate">Validez</button>   
                </form>
            </td>


            </tr>
            <?php endforeach; ?>  
        </tbody>
    </table>
</div>


 