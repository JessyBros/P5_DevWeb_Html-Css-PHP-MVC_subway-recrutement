<?php 
if (isset($_POST["modifier"]))
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
else
{
    $messageAlerte="";    
}
