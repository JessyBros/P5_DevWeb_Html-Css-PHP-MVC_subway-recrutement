<?php 
if(isset($_POST['oui']))
{  
    if ($supRestaurant)
    {
        $messageAlerte="Le restaurant a bien été supprimé "; 
         header("Location:supRestaurant");
    }
    else
    {
        $messageAlerte="Erreur, aucun restaurant n'a été supprimé ";
    } 
    
}
elseif (isset($_POST['non']))
{
     header("Location:supRestaurant");
     
}
else
{
    $messageAlerte="";
}
?>
