<?php
if (isset($_GET['recrutement']))
{
    $restaurantExistant = true;
    foreach ($choixRestaurant as $getRestaurant  ): 
        if ($_GET['recrutement'] == $getRestaurant['url'])
        {
            $restaurantExistant = false;
        }
     endforeach; 
    
    if ($restaurantExistant)
    {
        header('Location: restaurant');
    }
}
