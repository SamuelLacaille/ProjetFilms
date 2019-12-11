<?php
session_start();
include 'inc/pdo.php';
include 'functions/functions.php';
$title = 'homepage';


include ('inc/header.php');

?>
<body>

    <div class="wrap">
    <h2>Mon compte</h2>
        <div class="compte">
            <p>Email : <?php echo $_SESSION['login']['email'] ?></p>
            <p>Pseudo : <?php echo $_SESSION['login']['pseudo'] ?></p>
        </div>
    </div>
</body>


<?php
include ('inc/footer.php');


