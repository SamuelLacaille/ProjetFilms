<?php
include 'inc/pdo.php';
include 'functions/functions.php';



// informations du film selectionné + affiche du film
//voir pagesingle
//prettyurl -> url ?slug=sleg du film


if(!empty($_GET['slug'])) {


    $slug = $_GET['slug'];

    $sql = "SELECT * FROM movies_full WHERE slug LIKE '".$slug."%'";
    $query = $pdo->prepare($sql);
    $query->execute();
    $film = $query->fetchAll();
   // debug($film);
   if(!empty($film)){

    }else{
        die ('404');
    }
}else{
    die('404');
}

include 'inc/header.php'; ?>


    <div class="wrap">
        <div class="infoFilm">
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





        </div>








    </div>




<?php include 'inc/footer.php'; ?>