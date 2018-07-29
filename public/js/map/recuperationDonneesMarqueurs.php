<!-- Au clique de chaque marqueur affiche les donnés seon le marqueurs correspondant et fait apparaitre la div contenant ces informations-->    
for (var i = 0; i < tableauMarqueur.length; i++) {



        (function nombreDeMarqueur(i) {
            tableauMarqueur[i].addListener('click', function() {
                document.getElementById("villeMarqueur").innerHTML = tableauMarqueur[i].ville;
                document.getElementById("adresseMarqueur").innerHTML = tableauMarqueur[i].adresse;
                document.getElementById("telephoneMarqueur").innerHTML = tableauMarqueur[i].telephone;
                document.getElementById("horairesMarqueur").innerHTML = tableauMarqueur[i].horaires;
                                               
                document.getElementById("infoDuRestaurant").style.display="block";
            });

        })
        (i);
    }
