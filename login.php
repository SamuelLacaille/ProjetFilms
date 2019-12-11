<?php
session_start();
include 'functions/functions.php';
require 'inc/pdo.php';


$errors = array();
$success = false;


if (!empty($_POST['submitted'])) {
    //XSS
    $login = clean($_POST['login']);
    $password = clean($_POST['password']);

    if (empty($login) || empty($password)) {
        $errors['login'] = 'Pseudo ou mot de passe incorrect';
    } else {
        $sql = "SELECT * FROM users WHERE pseudo = :login OR email = :login";
        $query = $pdo->prepare($sql);
        $query->bindValue(':login', $login, PDO::PARAM_STR);
        $query->execute();
        $user = $query->fetch();
        if (!empty($user)) {
            if (password_verify($password, $user['password'])) {
                $_SESSION['login'] = array(
                    'id' => $user['id'],
                    'email' => $user['email'],
                    'pseudo' => $user['pseudo'],
                    'role' => $user['role'],
                    'ip' => $_SERVER['REMOTE_ADDR']
                );
/*                header('Location: index.php');*/
            } else {
                $errors['login'] = 'Pseudo ou email inconnu ou mot de passe oublié';
            }

        } else {
            $errors['login'] = 'pseudo ou email inconnu';
        }
    }
}
include('inc/header.php');

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
                        <p class="error"><?php if (!empty($errors['login'])) {
                                echo $errors['login'];
                            } ?></p>
                    </div>
                    <div class="password password1">
                        <label for="password"></label>
                        <input type="password" name="password" id="password" value="" placeholder="Mot de passe">
                        <p class="error"><?php if (!empty($errors['password'])) {
                                echo $errors['password'];
                            } ?></p>
                    </div>
                    <input type="submit" name="submitted" value="Connexion">
                </form>
                <a href="mdp-oublie.php">Mot de passe oublié</a>

            </div>
        </div>
    </section>



<?php
include('inc/footer.php');
