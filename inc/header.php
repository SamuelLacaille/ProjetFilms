<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>php6</title>
<!--    <link href="assets/css/style.css" rel="stylesheet" />
--></head>
<body>
<header>
    <nav class="nav">
        <a href="index.php"><img src="assets/img/img2.png" ></a>
        <ul>
            <li><a href="register.php">Inscription</a></li>
            <li><a href="login.php">Login</a></li>
            <li><a href="admin.php">Admin</a></li>
            <li><a href="index.php">Home</a></li>
            <li><a href="userpage.php?id=<?php $_SESSION['login']['id'] ?>">Mon compte</a></li>
        </ul>
    </nav>
    <div class="clear"></div>
</header>

