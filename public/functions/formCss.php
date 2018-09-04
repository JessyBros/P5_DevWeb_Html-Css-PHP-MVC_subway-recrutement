<?php 
$message = "";
if (isset($_GET['restaurant']))
{
    ?>
    <style>
        #listeRestaurant {
            display: none;
        }
    </style>
    <?php        
}
else
{
    ?>
        <style>
            form {
            display: none;
        }
            #choixRestaurant{
                display: none;
            }

        </style>
        <?php
}
?>
