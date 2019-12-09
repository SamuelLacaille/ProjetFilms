<?php
include 'inc/header.php';
include 'functions/functions.php';
include 'inc/pdo.php';
session_start();
$errors = array();
$success = false;

//récupération de l'ID utilisateur

debug($_GET);
/*$userid = $_GET['id'];*/

//vérification de l'existence de l'ID

if (!empty($_GET['id'])) {
    $sql = "SELECT * FROM users WHERE id = :id";
    $query = $pdo->prepare($sql);
    $query->bindValue(':id', $userid, PDO::PARAM_INT);
    $query->execute();
    $userinfos = $query->fetch();
} else {
    die('no ID');

}
//récupération de ses informations

if (!empty($userinfos)) {
    $sql = "SELECT * FROM movie_user AS mu
            LEFT JOIN movies_full AS mf ON mu.movie_id = mf.id";
    $query = $pdo->prepare($sql);
    $query->execute();
    $movies = $query->fetchAll();
}

debug($userinfos);
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
