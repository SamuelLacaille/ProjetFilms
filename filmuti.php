<?php
include('inc/header.php');
$errors = array();
$success = false;
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