<?php
// Avec strlen :
    /*function occurrences($str, $char){
        $count=0;
        for($i=0; $i<strlen($str); $i++){
            if($str[$i]==$char){
                $count++;
            }
        }
        return $count;
    } */

    //Sans strlen :
    function occurrences($str, $char){
        $count=0;
        $i=0;
        while(isset($str[$i])){
            if($str[$i]==$char){
                $char++;
            }
            $i++;
        }
        return $count;
    }
    ?>
    

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        $str="Bonjour";
        $char="o";
        echo "Le nombre d'occurrences de '$char' dans '$str'est de :" .occurrences($str, $char);
    ?>
</body>
</html>