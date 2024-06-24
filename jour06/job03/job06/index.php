<!DOCTYPE html>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jour 3 Job 6</title>
</head>


<body>
    <?php 
    // avec mb_strlen pour afficher les "é" et "è" :
    $str = "Les choses que l'on possède finissent par nous posséder.";
    $str_inverse = "";

    for ($i = mb_strlen($str, 'UTF-8') - 1; $i >= 0; $i--) {
        $str_inverse .= mb_substr($str, $i, 1, 'UTF-8');
    }
    echo $str_inverse;
    ?>  
    <br><br>

    
    <?php
    // sans fonction système (mais les accents sont remplacés par des losanges) :
$str = "Les choses que l'on possède finissent par nous posséder.";
$str_inverse = "";

// Parcourir la chaîne à l'envers
for ($i = 0; isset($str[$i]); $i++) {
    $str_inverse = $str[$i] . $str_inverse;
}

// Afficher le résultat
echo $str_inverse;
?>

</body>
</html>
