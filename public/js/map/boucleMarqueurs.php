<!-- Insère dans un tableau tous les restaurants enregistrés dans la base de donnés retransmis sous forme de marqueurs sur la map.-->

var tableauMarqueur = [];

<?php while ($marqueurs = $donneesMarqueurs->fetch()) {?>

     var monMarqueur = new google.maps.Marker({
        position: {
           lat: <?= htmlspecialchars($marqueurs['lat']) ?>,
            lng: <?= htmlspecialchars($marqueurs['lng']) ?>
        },
        map: map,
        title:"<?= htmlspecialchars($marqueurs['ville']) ?>",
        ville:"<?= htmlspecialchars($marqueurs['ville']) ?>",
        adresse:"<?= htmlspecialchars($marqueurs['adresse']) ?>",
        telephone:"<?= htmlspecialchars($marqueurs['telephone']) ?>",
        horaires:"<?= htmlspecialchars($marqueurs['horaires']) ?>"

    });

    tableauMarqueur.push(monMarqueur);

<?php }  $donneesMarqueurs->closeCursor(); ?> 







