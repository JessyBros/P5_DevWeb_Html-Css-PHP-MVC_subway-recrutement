<?php 
if (isset($_POST["ajouter"]))
{
    if($ajoutRestaurant)
    {
        $messageAlerte=" Le restaurant a été ajouté !";
    }
    else
    {
        $messageAlerte=" Erreur, aucun restaurant n\'a été ajouté !";
    }
}
else
{
    $messageAlerte="";    
}
