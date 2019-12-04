<?php
include('inc/header.php');
include 'inc/pdo.php';
include 'functions/functions.php';
include 'inc/formregister.php';

?>

<body>
<div class="wrap">
    <h2> Inscription </h2>
    <form method="post">
        <div>
            <label for="pseudo">Pseudo</label>
            <input type="text" name="pseudo" id="pseudo" value="<?php if (!empty($_POST['pseudo'])) {echo $_POST['pseudo'];}
            ?>">
            <?php spanErr($errors, 'pseudo'); ?>
        </div>
        <div>
            <label for="email">Email</label>
            <input type="text" name="email" id="email" value="<?php if (!empty($_POST['email'])) {echo $_POST['email'];}
            ?>">
            <?php spanErr($errors, 'email'); ?>
        </div>
        <div>
            <label for="password1">Mot de passe</label>
            <input type="password" name="password1" id="password1" value="">
            <?php spanErr($errors, 'password'); ?>
        </div>
        <div>
            <label for="password2">Confirmation de mot de passe</label>
            <input type="password" name="password2" id="password2" value="">
            <?php spanErr($errors, 'password'); ?>
        </div>

        <input type="submit" name="submitted" value="Inscription">
    </form>
</div>
</body>


<?php
include('inc/footer.php');
?>
