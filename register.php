<?php
include('inc/header.php');
include 'inc/pdo.php';
include 'functions/functions.php';


?>

<section id="register">
<div class="wrap">
    <h2> Inscription </h2>
    <form class="form" action="register.php" method="post">
        <div class="pseudo">
            <input type="text" name="pseudo" id="pseudo" value="<?php if (!empty($_POST['pseudo'])) {echo $_POST['pseudo'];}
            ?>"placeholder="Pseudo">
            <?php spanErr($errors, 'pseudo'); ?>
        </div>
        <div class="email">
            <input type="text" name="email" id="email" value="<?php if (!empty($_POST['email'])) {echo $_POST['email'];}
            ?>" placeholder="Email">
            <?php spanErr($errors, 'email'); ?>
        </div>
        <div class="password password1">
            <input type="password" name="password1" id="password1" value="" placeholder="Mot de passe">
            <?php spanErr($errors, 'password'); ?>
        </div>
        <div class="password password2">
            <input type="password" name="password2" id="password2" value="" placeholder="Confirmation de mot de passe">
            <?php spanErr($errors, 'password'); ?>
        </div>

        <input type="submit" name="submitted" value="Inscription">
    </form>
</div>
</section>



<?php
include('inc/footer.php');
?>
