<?php
session_start();
include 'functions/functions.php';
include 'inc/header.php';
include 'inc/pdo.php';


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

?>

<h1>Userpage</h1>


<?php
    foreach ($movies as $movie){ ?>
<ul>
    <img src="posters/<?php echo $movie['movie_id'];?>.jpg">
    <li> <?php echo $movie['title']?> </li>



</ul>
   <?php } ?>








<!-- Informations de l'utilisateur
 Liste de ses films à voir
 Notation des films
 -->



<?php
include 'inc/footer.php';
?>
