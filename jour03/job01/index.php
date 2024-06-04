<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tableau Paire ou Impaire</title>
</head>
<body>
    <?php
        $nombres = [200, 2004, 173, 98, 171, 404, 459];

        foreach($nombres as $n){ //nombre seul
            if($n % 2 == 0){
                echo "$n est pair <br/>";
            } else {
                echo "$n est impaire <br/>";
            }  
        }
    ?>
</body>
</html>