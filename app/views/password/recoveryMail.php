<?php $this->title = 'Code de vérification'; ?>
<?php use App\Models\Entity\Messages; ?>
<?php Messages::displayMsg()?>

<form action="" method='post'class="form-signin">
    <div class="text-center mb-4">
        <h4 class="h3 mb-3 font-weight-normal">Code de vérification</h4>
        <p>Entrez votre code reçu par mail</p>
    </div>
    <div class="form-label-group">
        <input type="text" class="form-control" name="verif_code" id="verif_code" placeholder="Code">
        <label for="verif_code">Code</label>
    </div>

    <button class="btn btn-primary " type="submit" name="verif_submit">Envoyer</button>    
</form>
        



