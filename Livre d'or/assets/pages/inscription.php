<?php
    // Initialisation de la variable d'erreur :
    $error = '';

    // Connexion à la base de donnée :
    $db_server = "localhost";
    $db_user = "root";
    $db_password = "";
    $db_name = "livreor";

    $conn = new mysqli($db_server, $db_user, $db_password, $db_name);


    // Vérifier la connexion à la base de donnée :
    if ($conn->connect_error){
        die ("La connexion à la base de donnée a échoué :" . $conn->connect_error);
    }

    // Traitement du formulaire : 
    if($_SERVER["REQUEST_METHOD"] == "POST") {
        $login = htmlspecialchars($_POST['login']);
        $password = htmlspecialchars($_POST['password']);
        $confirm_password = htmlspecialchars($_POST['confirm_password']);

        // Validation basique des données :
            if (empty($login) || empty($password) || empty($confirm_password)) {
                $error = "Veuillez remplir tous les champs.";
            } elseif (strlen($password) < 8) { // Le signe > est utilisé pour vérifier si le mdp est inf à 8 caractères. On recherche l'erreur.
                $error = "Le mot de passe doit contenir au moins 8 caractères.";
            } elseif (!preg_match('/[A-Z]/', $password)) { // Le ! est utiliser pour vérifier l'abscence de majuscule.
                $error = "Le mot de passe doit contenir au moins une lettre majuscule.";
            } elseif (!preg_match('/[0-9]/', $password)){
                $error = "Le mot de passe doit contenir au moins un chiffre.";
            } elseif ($password !== $confirm_password) {
                $error = "Les mots de passe ne correspondent pas.";
            } else {
                // Hacher le mot de passe :
                $hashed_password = password_hash($password, PASSWORD_BCRYPT);

                // Insérer les informations de la base de donnée :
                    $sql = "INSERT INTO utilisateurs (login, password) VALUES (?, ?)";
                    $stmt = $conn->prepare($sql);
                    $stmt->bind_param("ss", $login, $hashed_password);

                    if ($stmt->execute()) {
                        // Rediriger vers la page de connexion : 
                        header ("Location: connexion.php");
                        exit();
                    } else {
                        $error = "Erreur : ". $stmt->error;
                    }
                    $stmt->close();
            }
            $conn->close();
        }
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page d'incription</title>
    <link rel="stylesheet" href='../../assets/css/livre_or.css'>
    <link rel="icon" type="image/x-icon" href='../../assets/medias/livre_or_favicon.jpg'>
    
</head>

<body>
    <!-- Header -->
    <?php include'../../includes/header.php'?>
    <main>
        <form class="formulaire_inscription" method="post" action="inscription.php">
            <caption><u>Formulaire d'inscription :</u></caption><br><br>
            <label for="login">Nom d'utilisateur :</label><br>
            <input type="text" id="login" name="login" value="" autocomplete="off" required><br><br>

            <label for="password">Mot de passe :</label><br>
            <input type="password" id="password" name="password" value="" autocomplete="off" required><br><br>

            <label for="confirm_passoword">Confirmer votre mot de passe :</label><br>
            <input type="password" id="confirm_password" name="confirm_password" value="" autocomplete="off" required><br><br>

            <input type="submit" value="Valider">
        </form>
        <br><br>
            <?php if (!empty($error)) : ?>
                <p class="echo"><?php echo $error; ?> </p>
            <?php endif; ?>
    </main>
</body>
</html>