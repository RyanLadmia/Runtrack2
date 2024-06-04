<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    $str = "Tous ces instants seront perdus dans le temps comme les larmes sous la pluie.";

    // Parcourir la chaîne et afficher seulement un caractère sur deux
    for ($i = 0; $i < strlen($str); $i += 2) {
        echo $str[$i];
    }
    ?>
</body>
</html>