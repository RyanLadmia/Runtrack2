<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jour 3 Job 2</title>
</head>

<body>
<?php
$str = "Tous ces instants seront perdus dans le temps comme les larmes sous la pluie.";
$reverse = "";

// Parcourir la chaîne en sautant un caractère sur deux
for ($i = 0; isset($str[$i]); $i += 2) {
    $reverse .= $str[$i];
}

// Afficher le résultat
echo $reverse;
?>

</body>
</html>