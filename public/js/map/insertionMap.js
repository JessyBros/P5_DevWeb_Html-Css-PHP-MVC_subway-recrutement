var map;

function initMap() {
    map = new google.maps.Map(document.getElementById('map'), {
        center: {
            lat: 48.814794,
            lng: 2.362913
        },
        zoom: 12
    });
  

}
     var monMarqueur = new google.maps.Marker({
        position: {
           lat: 48.814794,
            lng: 2.362913
        },
        map: map,
       title:"hello"
    });
