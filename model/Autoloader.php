<?php
class Autoloader{


static function register(){
     spl_autoload-register(array(--CLASS--, 'autoload'));
     }
    
    static function autoload($class_name){
        require $class_name. '.php';
    }


}
//require 'model/Autoloader.php';
//Autoloader::register();