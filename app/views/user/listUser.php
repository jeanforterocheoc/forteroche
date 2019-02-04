<?php $this->title = 'Liste des profils utilisateurs'; ?>
<?php use App\Models\Entity\Messages; ?>
<?php Messages::displayMsg()?>

<p><a href="user/userAdmin">Accueil administration</a></p>
<p><a href="home/homepage" target="_blank">Voir le blog</a></p>


<div class="container" >
  <h4>Liste des profils utilisateurs</h4>
  <table class="table table-dark">
    <thead>
        <tr>
          <th scope="col">Pseudo</th>
          <th scope="col">Email</th>
          <th scope="col">Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($listUser as $user ) : ?>
          <tr class="deleteProfile<?= $user->getId() ?>">
            <td>
              <?= $user->getUsername(); ?>
            </td>
            <td>
              <?= $user->getemail(); ?>
            </td>
            <td>
              <form action="<?= 'user/oneUser/' .$user->getId() ?>" method="post">
                <input type="hidden" value="<?= $user->getId() ?>">
                <button type="submit" class="btn btn-primary btn-sm">Modifier</button>
                <!-- Bouton modal -->
                <button type="button" id="showModal" class="btn btn-primary btn-sm deleteUser" data-user-id = "<?= $user->getId() ?>"  data-toggle="modal" data-target="#deleteModal">
                   Supprimer
                </button>
              </form>
            </td>
        </tr>
      <?php endforeach ?>
    </tbody>
  </table>
</div>

<!-- Fenêtre modale -->
<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="title-delete" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="title-delete">Confirmer la suppression du profil</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-primary submit-delete">Valider</button>
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
            </div>
          </div>
          <input type="hidden" name="id" id="userId"  value="">
        </div>
      </div>