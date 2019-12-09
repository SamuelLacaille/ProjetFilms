<?php
include ('inc/header.php');
include 'inc/formcontact.php';
?>

<h2>Nous contacter</h2>
<div class="wrap">
    <form method="post">
        <label for="nom">Nom</label>
        <input type="text" name="nom" id="nom" value="">

        <label for="prenom">Prénom</label>
        <input type="text" name="prenom" id="prenom" value="">

        <label for="email">Email</label>
        <input type="text" name="email" id="email" value="">

        <label for="objet">Objet</label>
        <input type="text" name="objet" id="objet" value="">

        <label for="message">Message</label>
        <textarea name="message" id="message"></textarea>

        <input type="submit" name="submitted" value="Envoyer">
    </form>
</div>

<?php
include ('inc/footer.php');
?>
