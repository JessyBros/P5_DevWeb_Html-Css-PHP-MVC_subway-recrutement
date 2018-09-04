<?php 
if(isset($_POST['modifierEmail']))
{  
    if ($modificationEmail)
    {
        $messageAlerte="L'email modifié avec success."; 
    }
    else
    {
        $messageAlerte="Erreur, email non modifié. ";
    } 
    
}
else
{
    $messageAlerte="";
}
?>
