<?php
    $nombre='';

    if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['nombre'])) {
        $nombre = $_GET['nombre'];
        if ($nombre % 2 == 0) {
            echo "Nombre pair";
        } else {
            echo "Nombre impair";
        }
    } else {
        echo "Veuillez entrer un nombre valide.";
    }
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jour 4&5 Job 6</title>
</head>
<body>
    <br><br>
<form action="index.php" method="GET">
        <label for="nombre">Entrez un nombre :</label><br>
        <input type="text" name="nombre" id="nombre"><br><br>
        <input type="submit" value="Vérifier">
    </form>
</body>
</html>