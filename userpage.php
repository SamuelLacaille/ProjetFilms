<?php
session_start();
include 'functions/functions.php';
include 'inc/header.php';
include 'inc/pdo.php';

debug($_SESSION);

$errors = array();
$success = false;

//récupération de l'ID utilisateur

$userid = $_GET['id'];

//vérification de l'existence de l'ID

if (!empty($_GET['id'])) {
    $sql = "SELECT * FROM users WHERE id = :id";
    $query = $pdo->prepare($sql);
    $query->bindValue(':id', $userid, PDO::PARAM_INT);
    $query->execute();
    $userinfos = $query->fetch();

    debug($userinfos);
} else {
    die('no ID');

}
//récupération de ses informations

if (!empty($userinfos)) {
    $sql = "SELECT * FROM movies_full AS mf
            LEFT JOIN movie_user AS mu ON mu.movie_id = mf.id
            WHERE user_id = :id";
    $query = $pdo->prepare($sql);
    $query->bindValue(':id', $userid, PDO::PARAM_INT);
    $query->execute();
    $movies = $query->fetchAll();
}

debug($movies);

?>

<h1>Userpage</h1>

<!-- Informations de l'utilisateur
 Liste de ses films à voir
 Notation des films
 -->



<?php
include 'inc/footer.php';
?>
