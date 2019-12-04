<?php
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
        $errors['pseudo'] = 'Veuillez renseigner ce champ';
    } elseif (mb_strlen($pseudo) > 150) {
        $errors['pseudo'] = 'Maximum 150 caractères';
    } elseif (mb_strlen($pseudo) < 3) {
        $errors['pseudo'] = 'Minimum 3 caractères';
    } else {
        $sql = "SELECT id FROM users WHERE pseudo = :pseudo LIMIT 1";
        $query = $pdo->prepare($sql);
        $query->bindValue(':pseudo', $pseudo, PDO::PARAM_STR);
        $query->execute();
        $verif = $query->fetch();
        if (!empty($verif)) {
            $errors['pseudo'] = 'Ce pseudo existe déjà';
        }
    }

    if (empty($email) || filter_var($email, FILTER_VALIDATE_EMAIL) === false) {
        $errors['email'] = 'Veuillez entrer une adresse mail valide';
    } else {
        $sql = "SELECT id FROM users WHERE email = :email LIMIT 1";
        $query = $pdo->prepare($sql);
        $query->bindValue(':email', $email, PDO::PARAM_STR);
        $query->execute();
        $verif = $query->fetch();

        if (!empty($verif)) {
            $errors['email'] = 'Cette adresse mail existe déjà';
        }
    }

    if (!empty($password1)) {
        if ($password1 != $password2) {
            $errors['password'] = 'Les mots de passes ne correspondent pas';
        } elseif (mb_strlen($password1) < 5) {
            $errors['password'] = 'Minimum 5 caractères';
        }
    }

    if (count($errors) == 0) {
        $hash = password_hash($password1, PASSWORD_BCRYPT);
        $token = generateRandomString(255);

        $sql = "INSERT INTO users VALUES (null, :pseudo, :email, :pass, 'user', :token, NOW())";
        $query = $pdo->prepare($sql);
        $query->bindValue(':pseudo', $pseudo, PDO::PARAM_STR);
        $query->bindValue(':email', $email, PDO::PARAM_STR);
        $query->bindValue(':pass', $hash, PDO::PARAM_STR);
        $query->bindValue(':token', $token, PDO::PARAM_STR);
        $query->execute();
        $success = true;
        header('Location : login.php');
    }
}
