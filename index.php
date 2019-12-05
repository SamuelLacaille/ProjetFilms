<?php
//session_start();
include 'inc/pdo.php';
include 'functions/functions.php';
$title = 'homepage';


$sql = "SELECT * FROM movies_full ORDER BY RAND() LIMIT 100";
$query = $pdo->prepare($sql);
$query->execute();

$movies = $query->fetchAll();


// debug($movies);


$sql = "SELECT DISTINCT genres FROM movies_full ";
$query = $pdo->prepare($sql);
$query->execute();

$genres = $query->fetchAll();


include 'inc/header.php';
//debug($_SESSION);
?>

<h1>Accueil</h1>

<div class="wrap">
    <div class="tri">
        <h2>Affiner la recherche</h2>
        <form class="triage" method="post">
            <p>Par genre : </p>
            <!-- beaucoup de checkbox ,<input type='checkbox' name="categorie[]">,  $_POST['categorie']=>array() -->
            <div>
                <ul>
                    <?php foreach ($genres as $genre) { ?>
                        <li><input type='checkbox' name='genres[]' value='<?php $genre['genres']; ?>'>
                            <?php echo $genre['genres']; ?></li>
                    <?php } ?>
                </ul>

            </div>


            <p>Par décennie : </p>
            <div>
                <input type="number" id="dateFilm" name="dateFilm"
                       min="1880" max="2020" step="10">
            </div>

            <input type="submit" value="Trier">
        </form>


    </div>

    <a id="films">
        <h2>Les films</h2>
        <?php foreach ($movies as $movie) {
            $filename = 'posters/' . $movie['id'] . '.jpg';

            if (file_exists($filename)) { ?>
                <div class="film">
                    <img src="posters/<?php echo $movie['id']; ?>.jpg" alt="affiche du film">
                    <caption>
                        <ul>
                            <li><?php echo $movie['title']; ?></li>
                            <a href="detail.php?slug=<?php echo $movie['slug']; ?>" target="_blank">Plus
                                d'informations</a>
                        </ul>
                    </caption>
                </div>
            <?php } else { ?>
                <div class="film">
                    <img src="assets/img/afficheInconnu.jpg" alt="affiche du film" width="300" height="300">
                    <caption>
                        <ul>
                            <li><?php echo $movie['title']; ?></li>
                            <a href="detail.php?slug=<?php echo $movie['slug']; ?>" target="_blank">Plus
                                d'informations</a>
                        </ul>
                    </caption>
                </div>
            <?php } ?>
        <?php } ?>


        <button><a href="index.php">+ de films</a>
    </a></button>
    </section>


</div>


<?php include 'inc/footer.php'; ?>

