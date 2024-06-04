<?php
        session_start();

        //Compteur à 0 :
        if(isset($_POST['Reset'])){
            $_SESSION['nbvisites']= 0;
        } else {

            // Compteur ++ :

            if(isset($_SESSION['nbvisites'])){
                $_SESSION['nbvisites']++;
            } else{
                $_SESSION['nbvisites']=1;
            }
        }           
    ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jour 8; Job 1</title>
</head>

<body>
    <form method="post" action="index.php">
        <input type="submit" name="Reset" value="Reset">
    </form>
    <br><br>

    <?php 
        // Affichage :
        echo "Nombre de visite : " .$_SESSION['nbvisites']; 
    ?>

</body>
</html>