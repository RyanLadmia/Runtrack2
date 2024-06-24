<?php
    session_start();

    // Connexion bdd :
    $db_server = 'localhost';
    $db_user = 'root'; 
    $db_password = '';
    $db_name = 'livreor';

    $conn = new mysqli($db_server, $db_user, $db_password, $db_name);
    // Verif connexion :
        if($conn->connect_error){
            die("Echec de la connexion.".$conn->connect_error);
        }

    // Rediriger utilisateurs non connectés :
        if(!isset($_SESSION['loggedin'])|| $_SESSION['loggedin'] !==true){
            header("Location: connexion.php");
            exit;
        }

    // Verif si ID defini dans la session :
        if (!isset($_SESSION['userid'])|| empty($_SESSION['userid'])){
            die("ID utilisateur non défini.");
        }
        
        // Traitement du formulaire : 
    if($_SERVER["REQUEST_METHOD"] == "POST") {

        // Récupérer commentaire et ID de l'utilisateur :
            $commentaire = trim($_POST['commentaire']);
            $userid = $_SESSION['userid'];

        // Requête SQL : Insérer les informations de la base de donnée :
            $sql = "INSERT INTO commentaires (commentaire, date, id_utilisateur) VALUES (?, NOW(), ?)";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("si", $commentaire, $userid);

            if ($stmt->execute()) {
                header("Location: livre-or.php");
                exit;
            } else {
                $error= "Erreur lors de l'ajout du commentaire. Veuillez réessayer.";
            }
            $stmt->close();
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nouveau commentaire</title>
    <link rel="stylesheet" href='../../assets/css/livre_or.css'>
    <link rel="icon" type="image/x-icon" href='../../assets/medias/livre_or_favicon.jpg'>
</head>
<body>
    <!-- Header -->
    <?php include '../../includes/header.php'; ?>

    <main>

        <?php if(isset($error)):?>
            <p><?php echo htmlspecialchars($error);?></p>
        <?php endif;?>

        <form class="formulaire_commentaire" action="commentaire.php" method="post">
            <caption><u>Poster un commentaire :</u></caption><br><br>
                <label for="commentaire">Commentaire :</label><br>
                <textarea id="commentaire" name="commentaire"></textarea><br><br>
                <input type="submit" value="Valider">
        </form>
        <a class="bouton_commentaire" href="deconnexion.php">Déconnexion</a>
    </main>
    
</body>
</html>