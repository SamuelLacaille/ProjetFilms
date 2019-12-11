<?php
session_start();
include 'functions/functions.php';
include 'inc/header.php';
include 'inc/pdo.php';
//recup ID user dans SESSION
//recup ID film $film0id

// insert movie_user ID use, ID film, NOW, é NULL note, modified at
 /*   if (!empty ($film['id'])) {
        $id = $film['id'];
        $sql = "SELECT id FROM movies_full WHERE id = :id";
        $query = $pdo->prepare($sql);
        $query->bindValue(':id', $id, PDO::PARAM_INT);
        $query->execute();
        $films = $query->fetch();
        if (!empty($_SESSION['id'])) {
            $id2 = $_SESSION['id'];
            $sql = "SELECT id FROM users WHERE id = :id";
            $query = $pdo->prepare($sql);
            $query->bindValue(':id', $id2, PDO::PARAM_INT);
            $query->execute();
            $users = $query->fetch();


        }
        if (count($errors) == 0) {


            $sql = "INSERT INTO movie_user VALUES (null, :user_id, :movie_id, null, NOW(), null )";
            $query = $pdo->prepare($sql);
            $query->bindValue(':user_id', $users, PDO::PARAM_STR);
            $query->bindValue(':movie_id', $films, PDO::PARAM_STR);
            $query->execute();
            $success = true;
        }


    }
*/

debug($_SESSION);

$errors = array();
$success = false;




//vérification de l'existence de l'ID

if (!empty($_SESSION['login']['id'])) {
    $userid = $_SESSION['login']['id'];
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
            LEFT JOIN movies_full AS mf 
            ON mf.id = mu.movie_id
            WHERE mu.user_id = $userid";

    $query = $pdo->prepare($sql);
    $query->bindValue(':id', $userid, PDO::PARAM_INT);
    $query->execute();
    $movies = $query->fetchAll();
    debug($movies);
}



?>

<h1>Ma liste de film</h1>


