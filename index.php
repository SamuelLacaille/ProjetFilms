<?php
//session_start();
include 'inc/pdo.php';
include 'functions/functions.php';
$title = 'homepage';




$sql= "SELECT * FROM movies_full ORDER BY RAND() LIMIT 100";
$query = $pdo->prepare($sql);
$query->execute();

$movies = $query->fetchAll();


// debug($movies);












include 'inc/header.php';
//debug($_SESSION);
?>

    <h1>Accueil</h1>

    <div class="wrap">
        <div class="tri">
            <h2>Affiner la recherche</h2>
            <form class="triage">
                <p>Par genre : </p>
                <!-- beaucoup de checkbox ,<input type='checkbox' name="categorie[]">,  $_POST['categorie']=>array() -->
                <div>
                    <input type="checkbox" id="drama" name="drama">

                    <label for="drama">Drama</label>
                </div>

                <div>
                    <input type="checkbox" id="fantasy" name="fantasy">
                    <label for="fantasy">Fantasy</label>
                </div>
                <div>
                    <input type="checkbox" id="romance" name="romance">
                    <label for="romance">Romance</label>
                </div>

                <div>
                    <input type="checkbox" id="action" name="action">
                    <label for="action">Action</label>
                </div>
                <div>
                    <input type="checkbox" id="thriller" name="thriller">
                    <label for="thriller">Thriller</label>
                </div>
                <div>
                    <input type="checkbox" id="aventure" name="aventure">

                    <label for="aventure">Aventure</label>
                </div>

                <div>
                    <input type="checkbox" id="comedy" name="comedy">
                    <label for="comedy">Comedy</label>
                </div>
                <div>
                    <input type="checkbox" id="sciFi" name="sciFi">
                    <label for="sciFi">Sci-Fi</label>
                </div>

                <div>
                    <input type="checkbox" id="family" name="family">
                    <label for="family">Family</label>
                </div>
                <div>
                    <input type="checkbox" id="horror" name="horror">
                    <label for="horror">Horror</label>
                </div>
                <div>
                    <input type="checkbox" id="war" name="war">
                    <label for="war">War</label>
                </div>
                <div>
                    <input type="checkbox" id="crime" name="crime">
                    <label for="crime">Crime</label>
                </div>
                <div>
                    <input type="checkbox" id="mistery" name="mistery">
                    <label for="mistery">Mistery</label>
                </div>
                <div>
                    <input type="checkbox" id="music" name="music">
                    <label for="music">Music</label>
                </div>
                <div>
                    <input type="checkbox" id="biography" name="biography">
                    <label for="biography">Biography</label>
                </div>
                <div>
                    <input type="checkbox" id="documentary" name="documentary">
                    <label for="documentary">Documentary</label>
                </div>
                <div>
                    <input type="checkbox" id="history" name="history">
                    <label for="history">History</label>
                </div>
                <div>
                    <input type="checkbox" id="animation" name="animation">
                    <label for="animation">Animation</label>
                </div>
                <div>
                    <input type="checkbox" id="sport" name="sport">
                    <label for="sport">Sport</label>
                </div>
                <div>
                    <input type="checkbox" id="western" name="western">
                    <label for="western">Western</label>
                </div>
                <p>Par décennie : </p>
                <div>
                    <input type="number" id="dateFilm" name="dateFilm"
                           min="1880" max="2020" step="10">
                </div>

            </form>

            <input type="submit" value="Trier">


        </div>

        <section id="films">
            <h2>Les films</h2>
           <?php foreach ($movies as $movie){ ?>


            <div class="film">
                <img src="posters/<?php echo $movie['id']; ?>.jpg" alt="affiche du film">
                <caption>
                    <ul>
                        <li><?php echo $movie['title']; ?></li>
                        <a href="detail.php?slug=<?php echo $movie['slug']; ?>"target="_blank">Plus d'informations</a>
                    </ul>
                </caption>
            </div>
            <?php }   ?>




                <input type="button" id="plusfilm" name="plusfilm" value="+ de films">
        </section>


    </div>



<?php include 'inc/footer.php';


