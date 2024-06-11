<?php
    session_start();

    // Connexion à la base de donnée : 
    $conn = new mysqli('localhost', 'root', '', 'livreor');
        if($conn->connect_error){
            die("Echec de la connexion." . $conn->connect_error);
        }

    // Requete sql pour afficher les commentaires :
    $sql = "SELECT utilisateurs.login, commentaires.date, commentaires.commentaire FROM utilisateurs INNER JOIN commentaires";
    $result = $conn->query($sql);

    $comments = [];
    if($result->num_rows>0){
        while($row = $result->fetch_assoc()){
            $comments[]=$row;
        }
    }
    $conn->close();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Espace commentaires</title>
</head>
<body>
    <!-- Header -->
    <?php include '../../includes/header.php'; ?>
    <main>
        <?php if(isset($_SESSION['loggedin'])&&$_SESSION['loggedin']===true):?>
            <a href="commentaire.php">Ajouter un commentaire</a>
        <?php endif;?>

        <?php if(!empty($comments)):?>
            <?php foreach($comments as $comment):?>
                <div class="comment">
                    <p>Posté le <?php echo date('d/m/Y', strtotime($comment['date'])); ?> par <?php echo htmlspecialchars($comment['login']);?>;</p>
                    <p> <?php echo htmlspecialchars($comment['commentaire']); ?></p>
                </div>
            <?php endforeach;?>
            <?php else:?>
                <p>Aucun commentaire pour le moment.</p>
        <?php endif;?>
    </main>
</body>
</html>