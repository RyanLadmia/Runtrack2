<?php
    session_start();

    // Connexion à la base de donnée : 
    $conn = new mysqli('localhost', 'root', '', 'livreor');
        if($conn->connect_error){
            die("Echec de la connexion." . $conn->connect_error);
        }

    // Requete sql pour afficher les commentaires :
    $sql = "SELECT utilisateurs.login, commentaires.date, commentaires.commentaire FROM utilisateurs INNER JOIN commentaires ON utilisateurs.id = commentaires.id_utilisateur ORDER BY commentaires.date DESC";
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
    <link rel="stylesheet" href='../../assets/css/livre_or.css'>
    <link rel="icon" type="image/x-icon" href='../../assets/medias/livre_or_favicon.jpg'>
</head>
<body>
    <!-- Header -->
    <?php include '../../includes/header.php'; ?>
    <main>
    <h2 class="h2_livre-or">Commentaires des utilisateurs :</h2>
        <br><br>
        <?php if(isset($_SESSION['loggedin'])&&$_SESSION['loggedin']===true):?>
            <a class="ajout" href="commentaire.php"><u>Ajouter un commentaire :</u></a>
        <?php endif;?>
        <br><br>

        <?php if(!empty($comments)):?>
            <?php foreach($comments as $comment):?>
                <div class="comment">
                    <p>Posté le <?php echo date('d/m/Y', strtotime($comment['date'])); ?> par <?php echo htmlspecialchars($comment['login']);?> :</p>
                    <p> <?php echo htmlspecialchars($comment['commentaire']); ?></p>
                </div>
            <?php endforeach;?>
            <?php else:?>
                <p>Aucun commentaire pour le moment.</p>
        <?php endif;?>
        <a class="bouton_livre-or" href="deconnexion.php">Déconnexion</a>
    </main>
</body>
</html>