
<?php while ($marqueurs = $donneesMarqueurs->fetch()) {?>

     var monMarqueur = new google.maps.Marker({
        position: {
           lat: <?= htmlspecialchars($marqueurs['lat']) ?>,
            lng: <?= htmlspecialchars($marqueurs['lng']) ?>
        },
        map: map,
       title:"<?= htmlspecialchars($marqueurs['ville']) ?>" 
    });

<?php }  $donneesMarqueurs->closeCursor(); ?> 