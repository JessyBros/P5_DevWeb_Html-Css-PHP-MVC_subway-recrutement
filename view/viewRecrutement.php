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

    <?php while ($restaurant= $donneesRestaurant->fetch()) { ?>
    
    <div>
        <?= htmlspecialchars($restaurant['id']) ?>
        <?= htmlspecialchars($restaurant['ville']) ?>
        <?= htmlspecialchars($restaurant['adresse']) ?>
        <?= htmlspecialchars($restaurant['telephone']) ?>
    </div>

    <?php }  $donneesRestaurant->closeCursor(); ?>

    <?php require('public/textFunctions/footer.php'); ?>

</body>

</html>
