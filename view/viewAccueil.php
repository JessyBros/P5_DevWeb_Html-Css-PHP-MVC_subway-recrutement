<!-- Page d'accueil qui va être récupéré par le CONTROLLER
        - image de présentation qui ramène à la page recrutement
        - Le recrutement pour qui? En quoi consiste le travail brièvement
        - Les deux restaurants avec redirection à la page recrutement
        - map avec localisation des restaurants-->
<?php $css = "public/css/accueil.css" ?>

<?php ob_start(); ?>

    <div id="page">
        <?php require('public/textFunctions/header.php'); ?>

        <!-- Section 2 : Présentation Rejoignez-nous liens recrutement -->
        <a href="restaurant">
            <section id="conteneurRecrutement">


                <div id="imagesPresentation">
                    <div>
                        <img src="public/images/salade.png" alt="Une salade" />
                        <h3>Préparez</h3>
                    </div>
                    <div>
                        <h2>Rejoignez-nous !</h2>
                        <img src="public/images/presentation.png" alt="Une présentation de Subway pour le recrutement" />
                    </div>
                    <div>
                        <img src="public/images/sandwich.png" alt="Un sandwich" />
                        <h3 id="test">Conseillez</h3>
                    </div>

                </div>

            </section>
        </a>

        <!-- Section 2 : Infos Recrutement -->
        <section id="jobInformations">

            <article class="articlePourQui">
                <h2>Pour Qui ?</h2>
                <div>
                    <p>Vous êtes disponible <strong>les midis</strong> ?</p>
                    <p>Vous cherchez un <strong>mi-temps</strong> ?</p>
                    <p>Ou tout simplement un <strong>CDI</strong> ?</p>
                </div>
                <p>Alors n'hésitez pas une seconde et tentez votre chance !</p>
            </article>

            <article class="articleVotreMission">
                <h2>Votre mission ?</h2>
                <p>Devenez Équipiez polyvalent et rejoignez notre équipe !</p>
                <ul>
                    <li>Vous accueillerez les clients.</li>
                    <li>Assurerez les préparations.</li>
                    <li>Réaliserez des sandwiches.</li>
                    <li>Entretiendrez les locaux.</li>
                </ul>
                <p>Objectif : toutes les tâches utiles à la satisfaction du client.</p>
            </article>
        </section>

        <!-- Section 3 : Les restaurants liens recrutement -->
        <section id="restaurants">
            <h1>Vous êtes décidé à nous rejoindre ?</h1>
            <h3>Choisissez un restaurant et postulez en 30 secondes !</h3>
            <div id="conteneurImagesRestaurant">
                <?php  foreach ($donneesRestaurant as $restaurant  ): ?>

                <article class="imagesRestaurant">
                    <a href="restaurant-<?= htmlspecialchars($restaurant['url']) ?>">
                        <div>
                            <span><?= htmlspecialchars($restaurant['ville']) ?></span>
                        </div>
                        <img src="<?= htmlspecialchars($restaurant['image']) ?>" />
                    </a>
                </article>

                <?php endforeach; ?>
            </div>
        </section>

        <!-- Section 4 : Map + infos restaurants -->
        <section id="blockInfoRestaurants">
            <h1>Où nous retrouver ?</h1>
            <article>
                <div id="map"></div>

                <div id="infoDuRestaurant">

                    <div id="fondBlancInfoRestaurant"> </div>
                    <div id="textInfoRestaurant">
                        <p> <span id="villeMarqueur"></span></p>
                        <p>Adresse : <span id="adresseMarqueur"></span></p>
                        <p>Téléphone : <span id="telephoneMarqueur"></span></p>
                        <p>Horaires : <span id="horairesMarqueur"></span></p>
                    </div>

                </div>
            </article>

        </section>

        <?php require('public/textFunctions/footer.php'); ?>

    </div>
    
    <!-- Les scripts à l'intégration de la map google et des marqueurs-->
    <script src="public/js/map/insertionMap.js"></script>
    <?php require('public/js/map/boucleMarqueurs.php'); ?>
    <script src="public/js/map/recuperationDonneesMarqueurs.js"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDD_ZAHyvZx-_3Fy66piMrK-ne4NQEoOv4&callback=initMap" async defer></script>

<?php $content = ob_get_clean(); ?>

<?php require('view/template.php'); ?>
