<?php
/* LE CONTROLLER */
/* Il récupère les MODELES, soit les requetes SQL */
/* Utilisation de la programmation orienté objet;
conrètement il utilise les requetes sql et les convertis dans une variables */

use \Subway\Projet\Model\UtilisateurPostManager;
use \Subway\Projet\Model\AdministrationPostManager;


require('model/UtilisateurPostManager.php');
require('model/AdministrationPostManager.php');

function accueil()
{
    $restaurantManagers = new UtilisateurPostManager(); 
    $donneesRestaurant = $restaurantManagers ->donneesRestaurant(); 
    
    $marqueursManagers = new UtilisateurPostManager(); 
    $donneesMarqueurs = $marqueursManagers ->marqueurs(); 
    
    
    require('view/viewAccueil.php');
}

function recrutement()
{
    $choixRestaurantManagers = new UtilisateurPostManager(); 
    $choixRestaurant = $choixRestaurantManagers ->choixRestaurant();
    
    $recuperationRestaurantManagers = new UtilisateurPostManager(); 
    $recuperationRestaurant = $recuperationRestaurantManagers ->choixRestaurant();
    require('public/functions/verificationGetRestaurant.php');
    
    $restaurantSelectionnerManagers = new UtilisateurPostManager(); 
    $idRestaurant = isset($_GET['recrutement']) ? $_GET['recrutement'] : NULL;  
    $restaurantSelectionner = $restaurantSelectionnerManagers ->restaurantSelectionner($idRestaurant);
    
    $recuperationEmailManager = new AdministrationPostManager(); 
    $recuperationEmail = $recuperationEmailManager-> recuperationEmail();
    
    require('view/viewRestaurant.php');
}

function connexion()
{
    $connexionAdministrateur = new UtilisateurPostManager(); 
    $connexion = $connexionAdministrateur-> connexionAdministrateur();
    
    require('public/functions/connexion.php');
    require('view/viewConnexion.php');
}

function administration()
{
    require('public/functions/verificationConnexion.php');
    require('view/viewAdministration.php');
}

function listeRestaurant()
{
    require('public/functions/verificationConnexion.php');
    $listeRestaurantManager = new AdministrationPostManager(); 
    $restaurants = $listeRestaurantManager->listeRestaurant();
    
    require('view/viewListeRestaurant.php');
}


function ajoutRestaurant()
{
    require('public/functions/verificationConnexion.php');
     $ajoutRestaurantManager = new AdministrationPostManager();
    
    if (isset($_POST["ajouter"]))
    {
        $ville = isset($_POST['ville']) ? $_POST['ville'] : NULL;
        $adresse = isset($_POST['adresse']) ? $_POST['adresse'] : NULL;
        $telephone = isset($_POST['telephone']) ? $_POST['telephone'] : NULL;
        $horaires = isset($_POST['horaires']) ? $_POST['horaires'] : NULL;
        $urlImage = isset($_POST['urlImage']) ? $_POST['urlImage'] : NULL;
        $lat = isset($_POST['lat']) ? $_POST['lat'] : NULL;
        $lng = isset($_POST['lng']) ? $_POST['lng'] : NULL;
        $urlVille = isset($_POST['urlVille']) ? $_POST['urlVille'] : NULL;

        $ajoutRestaurant = $ajoutRestaurantManager->ajoutRestaurant($ville,$adresse,$telephone,$horaires,$urlImage,$lat,$lng,$urlVille);
    }
    
   require('public/functions/ajoutRestaurant.php');

    require('view/viewAjoutRestaurant.php');
}


