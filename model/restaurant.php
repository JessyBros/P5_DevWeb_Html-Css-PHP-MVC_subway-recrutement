<?php
/* MODELE 2 */
/* Progammation orienté OBJET PUR */
/* Dans une classe private, il insère la connexion à la base de donné */
/* Dans des functions public appel la fonction private connexion et utilisation des requetes SQL (query, prepare, exec...) */
class RestaurantPostManager{

    // connexion à la BASE DE DONNE
     private function connexion()
    {
        try
        {
            $db = new PDO('mysql:host=localhost;dbname=id6801523_subwayrecrutement','id6801523_subwayrecrutement','subwayrecrutement');
        }
        catch(Exception $e)
        {
            die('Erreur : '.$e->getMessage());
        }
        return $db;
    }
    
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
}
