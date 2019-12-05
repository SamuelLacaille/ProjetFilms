<?php
session_start();
include('functions/functions.php');
include('inc/pdo.php');
$title = 'Mot de passe oublié';
$errors = array();
$success = false;
if (!empty($_POST['submitted'])) {

    $email = clean($_POST['email']);

    $sql = "SELECT email, token FROM users WHERE email = :email";
    $query = $pdo->prepare($sql);
    $query->bindValue(':email', $email, PDO::PARAM_STR);
    $query->execute();
    $user = $query->fetch();
    if (!empty($user)) {
        $token = $user['token'];
        $email = urlencode($email);
        $html = '<a href="mdpmodif.php?token='.$token. '&email ='. $email.'">LALALALALALALALALA</a>';
        echo $html;

    } else {
        $errors['email'] = 'Pas d\'email correspondant';
    }
}

include('inc/header.php'); ?>
<section id="mdpoublie">
    <h1> Mot de passe oublié </h1>
    <form action="" method="post">
        <label for="email">Email</label>
        <input type="email" name="email" id="email" value="<?php if (!empty($_POST['email'])) {echo $_POST['email'];}?>">
        <p class="error"><?php if (!empty($errors['email'])) {
                echo $errors['email'];
            } ?></p>
        <input type="submit" name="submitted" value="Modifier votre mot de passe">
    </form>
</section>
<?php include('inc/footer.php');