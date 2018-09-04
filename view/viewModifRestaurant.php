<?php $css = "public/css/modifRestaurant.css" ?>

<?php ob_start(); ?>

<?php require('public/textFunctions/headerAdministrateur.php'); ?>

<h1>Modifier un restaurant</h1>



<div id="listeRestaurant">
    <h1>La liste des restaurants</h1>
    <?php  foreach ($restaurants as $restaurant ): ?>
    <a href="modifier-restaurant-<?= htmlspecialchars($restaurant['id']) ?>">
        <p><span><?= $restaurant['ville'] ?></span> :
            <?= $restaurant['adresse'] ?>
        </p>
    </a>
    <?php endforeach; ?>
</div>

<form action="modifier-restaurant-<?= htmlspecialchars($getRestaurant['id']) ?>" method="post" id="formModifier">


    <p><span>Ville</span> :<br> <input name="ville" value="<?= htmlspecialchars($getRestaurant['ville']) ?>" id="ville" required="" type="text"></p>

    <p><span>Adresse</span> :<br> <input name="adresse" value="<?= htmlspecialchars($getRestaurant['adresse']) ?>" id="adresse" required="" type="text"></p>

    <p><span>Téléphone</span> :<br> <input name="telephone" value="<?= htmlspecialchars($getRestaurant['telephone']) ?>" id="telephone" required="" type="text"></p>

    <p><span>Horaires</span> :<br> <input name="horaires" value="<?= htmlspecialchars($getRestaurant['horaires']) ?>" id="horaires" required="" type="text"></p>

    <p><span>Url du Restaurant (image)</span> :<br> <input name="urlImage" value="<?= htmlspecialchars($getRestaurant['image']) ?>" id="urlImage" required="" type="text"></p>

    <p><span>Latitude (google map</span>) :<br> <input name="lat" value="<?= htmlspecialchars($getRestaurant['lat']) ?>" id="lat" required="" type="text"></p>

    <p><span>Longitude (google map)</span> :<br> <input name="lng" value="<?= htmlspecialchars($getRestaurant['lng']) ?>" id="lng" required="" type="text"></p>

    <p><span>Url de la ville (SANS accent)</span> :<br> <input name="urlVille" value="<?= htmlspecialchars($getRestaurant['url']) ?>" id="urlVille" required="" type="text"></p>

    <input name="id" value="<?= htmlspecialchars($getRestaurant['id']) ?>" required="" type="hidden">


    <input type="submit" name="modifier" value="modifier le restaurant" />

</form>

<div id="alerte">
    <span id="messageAlerte"><?= $messageAlerte ?></span>
</div>
<a href="modifRestaurant">
    <p id="choixRestaurant">Retour au choix des restaurants</p>
</a>



<?php $content = ob_get_clean(); ?>

<?php require('view/template.php'); ?>
