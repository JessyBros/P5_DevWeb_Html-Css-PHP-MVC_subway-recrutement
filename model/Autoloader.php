<?php
namespace Subway\ProjetOC;

class Autoloader{

static function register(){
     spl_autoload_register(array(__CLASS__, 'autoload'));
     }
    
    static function autoload($class){
        $class = str_replace('Subway\ProjetOC\\', 'model/', $class);
        require $class . '.php';
    }

}