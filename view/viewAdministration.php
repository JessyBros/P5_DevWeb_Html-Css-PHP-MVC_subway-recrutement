<?php $css = "public/css/administration.css" ?>

<?php ob_start(); ?>
<script src="public/js/crud.js"></script>
<?php require('public/textFunctions/headerAdministrateur.php'); ?>

<div id="page">
    <p onclick="crud()">Fonctions des restaurants</p>

    <ul id="crud">
        <a href="listeRestaurant">
            <li>Listes des restaurants</li>
        </a>

        <a href="ajoutRestaurant">
            <li>Ajouter un restaurant</li>
        </a>

        <a href="modifRestaurant">
            <li>Modifier un restaurant</li>
        </a>

        <a href="supRestaurant">
            <li>Supprimer un restaurant</li>
        </a>

    </ul><br>


    <a href="receptionEmail">
        <p id="receptionEmail">Modifier la reception des mails</p>
    </a><br>
    <a href="accessAdministration">
        <p>Changer le mot de passe d'administration</p>
    </a><br>
    <a href="public/functions/deconnexion.php">
        <p id="deconnexion">Déconnexion</p>
    </a>
</div>
<script src="public/js/crud.js"></script>
<?php $content = ob_get_clean(); ?>

<?php require('view/template.php'); ?>
