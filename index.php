<?php
/* LE ROUTEUR*/
/*Il récupère le CONTROLLER soit les fonctions de chaque page.
Et applique une fonction selon une action get obtenus soit une page selon la fonction appliqué par le get.*/

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
        elseif ($_GET['action'] == 'connexion') 
        {
            connexion();
        }
        elseif ($_GET['action'] == 'administration') 
        {
            administration();
        }
         elseif ($_GET['action'] == 'listeRestaurant') 
        {
            listeRestaurant();
        }
         elseif ($_GET['action'] == 'ajoutRestaurant') 
        {
            ajoutRestaurant();
        }
         elseif ($_GET['action'] == 'modifRestaurant') 
        {
           modifRestaurant();
        }
         elseif ($_GET['action'] == 'supRestaurant') 
        {
            supRestaurant();
        }
         elseif ($_GET['action'] == 'accessAdministration') 
        {
            accessAdministration();
        }
         elseif ($_GET['action'] == 'receptionEmail') 
        {
            receptionEmail();
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