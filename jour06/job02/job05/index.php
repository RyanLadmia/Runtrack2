<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jour 2 Job 5</title>
</head>

<body>
<?php
// Boucle principale pour parcourir les nombres de 2 à 1000
for ($num = 2; $num <= 1000; $num++) {
    $is_prime = true; // Initialisation d'un booléen pour vérifier si le nombre est premier
    // Vérification des diviseurs possibles du nombre courant
    for ($i = 2; $i * $i <= $num; $i++) {
        if ($num % $i == 0) {
            $is_prime = false; // Le nombre n'est pas premier
            break; // Sortir de la boucle si un diviseur est trouvé
        }
    }
    // Si le nombre est premier, l'afficher
    if ($is_prime) {
        echo $num . "<br />";
    }
}
?>




    
</body>
</html>