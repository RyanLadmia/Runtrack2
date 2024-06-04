<?php
    function calcule($a, $b, $operation){       
        switch($operation){
            case '+':
                return $a + $b;
            case '-':
                return $a - $b;
            case '*':
                return $a * $b;
            case '%':
                if($a !=0 && $b !=0){
                    return $a % $b;
                } else{
                    return "Division par zéro impossible";
                }
            case '/':
                if($a !=0 && $b !=0){
                    return $a / $b;
                } else{
                    return "Division par zéro ipossible";
                }
                }           
        }
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jour7 Job4</title>
</head>
<body>

    <?php
        echo calcule(8, 2, '/');
    ?>
    
</body>
</html>