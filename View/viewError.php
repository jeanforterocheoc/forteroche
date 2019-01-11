<?php $title = 'Billet simple pour l\'Alaska de Jean Forteroche'; ?>

<?php ob_start() ?>
<p>Erreur : <?= $msgError ?></p>
<?php $contenu = ob_get_clean(); ?>

<?php require 'View/template.php'; ?>
