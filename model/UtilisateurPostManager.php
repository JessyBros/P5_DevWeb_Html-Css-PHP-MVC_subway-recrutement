<?php
namespace Subway\Projet\Model;

require_once("model/Manager.php");


class UtilisateurPostManager extends Manager{

   
    //Page 1 : Accueil
    public function donneesRestaurant() 
    {   
        $connexion = $this-> connexion();
        $req = $connexion->query('SELECT * FROM restaurant ORDER BY id ');
        return $req;
    }
    
    public function marqueurs()
    {
        $connexion = $this-> connexion();
        $req = $connexion->query('SELECT * FROM restaurant ORDER BY id ');
        return $req;
    }
    
    
    //Page 2 : Formulaire recrutement
    public function choixRestaurant() 
    {   
        $connexion = $this-> connexion();
        $req = $connexion->query('SELECT id, url, ville FROM restaurant ORDER BY id ');
        return $req;
    }
    
    public function restaurantSelectionner($idRestaurant) 
    {   
        $connexion = $this-> connexion($idRestaurant);
        $req = $connexion->prepare('SELECT url, ville, adresse FROM restaurant WHERE url = ? ');
        $req->execute(array($idRestaurant));
        $post = $req->fetch();
        return $post;
    }
    
    
    //Page connexion : accès à l'espace administrateur
    public function connexionAdministrateur() 
    {   
        $connexion = $this-> connexion();
        $req = $connexion->query('SELECT pseudo, motDePasse FROM administrateur');
        $req->execute(array());
        $post = $req->fetch();
        return $post;
    }
    
    public function recuperationEmail()
    {   
        $connexion = $this-> connexion();
        $req = $connexion->query('SELECT email FROM email');
        $req->execute(array());
        $retour = $req->fetch();
        return $retour;
    }    
    
}