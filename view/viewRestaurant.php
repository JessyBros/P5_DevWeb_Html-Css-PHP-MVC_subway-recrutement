<!-- Page de recrutement, qui va être récupéré par le CONTROLLER
    - Si non fait, choix du restaurant
    - Formulaire CV + LDM-->
<?php $css = "public/css/restaurant.css" ?>

<?php ob_start(); ?>

<body id="dispositionDeLaPage">


    <div class="elementPage">

        <!-- header -->
        <?php require('public/textFunctions/header.php'); ?>

        <!-- L'utilisateur doit choisir le restautant auquel il souhaite postuler son cv et sa ldm-->
        <section id="pageSansGet">
            <h1>Quel restaurant souhaitez-vous postuler ?</h1>
            <div>
                
                <?php  foreach ($choixRestaurant as $listeRestaurant  ): ?>
                <a href="restaurant-<?= htmlspecialchars($listeRestaurant['url']) ?>">
                    <p>
                        <?= htmlspecialchars($listeRestaurant['ville']) ?>
                    </p>
                </a>
                <?php endforeach; ?>
            </div>
        </section>

        <!-- Affiche le restaurant séléctionné avec son adresse. Il peut également cliqué sur un boutton pour être rediriger à la liste de tous les restaurants-->
        <section id="pageAvecGet">
            <nav>
                <h2>
                    <?= htmlspecialchars($restaurantSelectionner['ville']) ?>
                </h2>
                <p>
                    <?= htmlspecialchars($restaurantSelectionner['adresse']) ?>
                </p>
                <a href="restaurant">
                    <button>Choisir un autre restaurant ?</button>
                </a>
            </nav>

       
            <!-- Formulaire pour envoyé son cv et sa lm-->
           <form action="restaurant-<?= htmlspecialchars($restaurantSelectionner['url']) ?>" method="post" enctype="multipart/form-data">

                <div>
                    <h2>Votre curriculum vitæ</h2>
                    <input name="cv" required="" type="file">
                </div>
                <div>
                    <h2>votre lettre de motivation</h2>
                    <input name="lm" required="" type="file">
                </div>
                <h2>Vos disponibilités :</h2>
                <p>Exemple : Dès septembre du lundi au samedi</p>
                <textarea name="message" maxlength="125"></textarea>
                <br>
                <input type="hidden" name= "ville" value ="<?= htmlspecialchars($restaurantSelectionner['ville']) ?>"/>
                <input type="hidden" name= "urlVille" value ="<?= htmlspecialchars($restaurantSelectionner['url']) ?>"/>
                <input type="submit" name="postuler" value="Postulez !" />
            </form>
            
            <p class="resultatEnvoieMail">
                <?php echo $resultatEnvoieMail;?>
            </p>
        </section>

    </div>


    <!-- Footer-->
    <div class="elementPage">
        <?php require('public/textFunctions/footer.php'); ?>
    </div>

<?php $content = ob_get_clean(); ?>

<?php require('view/template.php'); ?>

