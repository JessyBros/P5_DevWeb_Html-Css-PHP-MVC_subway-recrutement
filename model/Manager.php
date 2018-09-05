<?php

namespace Subway\ProjetOC;

class Manager
{
    
     protected function connexion()
    {
        try
        {
            //$db = new PDO('mysql:host=localhost;dbname=id6801523_subwayrecrutement','id6801523_subwayrecrutement','subwayrecrutement');
            $db = new \PDO('mysql:host=localhost;dbname=subwayrecrutement;charset=utf8', 'root', '');
        }
        catch(Exception $e)
        {
            die('Erreur : '.$e->getMessage());
        }
        return $db;
    }
}