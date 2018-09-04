<?php $css = "public/css/ajoutRestaurant.css" ?>

<?php ob_start(); ?>

<?php require('public/textFunctions/headerAdministrateur.php'); ?>

<h1>Ajouter un restaurant</h1>

<form action="ajoutRestaurant" method="post" id="formAjouter">

    <p><span>Ville</span> : <br><input name="ville" id="ville" required="" type="text"></p>
    <p><span>Adresse</span> :<br> <input name="adresse" id="adresse" required="" type="text"></p>
    <p><span>telephone</span> :<br> <input name="telephone" id="telephone" required="" type="text"></p>
    <p><span>horaires</span> :<br> <input name="horaires" id="horaires" required="" type="text"></p>
    <p><span>Url du Restaurant (image)</span> :<br> <input name="urlImage" id="urlImage" required="" type="text"></p>
    <p><span>Latitude (google map)</span> :<br> <input name="lat" id="lat" placeholder="48.814794" required="" type="text"></p>
    <p><span>Longitude (google map)</span> :<br> <input name="lng" id="lng" placeholder="2.362913" required="" type="text"></p>
    <p><span>Url de la ville (SANS accent)</span> :<br> <input name="urlVille" id="urlVille" placeholder="Le-Kremlin-Bicetre ou LeKremlinBicetre" required="" type="text"></p>

    <input type="submit" name="ajouter" value="Ajouter le restaurant" />
</form>

<div id="alerte">
    <span id="messageAlerte"><?= $messageAlerte ?></span>
</div>


<?php $content = ob_get_clean(); ?>

<?php require('view/template.php'); ?>



