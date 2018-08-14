<!-- LE ROUTEUR-->
<!-- Il récupère le CONTROLLER soit les fonctions de chaque page.
Et applique une fonction selon une action get obtenus soit une page selon la fonction appliqué par le get.-->

<?php
require('controller/frontend.php');

try {
    if (isset($_GET['action']))
    {
        if ($_GET['action'] == 'accueil') 
        {
            accueil();
        }
        elseif ($_GET['action'] == 'restaurant') 
        {
            recrutement();
        }
    }
    else
    {
        accueil();
    }
}
catch(Exception $e)
{
    echo 'Erreur : ' . $e->getMessage();
}