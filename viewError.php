<?php $title = 'Nouveau roman de Jean Forteroche : Billet simple pour l\'Alaska '; ?>

<?php ob_start() ?>
<p>Erreur : <?= $msgError ?></p>
<?php $contenu = ob_get_clean(); ?>

<?php require 'template.php'; ?>
