<?php
/* LE CONTROLLER */
/* Il récupère les MODELES, soit les requetes SQL */
/* Utilisation de la programmation orienté objet;
conrètement il utilise les requetes sql et les convertis dans une variables */
require('model/accueil.php');
require('model/restaurant.php');

function accueil()
{
    $restaurantManagers = new AccueilPostManager(); 
    $donneesRestaurant = $restaurantManagers ->donneesRestaurant(); 
    
    $marqueursManagers = new AccueilPostManager(); 
    $donneesMarqueurs = $marqueursManagers ->marqueurs(); 
    
    require('view/viewAccueil.php');
}

function recrutement()
{
    $choixRestaurantManagers = new RestaurantPostManager(); 
    $choixRestaurant = $choixRestaurantManagers ->choixRestaurant();
    
    $restaurantSelectionnerManagers = new RestaurantPostManager(); 
    $idRestaurant = isset($_GET['recrutement']) ? $_GET['recrutement'] : NULL;  
    $restaurantSelectionner = $restaurantSelectionnerManagers ->restaurantSelectionner($idRestaurant) ;
    
    require('view/viewRestaurant.php');
}
