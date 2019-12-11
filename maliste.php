<?php
session_start();
include 'functions/functions.php';

include 'inc/pdo.php';



$errors = array();
$success = false;



//vérification de l'existence de l'ID

if (!empty($_SESSION['login']['id'])) {
    $userid = $_SESSION['login']['id'];
    $sql = "SELECT id FROM users WHERE id = :id";
    $query = $pdo->prepare($sql);
    $query->bindValue(':id', $userid, PDO::PARAM_INT);
    $query->execute();
    $userinfos = $query->fetch();

    if (!empty($_GET['id'])) {
        $movieid = $_GET['id'];
        $sql = "SELECT id FROM movies_full WHERE id = :id";
        $query = $pdo->prepare($sql);
        $query->bindValue(':id', $movieid, PDO::PARAM_INT);
        $query->execute();
        $movies = $query->fetch();


        if (!empty($movies)) {
            $sql = "INSERT INTO movie_user VALUES ('', :user_id, :movie_id, null, NOW(), '')";
            $query = $pdo->prepare($sql);
            $query->bindValue(':user_id', $userid, PDO::PARAM_INT);
            $query->bindValue(':movie_id', $movieid, PDO::PARAM_INT);
            $query->execute();
        }
    } else {die ('No ID');}
} else {die ('No ID');}

//récupération de ses informations




?>

<a href="userpage.php"> <h1>Ma liste de film</h1> </a>


