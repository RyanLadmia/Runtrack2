<?php
    // Durée de vie du cookie : 1 heure (3600 secondes)
    $cookie_duration = 36000;

    // Réinitialiser le compteur si le bouton reset est cliqué
    if (isset($_POST['Reset'])) {
        setcookie("nbvisites", '', time() + $cookie_duration);
        $nbvisites = 0;
    } else {
        // Initialiser ou incrémenter le compteur de visites
        if (isset($_COOKIE['nbvisites'])) {
            $nbvisites = $_COOKIE['nbvisites'] + 1;
        } else {
            $nbvisites = 1;
        }
        setcookie("nbvisites", $nbvisites, time() + $cookie_duration);
    }

    // Afficher le compteur de visites
    echo "Nombre de visites est de : " . $nbvisites;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jour 8;  Job 2</title>
</head>
<body>
    <br><br>
    <form method="post" action="index.php">
        <input type="submit" name="Reset" value="Reset">
    </form>
</body>
</html>
