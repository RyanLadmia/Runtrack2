<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jour 2 Job 2</title>
</head>

<body>
    <?php
    /* Avec Fonction système !array_:
    
        $exclusions = [26, 37, 88, 1111, 3233];
            for ($i=0; $i<=1337; $i++){
                if (!array_($i, $exclusions)) {
                    echo $i . '<br />';
        }
        }*/

        for($i=0; $i<=1337; $i++){
            if($i==26 ||$i== 37 ||$i== 88||$i== 1111||$i== 3233){
                echo null;
            } else {
                echo $i.'<br/>';
            }
        }

    ?>
</body>
</html>