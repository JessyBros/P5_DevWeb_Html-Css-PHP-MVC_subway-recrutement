<!-- MODELE 2 -->
<!--Progammation orienté OBJET PUR-->
<!-- Dans une classe private, il insère la connexion à la base de donné-->
<!-- Dans des functions public appel la fonction private connexion et utilisation des requetes SQL (query, prepare, exec...)-->
<?php
class UtilisateurPostManager{

    // connexion à la BASE DE DONNE
     private function connexion()
    {
        try
        {
            $db = new PDO('mysql:host=localhost;dbname=subwayrecrutement;charset=utf8', 'root', '');
        }
        catch(Exception $e)
        {
            die('Erreur : '.$e->getMessage());
        }
        return $db;
    }
}