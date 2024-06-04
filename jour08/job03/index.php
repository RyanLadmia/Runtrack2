<?php
// Démarrer session :
    session_start();
    
// Reset liste :
        if(isset($_POST['Reset'])){
            unset($_SESSION['prenoms']);
        }
            else if(isset($_POST['prenom']) && !empty($_POST['prenom'])){
// Ajouter prénom à la liste :
                $prenom= $_POST['prenom'];
                $_SESSION['prenoms'][]=$prenom;
            }
// Récupérer liste des prénoms :
            $prenoms =isset($_SESSION['prenoms']) ? $_SESSION['prenoms']:[];
                
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jour 8; Job0 3</title>
</head>
<body>
    <form method="post" action="index.php">
        <label type="text">Text : </label>
        <input type="text" name="prenom" id="prenom">
        <br><br>
        <input type="submit" name="Envoyer" value="Envoyer">
        <br><br>
        <input type="submit" name="Reset" value="Reset">

        <ul>
            <?php foreach ($prenoms as $p): ?>
            <li><?php echo htmlspecialchars($p); ?></li>
            <?php endforeach; ?>
        </ul>
    
</body>
</html>