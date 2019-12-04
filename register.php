<?php
include('inc/header.php');
?>
<body>
<div class="wrap">
    <h2> Inscription </h2>
    <form>
        <label for="pseudo">Pseudo</label>
        <input type="text" name="pseudo" id="pseudo" value="">
        <label for="email">Email</label>
        <input type="text" name="email" id="email" value="">
        <label for="password1">Mot de passe</label>
        <input type="password" name="password1" id="password1" value="">
        <label for="password2">Confirmation de mot de passe</label>
        <input type="password" name="password2" id="password2" value="">

        <input type="submit" name="submitted" value="Inscription">
    </form>
</div>
</body>


<?php
include('inc/footer.php');
?>