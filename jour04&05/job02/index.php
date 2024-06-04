<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tableau GET</title>
</head>

<body>
    <form action="index.php" method="GET">
        <label for="firstname">Prénom</label>
        <input type="text" name="firstname" id="firstname">
        <label for="lastnale">Nom</label>
        <input type="text" name="lastname" id="lastname">
        <input type="submit" value="Envoyer">
    </form>
    <br><br>

    <?php
        if(!empty($_GET)){
            echo "<table>";
            echo "<thead>";
            echo "<tr><th>Arguments</th><th>Valeurs</th>";
            echo "</thead>";
            echo "<tbody>";
        }

      foreach($_GET as $key => $value){
        echo "<tr>";
        echo "<td>".htmlspecialchars($key)."</td>";
        echo "<td>".htmlspecialchars($value)."</td>";
        echo "</tr>";
    }
    ?>
    <style>
        table, tr, th, td{
            border: solid black;
            
        }
    
</body>
</html>