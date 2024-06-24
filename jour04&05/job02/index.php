<?php
    if ($_SERVER["REQUEST_METHOD"] == "GET" && !empty($_GET)) {
        echo "<table border='1'>";
        echo "<tr><th>Argument</th><th>Valeur</th></tr>";

        foreach ($_GET as $key => $value) {
            if (isset($_GET[$key]) && $_GET[$key] !== '') {
                echo "<tr><td>" . htmlspecialchars($key) . "</td><td>" . htmlspecialchars($value) . "</td></tr>";
            }
        }

        echo "</table>";
    }
    ?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jour 4&5 job 2</title>
</head>
<body>
    <br><br>
    <form method="GET" action="index.php">
        <label for="prenom">Prénom:</label>
        <input type="text" id="prenom" name="prenom"><br><br>

        <label for="nom">Nom:</label>
        <input type="text" id="nom" name="nom"><br><br>

        <input type="submit" value="Envoyer">
    </form><br><br>
</body>
</html>
