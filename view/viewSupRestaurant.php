<?php $css = "public/css/supRestaurant.css" ?>

<?php ob_start(); ?>

<?php require('public/textFunctions/headerAdministrateur.php'); ?>

<h1>Supprimer un restaurant</h1>

<div id="listeRestaurant">
    <?php  foreach ($restaurants as $restaurant ): ?>
    <a href="supprimer-restaurant-<?= htmlspecialchars($restaurant['id']) ?>">
        <p><span> <?= $restaurant['ville'] ?></span>:
            <?= $restaurant['adresse'] ?>
        </p>
    </a>
    <?php endforeach; ?>
</div>

<form action="supprimer-restaurant-<?= htmlspecialchars($getRestaurant['id']) ?>" method="post" id="formSupprimer">
    <p>Voulez-vous réellement supprimer le restaurant :
        <span><?= $getRestaurant['ville'] ?></span>
    </p>
    <p>attention celui-ci sera déprimé définitivement !</p>
    <input name="idRestaurant" value="<?= htmlspecialchars($getRestaurant['id']) ?>" type="hidden">
    <div>
        <button name="oui">Oui</button> | <button name="non">Non</button>
    </div>
</form>


<?php $content = ob_get_clean(); ?>

<?php require('view/template.php'); ?>
