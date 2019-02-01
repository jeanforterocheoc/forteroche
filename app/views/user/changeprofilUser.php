<?php $this->title = 'Modifier un profil utilisateur'; ?>
<?php use App\models\Messages; ?>
<?php Messages::displayMsg()?>

<p><a href="user/userAdmin">Accueil administration</a></p><br>
<p><a href="home/homepage" target="_blank">Voir le blog</a></p><br>
<p><a href="user/listUser">Liste des profils</a></p><br>



<form class="form-signin" action="" method="post">
<div class="text-center mb-4">
        <h4 class="h3 mb-3 font-weight-normal">Modifier le profil de <?= $oneUser->getUsername() ?></h4>
      </div>

      <div class="form-label-group">
        <label for="changeUsername">Nom d'utilisateur</label>
        <input type="text"  value="<?= $oneUser->getUserName() ?>" class="form-control" name="changeUsername"  id="changeUsername" >
      </div>

      <div class="form-label-group">
        <label for="password">Mot de passe</label>
        <input type="password" class="form-control" name="password" id="password" >
      </div>

      <div class="form-label-group">
        <label for="password">Confirmation du mot de passe</label>
        <input type="password" class="form-control" name="passwordConfirm" id="passwordConfirm" >
      </div>

       <div class="form-label-group">
        <label for="email">Adresse mail</label>
        <input type="email" class="form-control" name="email" value="<?= $oneUser->getEmail() ?>" id="email" >
      </div>

      <input type="hidden" name="id" value="<?= $oneUser->getId() ?>">
       <button class="btn btn-sm btn-primary " type="submit" name="changeProfileUser" id="changeProfileUser">Modifier le profil</button>
</form>