/* Insère une map google et récupère des fichiers liés au marqueurs implantés sur la carte */

var map;
var tableauMarqueur = [];

function initMap() {
    map = new google.maps.Map(document.getElementById('map'), {
        center: {
            lat: 48.842752,
            lng: 2.435461
        },
        zoom: 11
    });

    intregrationDesMarqueurs();
    recuperationDonneesMarqueurs();
}
