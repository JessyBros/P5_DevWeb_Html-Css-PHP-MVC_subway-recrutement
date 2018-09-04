<?php $css = "public/css/accessAdministration.css" ?>

<?php ob_start(); ?>


<?php require('public/textFunctions/headerAdministrateur.php'); ?>


<h1>Changement du pseudo et/ou du mot de passe</h1>

<form id="formAccessAdministration" action="accessAdministration" method="post">

    <p>Pseudo : <input name="pseudo" value="<?= htmlspecialchars($verificationPseudoMdp['pseudo']) ?>" required="" type="text"></p>

    <p>Mot de passe actuel : <input name="motDePasseActuel" value="" required="" type="text"></p>

    <p>Nouveau mot de passe : <input name="nouveauMotDePasse" value="" required="" type="text"></p>

    <input type="submit" name="modifierAccess" value="modifier" />

</form>


<div id="alerte">
    <span id="messageAlerte"><?= $messageAlerte ?></span>
</div>

<?php $content = ob_get_clean(); ?>

<?php require('view/template.php'); ?>
