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
elseif (isset($_POST["modifier"]))
{
  if($modifRestaurant)
  {
    $messageAlerte=" Le restaurant a été modifié !";
  }
    else
    {
    $messageAlerte=" Erreur, lors de la modification !";
    } 
}
elseif(isset($_POST['oui']))
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