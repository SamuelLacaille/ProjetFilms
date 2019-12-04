<?php
include('inc/header.php');

?>

<body>
<section id="connexion">
    <div class="wrap">
        <h2>Connexion</h2>
        <form>
            <label for="login">Pseudo ou email</label>
            <input type="text" name="login" id="login">
            <p class="error"></p>

            <label for="password">Mot de passe</label>
            <input type="password" name="password" id="password" value="">
            <p class="error"></p>   

            <input type="submit" name="submitted" value="Connexion">
        </form>
        <a href="">Mot de passe oublié</a>
    </div>
</section>






</body>


<?php
include('inc/footer.php');