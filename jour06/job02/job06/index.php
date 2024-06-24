<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jour 2 Job 6</title>
    
</head>
<body>
    <?php
        $width = 20;
        $height = 10;
 
        for($h=0; $h < $height; $h++){
                echo "|";
            if($h==0 || $h == $height -1){
                for($w=0; $w < $width; $w++){
                    echo "--";
                }
            } else {
                for($w=0; $w+1 < $width -1;$w++){
                    echo"&nbsp;&nbsp;&nbsp";
                }
            }
            echo "|";
            echo "<br/>";
            }
    ?>
    
</body>
</html>