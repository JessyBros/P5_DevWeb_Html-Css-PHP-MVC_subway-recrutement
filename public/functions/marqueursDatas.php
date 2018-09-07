<?php
$file ="public/json/marqueursDatas.json";
$tablDatas = [];
foreach ($donneesRestaurant as $marqueurs  ):

    $array = Array(
        'lat' => floatval($marqueurs['lat']),
        'lng' => floatval($marqueurs['lng']),
        'title' => htmlentities($marqueurs['ville']),
        'ville' => htmlentities($marqueurs['ville']),
        'adresse' => htmlentities($marqueurs['adresse']),
        'telephone' => htmlentities($marqueurs['telephone']),
        'horaires' => htmlentities($marqueurs['horaires'])
    );

    $tablDatas[] = $array;
endforeach;

$contenu_json = json_encode($tablDatas);

$current = file_get_contents($file);
$current = $contenu_json;
        // On stocke tout le JSON
        file_put_contents($file , $current);

