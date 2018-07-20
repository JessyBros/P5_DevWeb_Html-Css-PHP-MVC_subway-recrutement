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
    
    require('view/viewAccueil.php');
}

function recrutement()
{
    require('view/viewRecrutement.php');
}