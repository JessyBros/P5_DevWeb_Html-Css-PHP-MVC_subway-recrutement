<!-- Page d'accueil qui va être récupéré par le CONTROLLER
        - image de présentation qui ramène à la page recrutement
        - Le recrutement pour qui? En quoi consiste le travail brièvement
        - Les deux restaurants avec redirection à la page recrutement
        - map avec localisation des restaurants-->
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <title>Subway</title>
    <link href="public/css/accueil.css" rel="stylesheet" />
    <link rel="icon" type="image/png" href="public/images/favicon.png" />
    <META NAME="Description" CONTENT="Franchise Subway. restauration 'Le Kremlin-Bicêtre' et ' Val de Fontenay' recrute du personnel. Informations : Qui nous recrutement. Un bref détail du job à réaliser au sein de l'entreprise. Une carte pour la localisation des restaurants et des informations complémentaires.">
    <META NAME="Identifier-URL" CONTENT="url du site dans l'hébergeur">
    <META NAME="Keywords" CONTENT="Subway, recrutement, personnel, job, travail, embauche">
</head>

<body>
    <?php require('public/textFunctions/header.php'); ?>
    
    <!-- Section 2 : Présentation Rejoignez-nous liens recrutement -->
    <section id="presentation">

        <div id="banniere">
            <div id="fondBanniere"></div>
            <p id="textBanniere">Rejoignez-nous !</p>
        </div>
    </section>

    <!-- Section 2 : Infos Recrutement -->
    <section id="jobInformations">

        <article class="articlePourQui">
            <h2>Pour Qui ?</h2>
            <div>
                <p>Vous êtes <strong>étudiant(e)</strong> ?</p>
                <p>Vous Cherchez un <strong>mi-temps</strong> ?</p>
                <p>Ou tout simplement un <strong>CDI</strong> ?</p>
            </div>
            <p>Alors n'hésitez pas une seconde et tentez votre chance !</p>
        </article>

        <article class="articleVotreMission">
            <h2>Votre mission ?</h2>
            <p>Devenez Équipiez polyvalent et rejoignez notre équipe !</p>
            <ul>
                <li>Vous accueillerez les clients.</li>
                <li>Assurez les prépartions.</li>
                <li>Réalisez des sandwich.</li>
                <li>Entretenir les locaux</li>
            </ul>
            <p>Objectif : Toute tâche qui mèneront au bon fonctionnement du restaurant.</p>
        </article>
    </section>
    
    <!-- Section 3 : Les restaurants liens recrutement -->
    <section id="restaurants">
        <h1>Vous êtes décidez à nous rejoindre ?</h1>
        <h3>Choississez un restaurant et postulez en 30 secondes !</h3>
        <div id="conteneurImagesRestaurant">
         <?php while ($restaurant = $donneesRestaurant->fetch()) { ?>
        
            <article class="imagesRestaurant">
            <div>
                <span><?= htmlspecialchars($restaurant['ville']) ?></span>
            </div>
             <img src=  "<?= htmlspecialchars($restaurant['image']) ?>" />
            </article>
        
         <?php }  $donneesRestaurant->closeCursor(); ?>
        </div>
    </section>
    
    
    <!-- test 
    <?php /*while ($restaurant= $donneesRestaurant->fetch()) { ?>

    <div>
        <?= htmlspecialchars($restaurant['id']) ?>
            <?= htmlspecialchars($restaurant['ville']) ?>
                <?= htmlspecialchars($restaurant['adresse']) ?>
                    <?= htmlspecialchars($restaurant['telephone']) ?>
                    <?= htmlspecialchars($restaurant['image']) ?>
                  <img src=  "<?= htmlspecialchars($restaurant['image']) ?>" />
    </div>
 <?php }  $donneesRestaurant->closeCursor(); */?>-->
   

    <?php require('public/textFunctions/footer.php'); ?>
    
    <!-- Section 4 : Map + infos restaurants -->
    <section id="infoRestaurants">
         <h1>Où nous retrouvez ?</h1>
    <div>map</div>
    </section>
   
        </body>
        </html>
