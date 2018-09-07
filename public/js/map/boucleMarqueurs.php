<!-- Insère dans un tableau tous les restaurants enregistrés dans la base de donnés retransmis sous forme de marqueurs sur la map.-->
<script>
    
ajaxGet("public/json/marqueursDatas.json", 
function (reponse) {
   var  marqueurs = JSON.parse(reponse);
    
    for (var i = 0; i < marqueurs.length; i++) {
     var monMarqueur = new google.maps.Marker({
            position: {
                lat: marqueurs[i].lat,
            lng: marqueurs[i].lng
            },
            map: map,
         title : marqueurs[i].ville,
         ville: marqueurs[i].ville,
         adresse : marqueurs[i].adresse,
         telephone : marqueurs[i].telephone,
         horaires : marqueurs[i].horaires

        });

        tableauMarqueur.push(monMarqueur);
    }
    recuperationDonneesMarqueurs();
});
</script>
