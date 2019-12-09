<?php
session_start();


include 'inc/pdo.php';
include 'inc/formregister.php';
include('inc/header.php');

?>

<section id="register">
    <div class="wrap">
        <h2> INSCRIPTION </h2>
        <div class="img">
            <img src="assets/img/back.jpg">
            <form class="form" action="register.php" method="post">
                <div class="pseudo">
                    <label for="pseudo"></label>
                    <input type="text" name="pseudo" id="pseudo" value="<?php if (!empty($_POST['pseudo'])) {
                        echo $_POST['pseudo'];
                    }
                    ?>" placeholder="Pseudo">
                    <?php spanErr($errors, 'pseudo'); ?>
                </div>
                <div class="email">
                    <label for="email"></label>
                    <input type="text" name="email" id="email" value="<?php if (!empty($_POST['email'])) {
                        echo $_POST['email'];
                    }
                    ?>" placeholder="Email">
                    <?php spanErr($errors, 'email'); ?>
                </div>
                <div class="password password1">
                    <label for="password1"></label>
                    <input type="password" name="password1" id="password1" value="" placeholder="Mot de passe">
                    <?php spanErr($errors, 'password'); ?>
                </div>
                <div class="password password2">
                    <label for="password2"></label>
                    <input type="password" name="password2" id="password2" value=""
                           placeholder="Confirmation mot de passe">
                    <?php spanErr($errors, 'password'); ?>
                </div>

                <input type="submit" name="submitted" value="Inscription">
            </form>
        </div>
    </div>
</section>




<?php
include('inc/footer.php');
?>
