<?php
    function bonjour($jour){
        if ($jour==true){
            echo "Bonjour";
        }
        elseif ($jour==false) {
            echo "Bonsoir";
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jour7 Job2</title>
</head>
<body>
    <?php
       echo bonjour(true); 
       echo "<br>";
       echo bonjour(false);        
    ?>
    
</body>
</html>