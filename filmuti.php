<?php
include('inc/header.php');
$errors = array();
$success = false;
if (!empty($_POST['submitted'])) {
    $rate = clean($_POST['rate']);

    if (is_numeric(empty($rate))) {
        $errors['rate'] = 'Donnez une note entre 1 et 5';
    } elseif (mb_strlen($rate) > 5) {
        $errors['rate'] = 'Donnez une note entre 1 et 5';
    } elseif (mb_strlen($rate) < 1) {
        $errors['rate'] = 'Donnez une note entre 1 et 5';
    } else {
        $sql = "SELECT note FROM movie_user WHERE rate = :note";
        $query = $pdo->prepare($sql);
        $query->bindValue(':note', $rate, PDO::PARAM_STR);
        $query->execute();
        $rating = $query->fetch();
        if (!empty($rating)) {
            $errors['rate'] = 'Vous avez deja voté';
        }
    }if (count($errors)== 0) {
        $sql = "INSERT INTO movie_user VALUES (null, null,,null, :note, null,  NOW())";
        $query = $pdo->prepare($sql);
        $query->bindValue(':note', $rate, PDO::PARAM_STR);
        $query->execute();
        $success = true;
    }
}
?>



<body>
<section id="filmuti">
    <div class="wrap">
        <h2>Mes films</h2>
        <a href="">Ajouter mes films</a>
        <div class="mesfilms">
            <img src="">
            <p>Titre</p>
            <p>Date</p>
            <form action="filmuti.php" method="post">
                <input type="number"name="rate" id="rate" placeholder="Note">
                <p class="error"><?php if (!empty($errors['rate'])) {
                        echo $errors['rate'];
                    } ?></p>
                <input type="submit" name="submitted">
            </form>
            <a href="">Supprimer ce film</a>
        </div>
    </div>
</section>

</body>

<?php
include('inc/footer.php');