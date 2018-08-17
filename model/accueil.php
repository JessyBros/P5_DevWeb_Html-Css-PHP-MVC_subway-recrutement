<?php
/* MODELE 1 */
/* Progammation orienté OBJET PUR */
/* Dans une classe private, il insère la connexion à la base de donné */
/* Dans des functions public appel la fonction private connexion et utilisation des requetes SQL (query, prepare, exec...)*/
class AccueilPostManager{

    // connexion à la BASE DE DONNE
     private function connexion()
    {
        try
        {
            //$db = new PDO('mysql:host=localhost;dbname=id6801523_subwayrecrutement','id6801523_subwayrecrutement','subwayrecrutement');
            $db = new PDO('mysql:host=localhost;dbname=subwayrecrutement;charset=utf8', 'root', '');
        }
        catch(Exception $e)
        {
            die('Erreur : '.$e->getMessage());
        }
        return $db;
    }
    
     public function donneesRestaurant() // affiche les trois dernier episode
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
    
}