function modifRestaurant()
{
    require('public/functions/verificationConnexion.php');
    
    $listeRestaurantManager = new AdministrationPostManager(); 
    $restaurants = $listeRestaurantManager->listeRestaurant();
        
    $modificationRestaurantManager = new AdministrationPostManager();
    if (isset($_POST["modifier"]))
    {
        $ville = isset($_POST['ville']) ? $_POST['ville'] : NULL;
        $adresse = isset($_POST['adresse']) ? $_POST['adresse'] : NULL;
        $telephone = isset($_POST['telephone']) ? $_POST['telephone'] : NULL;
        $horaires = isset($_POST['horaires']) ? $_POST['horaires'] : NULL;
        $urlImage = isset($_POST['urlImage']) ? $_POST['urlImage'] : NULL;
        $lat = isset($_POST['lat']) ? $_POST['lat'] : NULL;
        $lng = isset($_POST['lng']) ? $_POST['lng'] : NULL;
        $urlVille = isset($_POST['urlVille']) ? $_POST['urlVille'] : NULL;
        $recuperationRestaurant = isset($_POST['id']) ? $_POST['id'] : NULL;
        
        $modifRestaurant = $modificationRestaurantManager->modifRestaurant($ville,$adresse,$telephone,$horaires,$urlImage,$lat,$lng,$urlVille,$recuperationRestaurant);
    }
    
    require('public/functions/modifRestaurant.php');
    
     $getRestaurantManager = new AdministrationPostManager();
        $restaurantSelectionner  = isset($_GET['restaurant']) ? $_GET['restaurant'] : NULL;
    $getRestaurant = $getRestaurantManager->choixRestaurant($restaurantSelectionner);
    
    require('view/viewModifRestaurant.php');
    require('public/functions/formCss.php');
}

function supRestaurant()
{
    require('public/functions/verificationConnexion.php');
    
    $listeRestaurantManager = new AdministrationPostManager(); 
    $restaurants = $listeRestaurantManager->listeRestaurant();
    
    $suppressionRestaurantManager = new AdministrationPostManager();
    if (isset($_POST["oui"]))
    {
        $supprimerLeRestaurant  = isset($_POST['idRestaurant']) ? $_POST['idRestaurant'] : NULL;
        $supRestaurant = $suppressionRestaurantManager->supRestaurant($supprimerLeRestaurant);
    }
    
    require('public/functions/supRestaurant.php');
    $getRestaurantManager = new AdministrationPostManager();
        $restaurantSelectionner  = isset($_GET['restaurant']) ? $_GET['restaurant'] : NULL;
    $getRestaurant = $getRestaurantManager->choixRestaurant($restaurantSelectionner);
    
    require('view/viewSupRestaurant.php');
    require('public/functions/formCss.php');
}

function  accessAdministration()
{
    require('public/functions/verificationConnexion.php');
    
    $verificationPseudoMdpManager = new AdministrationPostManager(); 
    $verificationPseudoMdp = $verificationPseudoMdpManager-> verificationPseudoMdp();
    
    if (isset($_POST['modifierAccess']))
    {
        $modificationPseudoMdpManager = new AdministrationPostManager();

        $pseudo = isset($_POST['pseudo']) ? $_POST['pseudo'] : NULL;
        $motDePasseActuel = isset($_POST['motDePasseActuel']) ? $_POST['motDePasseActuel'] : NULL;
        $nouveauMotDePasse = isset($_POST['nouveauMotDePasse']) ? $_POST['nouveauMotDePasse'] : NULL;        
        $modificationPseudoMdp = $modificationPseudoMdpManager->modificationPseudoMdp($pseudo,$nouveauMotDePasse);
    }
    
    require('public/functions/accessAdministration.php');
    require('view/viewAccessAdministration.php');
    
    
}

function receptionEmail()
{
    require('public/functions/verificationConnexion.php');
    
    $recuperationEmailManager = new AdministrationPostManager(); 
    $recuperationEmail = $recuperationEmailManager-> recuperationEmail();
    
    if (isset($_POST['modifierEmail']))
    {
        $modificationEmailManager = new AdministrationPostManager();

        $email = isset($_POST['email']) ? $_POST['email'] : NULL;
       
        $modificationEmail = $modificationEmailManager->modificationEmail($email);
    }
    
    require('public/functions/receptionEmail.php');
    require('view/viewReceptionEmail.php');
    
}
