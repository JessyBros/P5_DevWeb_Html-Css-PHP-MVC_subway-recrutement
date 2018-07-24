<!-- LE CONTROLLER -->
<!-- Il récupère les MODELES, soit les requetes SQL-->
<!-- Utilisation de la programmation orienté objet;
conrètement il utilise les requetes sql et les convertis dans une variables-->
<?php
require('model/restaurant.php');
require('model/recrutement.php');

function accueil()
{
    $restaurantManagers = new RestaurantPostManager(); 
    $donneesRestaurant = $restaurantManagers ->donneesRestaurant(); 
    
    $marqueursManagers = new RestaurantPostManager(); 
    $donneesMarqueurs = $marqueursManagers ->marqueurs(); 
    
    require('view/viewAccueil.php');
}

function recrutement()
{
    $choixRestaurantManagers = new RecrutementPostManager(); 
    $choixRestaurant = $choixRestaurantManagers ->choixRestaurant();
    
    $restaurantSelectionnerManagers = new RecrutementPostManager(); 
    $idRestaurant = isset($_GET['restaurant']) ? $_GET['restaurant'] : NULL;  
    $restaurantSelectionner = $restaurantSelectionnerManagers ->restaurantSelectionner($idRestaurant) ;
    
    require('view/viewRecrutement.php');
}