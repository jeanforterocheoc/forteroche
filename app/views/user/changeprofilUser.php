<?php $this->title = 'Modifier un profil utilisateur'; ?>
<?php use App\Models\Entity\Messages; ?>
<?php Messages::displayMsg()?>

<div class="text-center changeProfil">
  <form class="form-signin" action="" method="post">
    <div class="text-center mb-4">
      <h5 class="h3 mb-3 font-weight-normal">Modifier le profil de <?= $oneUser->getUsername() ?></h5>
    </div>

    <div class="form-label-group">
      <input type="text"  value="<?= $oneUser->getUserName() ?>" class="form-control" name="changeUsername"  id="changeUsername" placeholder="Nom d'utilisateur">
      <label for="changeUsername">Nom d'utilisateur</label>
    </div>

    <div class="form-label-group">
      <input type="password" class="form-control" name="password" id="password" placeholder="Mot de passe">
      <label for="password">Mot de passe</label>
    </div>

    <div class="form-label-group">
      <input type="password" class="form-control" name="passwordConfirm" id="passwordConfirm" placeholder="Confirmation du mot de passe">
      <label for="password">Confirmation du mot de passe</label>
    </div>

    <div class="form-label-group">
      <input type="email" class="form-control" name="email" value="<?= $oneUser->getEmail() ?>" id="email" placeholder="Adresse mail">
      <label for="email">Adresse mail</label>
    </div>

    <input type="hidden" name="id" value="<?= $oneUser->getId() ?>">
    <button class="btn btn-sm btn-primary " type="submit" name="changeProfileUser" id="changeProfileUser">Modifier le profil</button>
  </form>
</div>