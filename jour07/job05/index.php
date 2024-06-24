<?php
// Avec strlen :
    /*function occurrences($str, $char){
        $counter=0;
        for($i=0; $i<strlen($str); $i++){
            if($str[$i]==$char){
                $counter++;
            }
        }
        return $counter;
    } */

    //Sans strlen :
    function occurrences($str, $char){
        $counter=0;
        $i=0;
        while(isset($str[$i])){
            if($str[$i]==$char){
                $counter++;
            }
            $i++;
        }
        return $counter;
    }
    ?>
    

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jour 7 Job 5</title>
</head>
<body>
    <?php
        $str="Bonjour";
        $char="o";
        echo "Le nombre d'occurrences de '$char' dans '$str'est de :" .occurrences($str, $char);
    ?>
</body>
</html>