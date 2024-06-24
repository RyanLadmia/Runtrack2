<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jour 3 Job 7</title>
</head>

<body>
<?php
  
$str = "Certaines choses changent, et d'autres ne changeront jamais.";
$str2 = "";

// Parcourir la chaîne en remplaçant les caractères
for ($i = 0; isset($str[$i + 1]); $i++) {
    $str2 .= $str[$i + 1];
}

// Ajouter le premier caractère à la fin
$str2 .= $str[0];

// Afficher le résultat
echo $str2;
?>

    
    
</body>
</html>