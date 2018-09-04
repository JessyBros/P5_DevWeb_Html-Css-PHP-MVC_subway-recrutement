<?php 
session_start();
if(isset($_SESSION["connecte"]) && isset($_SESSION["pseudo"]))
{
    if( ($_SESSION["connecte"] == false) || ($_SESSION["pseudo"] !="boss"))
    {
        header("Location:accueil");
    }
}
else{
    header("Location:accueil");
}