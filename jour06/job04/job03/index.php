<?php
$counter = 0;
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        foreach($_POST as $key => $value){
            if(isset($_POST[$key]) && $_POST[$key] !== ''){
                $counter++;
            }
        }
    }
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jour 4 Job 3 </title>
</head>
<body>
<form action="index.php" method="POST">
        <label for="name">Nom</label><br>
        <input type="text" name="name" id="name"><br><br>
        <label for="firstname">Prénom</label><br>
        <input type="text" name="firstname" id="firstname"><br><br>
        <input type="submit" value="Envoyer">
    </form>
    <br><br>
    <?php echo "Le nombre d'arguments POST envoyés est : " .$counter; ?>
    
</body>
</html>