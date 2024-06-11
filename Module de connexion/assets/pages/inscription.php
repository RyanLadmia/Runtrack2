<?php

$error='';

    // Connexion à la base de donnéé :
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "moduleconnexion";

        $conn = new mysqli($servername, $username, $password, $dbname);

    // Vérifier la connexion :
        if($conn->connect_error) {
            die ("La connexion a échoué : " .$conn->connection_error);
        }

    // Traitement du formulaire : 
        if ($_SERVER["REQUEST_METHOD"]=="POST") {
            $login= htmlspecialchars($_POST['login']);
            $prenom= htmlspecialchars($_POST['prenom']);
            $nom= htmlspecialchars($_POST['nom']);
            $password = htmlspecialchars($_POST['password']);
            $confirm_password= htmlspecialchars($_POST['confirm_password']); 

            // Validation basique des données
    if (empty($login) || empty($password)) {
        $error = "Veuillez remplir tous les champs.";
    } 
    
    // Vérifier que les mots de passes correspondent :
        if($password == $confirm_password){
            // Hacher le mot de passe :
                $hashed_password = password_hash($password, PASSWORD_BCRYPT);
        
                // Inserer les informations dans la base de donnée :
                    $sql = "INSERT INTO utilisateurs (login, prenom, nom, password) VALUES (?, ?, ?, ?)";
                    $stmt = $conn-> prepare($sql);
                    $stmt -> bind_param("ssss", $login, $prenom, $nom, $hashed_password);

                    if($stmt->execute()){
                        // Rediriger vers la page de connexion :
                        header("Location: connexion.php");
                        exit();
                    } else { 
                        $error = "Erreur : " . $stmt->error;
                    }
                    $stmt-> close();
                    } else {
                       $error = "Les mots de passe ne correspondent pas.";
        }
        $conn->close();
    }
?>


<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription</title>
    <link rel="stylesheet" href='../../assets/css/index.css'>
</head>

<body>
    <!-- Header -->
<?php include'../../includes/header.php'?>

    <main>

        <form class="formulaire" method="post" action="inscription.php">
            <caption><u>Formulaire d'inscription :</u> <caption><br><br>
            <label for="login">Login : </label><br>
                <input type="text" id="login" name="login" value="" autocomplete="off" required><br><br>
            <label for="prenom">Prenom : </label><br>
                <input type="text" id="prenom" name="prenom" value="" autocomplete="off" required><br><br>
            <label for="nom">Nom : </label><br>
                <input type="text" id="nom" name="nom" value="" autocomplete="off" required><br><br>
            <label for="pass">Mot de passe : </label><br>
                <input type="password" id="password" name="password" value="" required><br><br>
            <label for="confirm_password">Confirmer le mot de passe : </label><br>
                <input type="password" id="confirm_password" name="confirm_password" value="" required><br><br>
            <input type="submit" class="buton" value="Valider">
        </form>
        <br><br>
        <?php if (!empty($error)): ?>
            <p class="echo"><?php echo $error; ?></p>
        <?php endif; ?>
    </main>

</body>
</html>