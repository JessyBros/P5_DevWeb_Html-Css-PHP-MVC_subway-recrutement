 <script>var map;

function initMap() {
    map = new google.maps.Map(document.getElementById('map'), {
        center: {
            lat: 48.842752, 
            lng: 2.435461
        },
        zoom: 11
    });
  
 <?php require('public/js/map/boucleMarqueurs.php'); ?>

}
</script>   

