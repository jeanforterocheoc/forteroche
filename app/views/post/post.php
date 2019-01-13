<?php $this->title = $postComment->title() ?>

    <div class="container-fluid">
        <article>
            <header>
                <a class="btn btn-primary" href="posts/posts">Tous les chapitres</a>
                <h2 class='postTitle'><?= $postComment->title() ?></h2>
                <b><time>Publié le <?= $postComment->date() ?></time></b>
            </header>
            <br>
            <section>
                <p><?= $postComment->content() ?></p>
            </section>
        </article>
        <hr />
        <!-- <h5 class="postComment">Commentaires</h5>
        <div id="commentaire"> -->
          <!-- <?php foreach ($comments as $comment): ?>
              <p><?= htmlspecialchars($comment->getAuthor()) ?></P>
              <p><?= htmlspecialchars($comment->getDate()) ?></P>
              <p><?= htmlspecialchars($comment->getContent()) ?></p> -->

              <!-- Bouton signalement,apparition d'une fenêtre modale -->
              <!-- <button type="button" class="btn btn-primary btn-sm reporting" data-comment-id = "<?= $comment->getId() ?>" data-toggle="modal" data-target="#reportModal">
              Signaler
              </button> -->
          <!-- <?php endforeach; ?> -->
        <!-- </div> -->

        <!-- Formulaire pour le commentaire user -->
        <table id="body">
          <tr>
            <td id="title">Commentaires</td>
          </tr>
          <tr>
            <td id="pagination">
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
                                  <a href="post/postComment/<?=$postComment->id()?>?page=<?=$currentPage - 1 ?>"><i class="fas fa-arrow-alt-circle-left"></i></a>
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
                                  <a href="post/postComment/<?=$postComment->id()?>?page=<?= $i ?>"><i><?= $i ?></i></a>
                              </li>
                          <?php endif;
                          } ?> <!-- Fin boucle -->
                          <?php if($currentPage + 1 > $nbPages): ?>
                              <li class="page-item disabled">
                                  <span><i class="fas fa-arrow-alt-circle-right"></i></span>
                              </li>
                          <?php else : ?>
                              <li class="page-item">
                                  <a href="post/postComment/<?=$postComment->id()?>?page=<?=$currentPage + 1 ?>"><i class="fas fa-arrow-alt-circle-right"></i></a>
                              </li>
                          <?php endif; ?>
                      </ul>
                  </div>
              </div> <!-- Pagination -->
            </td>
          </tr>
          <tr>
            <td id="spaceComments">
              <div id="comments_user">
                <?php foreach ($comments as $comment): ?>
                    <p><?= htmlspecialchars($comment->getAuthor()) ?></P>
                    <p><?= htmlspecialchars($comment->getDate()) ?></P>
                    <p><?= htmlspecialchars($comment->getContent()) ?></p>

                    <!-- Bouton signalement,apparition d'une fenêtre modale -->
                    <button type="button" class="btn btn-primary btn-sm reporting" data-comment-id = "<?= $comment->getId() ?>" data-toggle="modal" data-target="#reportModal">
                    Signaler
                    </button>
                <?php endforeach; ?>
              </div>
            </td>
          </tr>
          <tr>
            <td id="form">
              <table id="form2">
                <tr>
                  <td style="width:30%">
                  <label for="name" style="font-family:Comic Sans MS;">Pseudo</label>
                  </td>
                  <td style="width:60%">
              		<label for="message" style="font-family:Comic Sans MS;">Message</label>
              		</td>
                </tr>
                <tr>
              		<td>
              		<input id="name" type="text"  maxlength="20" />
              		</td>
              		<td>
              		<input id="message" type="text" maxlength="250"  />
              		</td>
              		<td>
              			<button id="submit">Envoyer</button>
              		</td>
              	</tr>
              </table>
            </td>
          </tr>
        </table>

        <!-- Fenêtre modale -->
        <div class="modal fade" id="reportModal" tabindex="-1" role="dialog" aria-labelledby="title-report" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="title-report">Confirmer un signalement</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary submit-reporting">Valider</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                </div>
                </div>
                <input type="hidden" name="id" id="commentId"  value="">
            </div>
        </div><!-- Fenêtre modale -->
        <script type="text/javascript" src="public/js/report.js"></script>
        <script type="text/javascript" src="public/ajax/commentUser.js"></script>
      </div> <!-- container-fluid
