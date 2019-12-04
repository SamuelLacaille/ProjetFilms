<?php
include('inc/header.php');

?>

<body>
<section id="connexion">
    <div class="wrap">
        <h2>Connexion</h2>
        <form method="post">
            <input type="text" name="login" id="login" placeholder="Pseudo ou email">
            <p class="error"></p>

            <input type="password" name="password" id="password" value="" placeholder="Mot de passe">
            <p class="error"></p>   

            <input type="submit" name="submitted" value="Connexion">
        </form>
        <a href="">Mot de passe oublié</a>
    </div>
</section>






</body>


<?php
include('inc/footer.php');