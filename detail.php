<?php
session_start();
include 'inc/pdo.php';
include 'functions/functions.php';


// informations du film selectionné + affiche du film
//voir pagesingle
//prettyurl -> url ?slug=sleg du film


if (!empty($_GET['slug'])) {


    $slug = $_GET['slug'];

    $sql = "SELECT * FROM movies_full WHERE slug LIKE '" . $slug . "%'";
    $query = $pdo->prepare($sql);
    $query->execute();
    $film = $query->fetchAll();
    // debug($film);
    if (!empty($film)) {

    } else {
        header('Location: 404.php');
    }
} else {
    header('Location: 404.php');
}
if (!empty ($film['id'])) {
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

}  if (count($errors) == 0) {


    $sql = "INSERT INTO movie_user VALUES (null, :user_id, :movie_id, null, NOW(), null )";
    $query = $pdo->prepare($sql);
    $query->bindValue(':user_id', $users, PDO::PARAM_STR);
    $query->bindValue(':movie_id', $films, PDO::PARAM_STR);
    $query->execute();
    $success = true;
}

include 'inc/header.php'; ?>


    <div class="wrap">
        <div class="infoFilm">
            <?php $filename = 'posters/' . $film[0]['id'] . '.jpg';

            if (file_exists($filename)) { ?>
                <h2><?php echo $film[0]['title']; ?></h2>
                <img src="posters/<?php echo $film[0]['id']; ?>.jpg" alt="affiche du film">
                <p>Title : <?php echo $film[0]['title']; ?></p>
                <p> Years : <?php echo $film[0]['year']; ?> </p>
                <p>Genres : <?php echo $film[0]['genres'] ?></p>
                <p>Directors : <?php echo $film[0]['directors'] ?></p>
                <p>Writers : <?php echo $film[0]['writers'] ?></p>
                <p>Cast : <?php echo $film[0]['cast'] ?></p>
                <p>Runtime : <?php echo $film[0]['runtime'] ?>min</p>
                <p>Plot : <?php echo $film[0]['plot'] ?></p>
                <p>Rating : <?php echo $film[0]['rating'] ?></p>
            <?php } else { ?>
                <h2><?php echo $film[0]['title']; ?></h2>
                <img src="assets/img/afficheInconnu.jpg" alt="affiche du film">
                <p>Title : <?php echo $film[0]['title']; ?></p>
                <p> Years : <?php echo $film[0]['year']; ?> </p>
                <p>Genres : <?php echo $film[0]['genres'] ?></p>
                <p>Directors : <?php echo $film[0]['directors'] ?></p>
                <p>Writers : <?php echo $film[0]['writers'] ?></p>
                <p>Cast : <?php echo $film[0]['cast'] ?></p>
                <p>Runtime : <?php echo $film[0]['runtime'] ?>min</p>
                <p>Plot : <?php echo $film[0]['plot'] ?></p>
                <p>Rating : <?php echo $film[0]['rating'] ?></p>
            <?php } ?>
            <?php if (!is_logged()) { ?>

            <?php } else { ?>
                <li><a href="maliste.php">Ajouter à ma liste</a></li>
            <?php } ?>


        </div>


    </div>



<?php include 'inc/footer.php'; ?>