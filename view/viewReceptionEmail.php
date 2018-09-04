<?php $css = "public/css/receptionEmail.css" ?>

<?php ob_start(); ?>


<?php require('public/textFunctions/headerAdministrateur.php'); ?>

<h1>Reception par email</h1>

<p>Choissisez l'email dont vous souhaitez recevoir les curriculums vitæ et lettres de motivacation.</p>

<form id="formMail" action="receptionEmail" method="post">

    <p>Email : <input name="email" value="<?= htmlspecialchars($recuperationEmail['email']) ?>" required="" type="text"></p>

    <input type="submit" name="modifierEmail" value="modifier" />

</form>


<div id="alerte">
    <span id="messageAlerte"><?= $messageAlerte ?></span>
</div>

<?php $content = ob_get_clean(); ?>

<?php require('view/template.php'); ?>
