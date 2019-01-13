<?php $this->title = 'Espace administration'; ?>
<a href="user/userAdmin">accueil administration</a>
<h2>Voici l'ensemble des chapitres!</h2>  
<!-- <?php foreach ($posts as $post) : ?>
<div class="card text-white bg-dark mb-3" style="width: 18rem;">
  <div class="card-body">
    <h5 class="card-title"><?= $post->title() ?></h5>
    <h6 class="card-subtitle mb-2 text-muted">Publié le <?= $post->date()?></h6>
    <p class="card-text"><?= $post->content() ?></p>
  </div>
</div>
<?php endforeach; ?>  -->

<!-- <a href="<?='admin/oneEpisode/'. htmlspecialchars($post->id()) ?>">Editer un chapitre</a><br>
<a href="admin/modifEpisode">Mettre à jour un chapitre</a><br>
<a href="admin/deleteEpisode">Supprimer un chapitre</a><br> -->
<div class="container">
  <div class="row">
    <div class="col-md-12">
      <div class="table-responsive">
          <table class="table table-bordered">
              <thead>
                  <tr>
                  <th>Publié le</th>
                  <th>Titre</th>                
                  <th>Chapitre</th>
                  <th></th>

                  </tr>
              </thead>

              <tbody>
              <?php foreach ($posts as $post) : ?>
              <tr>
                  <td><?= $post->date() ?></td>
                  <td><?= $post->title() ?></td>
                  <td><?= substr($post->content(), 0, 300) ?></td>
                  <td>
                    <form action="<?='admin/oneChapter/'. htmlspecialchars($post->id()) ?>" method="post">
                      <button type="submit" class="btn btn-success btn-sm" name="editer" id="editer">Editer</button>
                    </form>
                  </td>

              </tr>
              <?php endforeach; ?>  
              </tbody>
          </table>
      </div>
    </div>
  </div>
</div>


  