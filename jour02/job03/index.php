<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jour2 Job03</title>
</head>

<body>
    <?php
      for ($i=0; $i<=100; $i++){
        if($i == 42){
            echo "La Plateforme_<br/>";
        } elseif ($i>=25 && $i<=50){
         echo "<u>$i</u><br/>";
        } elseif($i>=0 && $i<=20) {
            echo "<i>$i</i><br/>";
        } else{
            echo $i.'<br/>';
        }
      }
    
    ?>




























    <!-- for ($i = 0; $i <= 100; $i++) {
        if ($i==42){
            echo "La Plateforme_<br/>";

    } elseif ($i>=0 && $i<=20){
        echo "<i>$i</i><br/>";

    } elseif ($i>=25 && $i<=50){
        echo "<u>$i</u><br/>";

    }    else {
     echo $i."<br/>";
    }
    } -->
</body>
</html>

