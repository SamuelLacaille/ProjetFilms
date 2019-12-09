<?php
include ('inc/header.php');
include 'functions/functions.php';
include 'inc/pdo.php';

$errors = array();
$success = true;

if(!empty($_POST['submitted'])) {
    //XSS
    $prenom = clean($_POST['prenom']);
    $nom = clean($_POST['nom']);
    $email = clean($_POST['email']);
    $objet = clean($_POST['objet']);
    $message = clean($_POST['message']);

    //validation
    $errors = textValid($prenom, $errors, 2, 50, 'prenom');
    $errors = textValid($nom, $errors, 2, 50, 'nom');
    $errors = cleanMail($errors, $email, 'email');
    $errors = textValid($objet, $errors, 5, 200, 'objet');
    $errors = textValid($message, $errors, 10, 3000, 'message');

    debug($errors);

    if (count($errors) == 0) {
        $sql = "INSERT INTO contact VALUES (null, :nom, :prenom, :email, :objet, :message, NOW())";
        $query = $pdo->prepare($sql);
        $query->bindValue(':nom', $nom, PDO::PARAM_STR);
        $query->bindValue(':prenom', $prenom, PDO::PARAM_STR);
        $query->bindValue(':email', $email, PDO::PARAM_STR);
        $query->bindValue(':objet', $objet, PDO::PARAM_STR);
        $query->bindValue(':message', $message, PDO::PARAM_STR);
        $query->execute();
        $success = true;
    }
}

?>

<body>
<h2>Nous contacter</h2>
<div class="wrap">
    <form method="post">
        <label for="nom">Nom</label>
        <input type="text" name="nom" id="nom" value="">

        <label for="prenom">Prénom</label>
        <input type="text" name="prenom" id="prenom" value="">

        <label for="email">Email</label>
        <input type="text" name="email" id="email" value="">

        <label for="objet">Objet</label>
        <input type="text" name="objet" id="objet" value="">

        <label for="message">Message</label>
        <textarea name="message" id="message"></textarea>

        <input type="submit" name="submitted" value="Envoyer">
    </form>
</div>

</body>


<?php
include ('inc/footer.php');
?>
