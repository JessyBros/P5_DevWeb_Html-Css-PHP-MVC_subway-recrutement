<!-- Insère une map google et récupère des fichiers liés au marqueurs implantés sur la carte-->
<script>
    var map;

    function initMap() {
        map = new google.maps.Map(document.getElementById('map'), {
            center: {
                lat: 48.842752,
                lng: 2.435461
            },
            zoom: 11
        });

        <?php require('public/js/map/boucleMarqueurs.php'); ?>
        <?php require('public/js/map/recuperationDonneesMarqueurs.php'); ?>
    }
 
</script>
