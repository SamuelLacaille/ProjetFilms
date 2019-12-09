<?php
session_start();
include 'inc/pdo.php';
include 'functions/functions.php';
$title = 'homepage';


$sql = "SELECT * FROM movies_full ORDER BY RAND() LIMIT 100";
$query = $pdo->prepare($sql);
$query->execute();

$movies = $query->fetchAll();


// debug($movies);

 //par decennie, value="1880-1890" -> explod
/*if(!empty($_POST['tri'])){
    $sql = "SELECT * FROM movies_full WHERE year BETWEEN '' AND '' ";
    $query = $pdo->prepare($sql);
    $query->execute();
    $decennie = $query->fetchAll();



} */

if(!empty($_POST['tri'])) {
    $sql = "SELECT * FROM movies_full WHERE 1 = 1";
    $genres = $_POST['genres'];
    if (!empty($genres)) {
        $sql .= ' AND  genres LIKE "%' . $genres[0] . '%" ';


        echo $sql;
        $query = $pdo->prepare($sql);
        $query->execute();
        $genresMovies = $query->fetchAll();
    }



}











include 'inc/header.php';
//debug($_SESSION);
?>

<h1>Accueil</h1>
<br>
<br>
<br>
<br>
<div class="wrap">
    <div class="tri">
        <h2>Affiner la recherche</h2>
        <form class="triage" method="post">
            <p>Par genre : </p>
            <!-- beaucoup de checkbox ,<input type='checkbox' name="categorie[]">,  $_POST['categorie']=>array() -->
            <div>

                    <input type="checkbox" name="genres[]" value="drama">
                    <label for="drama">drama</label>
                    <input type="checkbox" name="genres[]" value="fantasy">
                    <label for="fantasy">fantasy</label>
                    <input type="checkbox" name="genres[]" value="romance">
                    <label for="romance">romance</label>
                    <input type="checkbox" name="genres[]" value="action">
                    <label for="action">action</label>
                    <input type="checkbox" name="genres[]" value="thriller">
                    <label for="thriller">thriller</label>
                    <input type="checkbox" name="genres[]" value="comedy">
                    <label for="comedy">comedy</label>
                    <input type="checkbox" name="genres[]" value="aventure">
                    <label for="aventure">aventure</label>
                    <input type="checkbox" name="genres[]" value="animation">
                    <label for="animation">animation</label>
                    <input type="checkbox" name="genres[]" value="sci-fi">
                    <label for="sci-fi">sci-fi</label>
                    <input type="checkbox" name="genres[]" value="mystery">
                    <label for="mystery">mystery</label>
                    <input type="checkbox" name="genres[]" value="crime">
                    <label for="crime">crime</label>
                    <input type="checkbox" name="genres[]" value="horror">
                    <label for="horror">horror</label>
                    <input type="checkbox" name="genres[]" value="family">
                    <label for="family">family</label>
                    <input type="checkbox" name="genres[]" value="biography">
                    <label for="biography">biography</label>
                    <input type="checkbox" name="genres[]" value="war">
                    <label for="war">war</label>
                    <input type="checkbox" name="genres[]" value="history">
                    <label for="history">history</label>
                    <input type="checkbox" name="genres[]" value="music">
                    <label for="music">music</label>
                    <input type="checkbox" name="genres[]" value="western">
                    <label for="western">western</label>
                    <input type="checkbox" name="genres[]" value="sport">
                    <label for="sport">sport</label>
                    <input type="checkbox" name="genres[]" value="film-noir">
                    <label for="film-noir">film-noir</label>



            </div>


            <p>Par décennie : </p>

            <div>
                <?php
                $arrayDecennie = array( '1880-1889',
                    '1890-1899',
                    '1900-1909',
                    '1910-1919',
                    '1920-1929',
                    '1930-1939',
                    '1940-1949',
                    '1950-1959',
                    '1960-1969',
                    '1970-1979',
                    '1980-1989',
                    '1990-1999',
                    '2000-2009',
                    '2010-2019');

                $annee1 = explode('-',$arrayDecennie[0]);
                // print_r($annee1);
                $annee2 = explode('-',$arrayDecennie[1]);


                ?>


                <input type="number" id="dateFilm" name="dateFilm"
                       min="1880" max="2020" step="10">
            </div>



            <input type="submit" name="tri" value="Trier">
        </form>


    </div>

    <a id="films">
        <h2>Les films</h2>
        <?php  if(!empty($_POST['tri'])) {
            foreach ($genresMovies as $genresMovie) {
            $filename = 'posters/' . $genresMovie['id'] . '.jpg';

            if (file_exists($filename)) { ?>
                <div class="film">
                    <img src="posters/<?php echo $genresMovie['id']; ?>.jpg" alt="affiche du film">
                    <caption>
                        <ul>
                            <li><?php echo $genresMovie['title']; ?></li>
                            <a href="detail.php?slug=<?php echo $genresMovie['slug']; ?>" target="_blank">Plus
                                d'informations</a>
                        </ul>
                    </caption>
                </div>
            <?php } else { ?>
                <div class="film">
                    <img src="assets/img/afficheInconnu.jpg" alt="affiche du film" width="300" height="300">
                    <caption>
                        <ul>
                            <li><?php echo $genresMovie['title']; ?></li>
                            <a href="detail.php?slug=<?php echo $genresMovie['slug']; ?>" target="_blank">Plus
                                d'informations</a>
                        </ul>
                    </caption>
                </div>
            <?php } ?>
        <?php } ?>
        <?php }else ?>



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

