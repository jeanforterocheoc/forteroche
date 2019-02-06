<?php $this->title = 'Réinitialisation du mot de passe'; ?>
<?php use App\Models\Entity\Messages; ?>
<?php Messages::displayMsg()?>

<form action="" method='post' class="form-signin">
    <div class="text-center mb-4">
        <h4 class="h3 mb-3 font-weight-normal">Réinitialisation du mot de passe</h4>
        <p>Entrez votre mot de passe</p>
    </div>
    <div class="form-label-group">
        <input type="password" class="form-control" name="newPass" id="newPass" placeholder="Nouveau mot de passe">
        <label for="pass">Nouveau mot de passe</label>
    </div> 
    <div class="form-label-group">
        <input type="password" class="form-control" name="newPassVerif" id="newPassVerif" placeholder="Confirmation du mot de passe">
        <label for="pass">Confirmation du mot de passe</label>
    </div>          

    <button class="btn btn-sm btn-primary " type="submit" name="validate_submit" >Validez</button>    
</form>
        