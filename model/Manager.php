<?php

namespace Subway\ProjetOC;

class Manager
{
    
     protected function connexion()
    {
        try
        {
            //$db = new PDO('mysql:host=localhost;dbname=id6801523_subwayrecrutement','id6801523_subwayrecrutement','subwayrecrutement');
            $db = new \PDO('mysql://b92bc0b589c008:ed49513f@eu-cdbr-west-01.cleardb.com/heroku_574b7fa2ec1111f?reconnect=true');
        }
        catch(Exception $e)
        {
            die('Erreur : '.$e->getMessage());
        }
        return $db;
    }
}
mysql://
b92bc0b589c008
:
ed49513f
@
eu-cdbr-west-01.cleardb.com
/heroku_574b7fa2ec1111f?reconnect=true