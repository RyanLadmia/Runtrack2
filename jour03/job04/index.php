<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Couter characters</title>
</head>

<body>
    <?php
    $str = "Dans l'espace, personne ne vous entend crier";
    $counter = 0;
        for($i=0; isset($str[$i]); $i++){
            $counter++;
        }
        echo "Counter = ".$counter;

    ?>
</body>
</html>