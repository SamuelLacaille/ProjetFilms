<?php
session_start();
include('inc/header.php');
require 'inc/pdo.php';
require 'functions/functions.php';

$errors = array();
$success = false;


if (!empty($_POST['submitted'])) {
    //XSS
    $pseudo = clean($_POST['login']);
    $mdp = clean($_POST['password']);

    if (empty($login) || empty($mdp)) {
        $errors['login'] = 'Pseudo ou mot de passe incorrect';
    } else {
        $sql = "SELECT * FROM users WHERE pseudo = :login OR email = :login";
        $query = $pdo->prepare($sql);
        $query->bindValue(':login', $pseudo, PDO::PARAM_STR);
        $query->execute();
        $user = $query->fetch();
        debug($user);
        if (!empty($user)) {
            if (password_verify($mdp, $user['password'])) {
                $_SESSION['login'] = array(
                    'id'        => $user['id'],
                    'pseudo'    => $user['pseudo'],
                    'role'      => $user['role'],
                    'ip'        => $_SERVER['REMOTE_ADDR']
                );

            }
        }

    }



}

?>

    <section id="connexion">
        <div class="wrap">
            <h2>CONNEXION</h2>
            <div class="img2">
                <img src="assets/img/back.jpg">
                <form method="post">
                    <div class="pseudo">
                        <label for="login"></label>
                        <input type="text" name="login" id="login" placeholder="Pseudo ou email">
                        <p class="error"></p>
                    </div>
                    <div class="password password1">
                        <label for="password"></label>
                        <input type="password" name="password" id="password" value="" placeholder="Mot de passe">
                        <p class="error"></p>
                    </div>
                    <input type="submit" name="submitted" value="Connexion">
                    <a href="">Mot de passe oublié</a>
                </form>

            </div>
        </div>
    </section>



<?php
include('inc/footer.php');
