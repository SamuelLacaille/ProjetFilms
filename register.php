<?php
include('inc/header.php');
include 'inc/pdo.php';
include 'functions/functions.php';

$errors = array();
$success = false;

if(!empty($_POST['submitted'])) {
    //XSS
    $pseudo = clean($_POST['pseudo']);
    $email = clean($_POST['email']);
    $password1 = clean($_POST['password1']);
    $password2 = clean($_POST['password2']);

    //Validation
    if (empty($pseudo)) {

    }

}

?>

<body>
<div class="wrap">
    <h2> Inscription </h2>
    <form>
        <div>
            <label for="pseudo">Pseudo</label>
            <input type="text" name="pseudo" id="pseudo" value="">
        </div>
        <div>
            <label for="email">Email</label>
            <input type="text" name="email" id="email" value="">
        </div>
        <div>
            <label for="password1">Mot de passe</label>
            <input type="password" name="password1" id="password1" value="">
        </div>
        <div>
            <label for="password2">Confirmation de mot de passe</label>
            <input type="password" name="password2" id="password2" value="">
        </div>

        <input type="submit" name="submitted" value="Inscription">
    </form>
</div>
</body>


<?php
include('inc/footer.php');
?>
