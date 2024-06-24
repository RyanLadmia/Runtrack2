<?php
    if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['largeur']) && isset($_GET['hauteur'])) {
        $largeur = $_GET['largeur'];
        $hauteur = $_GET['hauteur'];
        $isNumber = true;

        // Vérifier si chaque caractère de largeur est un chiffre
        for ($i = 0; isset($largeur[$i]); $i++) {
            if ($largeur[$i] < '0' || $largeur[$i] > '9') {
                $isNumber = false;
                break;
            }
        }

        // Vérifier si chaque caractère de hauteur est un chiffre
        for ($i = 0; isset($hauteur[$i]); $i++) {
            if ($hauteur[$i] < '0' || $hauteur[$i] > '9') {
                $isNumber = false;
                break;
            }
        }

        if ($isNumber && $largeur !== '' && $hauteur !== '') {
            $largeur = (int)$largeur;
            $hauteur = (int)$hauteur;

            // Afficher le toit de la maison
            for ($i = 0; $i < $hauteur; $i++) {
                // Espaces avant le début du toit
                for ($j = $hauteur - $i - 1; $j > 0; $j--) {
                    echo "&nbsp;";
                }
                // Partie gauche du toit
                echo "/ ";
                // Espaces entre les côtés du toit
                for ($j = 0; $j < 2 * $i; $j++) {
                    echo "-";
                }
                // Partie droite du toit
                echo "\\<br>";
            }

            // Afficher les murs et le sol de la maison
            for ($i = 0; $i < $hauteur; $i++) {
                echo "|";
                for ($j = 0; $j < 2 * $hauteur; $j++) {
                    echo "-";                                 // Avec &nbsp la largeur entre / et \ est insuffisante
                }
                echo "|<br>";
            }

            // Afficher le sol de la maison
            echo "|";
            for ($i = 0; $i < 2 * $hauteur; $i++) {
                echo "-";
            }
            echo "|<br>";
        } else {
            echo "Veuillez entrer des valeurs numériques valides pour la largeur et la hauteur.";
        }
    }
    ?>



<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jour 4&5 Job 7</title>
   
</head>
<body>
    <br><br>
    <form action="index.php" method="GET">
        <label for="largeur">Largeur :</label><br>
        <input type="text" name="largeur" id="largeur"><br><br>
        <label for="hauteur">Hauteur :</label><br>
        <input type="text" name="hauteur" id="hauteur"><br><br>
        <input type="submit" value="Afficher la maison">
    </form>
    <br><br>

    
</body>
</html>
