<?php
session_start();
include 'functions/functions.php';
include('inc/pdo.php');
$title = 'Modifier votre mot de passe';
$errors = array();

if (!empty($_GET['email'])) {
    if (!empty($_GET['token'])) {
        $email = clean($_GET['email']);
        $token = clean($_GET['token']);
        $email = urldecode($email);

        $sql = "SELECT * FROM users WHERE email = :email AND token = :token";
        $query = $pdo->prepare($sql);
        $query->bindValue(':email', $email, PDO::PARAM_STR);
        $query->bindValue(':token', $token, PDO::PARAM_STR);
        $query->execute();
        $user = $query->fetch();
        if (!empty($user)) {
            if (!empty($_POST['submitted'])) {
                $password1 = clean($_POST['password1']);
                $password2 = clean($_POST['password2']);

                if (!empty($password1)) {
                    if ($password1 != $password2) {
                        $errors['password'] = 'Les deux mot de passe doivent être identique';
                    } elseif (mb_strlen($password1) <= 5) {
                        $errors['password'] = 'Le mot de passe doit faire au moins 6 caractères';
                    }
                } else {
                    $errors['password'] = 'Veuillez renseigner un mot de passe';
                }
                if (count($errors) == 0) {
                    $hashPassword = password_hash($password1, PASSWORD_BCRYPT);
                    $token = generateRandomString(100);
                    $sql = "UPDATE users SET password = :password, token = :token WHERE email = :email";
                    $query = $pdo->prepare($sql);
                    $query->bindValue(':token', $token, PDO::PARAM_STR);
                    $query->bindValue(':email', $email, PDO::PARAM_STR);
                    $query->bindValue(':password', $hashPassword, PDO::PARAM_STR);
                    $query->execute();
                    header('Location: login.php');
                }
            }
        } else {
            die('404');
        }
    } else {
        die('404');
    }
}


include('inc/header.php'); ?>
<section id="mdpmodif">
    <h1> Modifier votre mot de passe </h1>

    <form action="" method="post">
        <label for="password1">password</label>
        <input type="password" name="password1" >
        <label for="password2">password</label>
        <input type="password" name="password2" >
        <input type="submit" name="submitted" value="envoyer">
    </form>
</section>

<?php include('inc/footer.php');
