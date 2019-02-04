
<?php $this->title = 'Modifier votre profil'; ?>
<?php use App\Models\Entity\Messages; ?>
<?php Messages::displayMsg()?>

<p><a href="user/userAdmin">Accueil administration</a></p>
<p><a href="home/homepage" target="_blank">Voir le blog</a></p>


  <div class="text-center modProfil">

    <form class="form-signin " action="user/modifyUser" method="post" >
      <div class="text-center mb-4">
        <h4 class="h3 mb-3 font-weight-normal"><?= $user->getUsername()?> , ici vous pouvez modifier votre profil</h4>
      </div>

      <div class="form-label">
        <label for="username">Nom d'utilisateur</label>
        <input type="text" class="form-control" name="username" value="<?= $user->getUsername()?>" id="username" >
      </div>

      <div class="form-label">
        <label for="password">Mot de passe</label>
        <input type="password" class="form-control" name="password" id="password" >
      </div>

      <div class="form-label">
        <label for="password">Confirmation du mot de passe</label>
        <input type="password" class="form-control" name="passwordConfirm" id="passwordConfirm" >
      </div>

       <div class="form-label">
        <label for="email">Adresse mail</label>
        <input type="email" class="form-control" name="email" value="<?= $user->getEmail()?>" id="email" >
      </div>

        <br>
        <input type="hidden" name="id" value="<?= $user->getId()?>">
        <button class="btn btn-sm btn-primary " type="submit" name="changeProfile" id="changeProfile">Modifier mon profil</button>
       <!-- <button type="submit" id="showModal" class="btn btn-sm btn-primary modifyUser "  data-user-id = "<?= $user->getId() ?>" data-user-username="<?= $user->getUsername()?>" data-user-password="<?= $user->getPassword()?>" data-user-email="<?= $user->getEmail()?>" data-toggle="modal" data-target="#modifModal">
          Modifier mon profil
      </button> -->

      <p class="mt-5 mb-3 text-muted text-center">&copy; 2018-2019</p>
    </form>
</div>

<!-- Fenêtre modale
<div class="modal fade" id="modifModal" tabindex="-1" role="dialog" aria-labelledby="title-modif" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="title-modif">Confirmez-vous la modificaton? </h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-primary submit-modifUser">Oui</button>
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
            </div>
          </div>
          <input type="hidden" name="id" id="userId"  value="">
          <input type="hidden" name="username" id="username"  value="">
          <input type="hidden" name="password" id="password"  value="">
          <input type="hidden" name="email" id="email"  value="">
        </div>
      </div> -->

