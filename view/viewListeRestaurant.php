<?php $css = "public/css/listeRestaurant.css" ?>

<?php ob_start(); ?>

 <?php require('public/textFunctions/headerAdministrateur.php'); ?>

<h1>La liste des restaurants</h1>


<?php  foreach ($restaurants as $restaurant ): ?>
<p> <span><?= $restaurant['ville'] ?></span> : <?= $restaurant['adresse'] ?></p>
<?php endforeach; ?>

<?php $content = ob_get_clean(); ?>

<?php require('view/template.php'); ?>


