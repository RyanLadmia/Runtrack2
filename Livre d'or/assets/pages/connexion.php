<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupérer les données du formulaire
    $login = trim($_POST['login']);
    $password = trim($_POST['password']);

    // Connexion à la base de données
    $conn = new mysqli('localhost', 'root', '', 'livreor');

    // Vérifier la connexion
    if ($conn->connect_error) {
        die("Échec de la connexion : " . $conn->connect_error);
    }

    // Requête pour obtenir l'utilisateur avec le login donné
    $sql = "SELECT id, login, password FROM utilisateurs WHERE login = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $login);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows == 1) {
        $user = $result->fetch_assoc();

        // Vérification du mot de passe
        if (password_verify($password, $user['password'])) {
            // Les informations sont correctes, démarrer une session
            $_SESSION['loggedin'] = true;
            $_SESSION['login'] = $user['login'];
            $_SESSION['userid'] = $user['id']; // Stocker l'ID utilisateur dans la session

            // Redirection selon le login :
            header("Location: index.php");
            exit;
        } else {
            $error = "Nom d'utilisateur ou mot de passe incorrect.";
        }
    } else {
        $error = "Nom d'utilisateur ou mot de passe incorrect.";
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
    <title>Connexion</title>
    <link rel="stylesheet" href='../../assets/css/livre_or.css'>
    <link rel="icon" type="image/x-icon" href='../../assets/medias/livre_or_favicon.jpg'>
</head>
<body>
    <!-- Header -->
    <?php include '../../includes/header.php'; ?>

    <main>
        <form class="formulaire_connexion" action="connexion.php" method="post">
            <caption><u>Formulaire de connexion :</u></caption><br><br>
            <label for="login">Nom d'utilisateur :</label><br>
            <input type="text" id="login" name="login" autocomplete="off" required><br><br>
            <label for="password">Mot de passe :</label><br>
            <input type="password" id="password" name="password" autocomplete="off" required><br><br>
            <input type="submit" value="Connexion">
        </form>
        <br><br>
        <?php if (isset($error)): ?>
            <p class="echo"><?php echo htmlspecialchars($error); ?></p>
        <?php endif; ?>
        <a class="bouton_connexion" href="deconnexion.php">Déconnexion</a>
    </main>
</body>
</html>
