<!-- Page de recrutement, qui va être récupéré par le CONTROLLER
    - Si non fait, choix du restaurant
    - Formulaire CV + LDM-->
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <title>Subway</title>
    <link href="public/css/recrutement.css" rel="stylesheet" />
    <link rel="icon" type="image/png" href="public/images/favicon.png" />
    <META NAME="Description" CONTENT="Franchise Subway. restauration 'Le Kremlin-Bicêtre' et ' Val de Fontenay' recrute du personnel. Déposez un CV(.">
    <META NAME="Identifier-URL" CONTENT="url du site dans l'hébergeur">
    <META NAME="Keywords" CONTENT="Subway, recrutement, personnel, job, travail, embauche">
</head>

<body>
    <?php require('public/textFunctions/header.php'); ?>

    <section id="pageSansGet">
        <h1>Quel restaurant souhaitez vous postuler ?</h1>
        <div>
            <?php while ($listeRestaurant= $choixRestaurant->fetch()) { ?>
            <a href="recrutement-<?= htmlspecialchars($listeRestaurant['url']) ?>">
                <p>
                    <?= htmlspecialchars($listeRestaurant['ville']) ?>
                </p>
            </a>
            <?php }  $choixRestaurant->closeCursor(); ?>
        </div>

    </section>

    <section id="pageAvecGet">

        <nav>
            <h2>
                <?= htmlspecialchars($restaurantSelectionner['ville']) ?>
            </h2>
            <?= htmlspecialchars($restaurantSelectionner['adresse']) ?>
        </nav>

        <form action="recrutement-<?= htmlspecialchars($listeRestaurant['url']) ?>" method="post">

            <h2>Votre curriculum vitæ</h2>
            <input name="cv" required="" type="file">

            <h2>votre lettre de motivation</h2>
            <input name="lm" required="" type="file">

            <h2>Vos disponibilités :</h2>
            <p>exemple : Dès septembre du lundi au samedi</p>
            <textarea></textarea>
            <br>
            <input type="submit" name="postumler" value="Postuler !" />
        </form>

    </section>

    <?php require('public/textFunctions/footer.php'); ?>

</body>

</html>
