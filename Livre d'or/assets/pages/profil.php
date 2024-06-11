<?php
session_start();

// Rediriger les utilisateurs non connectés vers la page de connexion
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header("Location: connexion.php");
    exit;
}

// Vérifier si l'ID utilisateur est défini dans la session
if (!isset($_SESSION['userid']) || empty($_SESSION['userid'])) {
    die("ID utilisateur non défini.");
}

$userid = $_SESSION['userid'];

// Connexion à la base de données
$conn = new mysqli('localhost', 'root', '', 'livreor');

// Vérifier la connexion
if ($conn->connect_error) {
    die("Échec de la connexion : " . $conn->connect_error);
}

// Récupérer les informations actuelles de l'utilisateur
$sql = "SELECT login FROM utilisateurs WHERE id = ?";
$stmt = $conn->prepare($sql);

if ($stmt === false) {
    die("Erreur lors de la préparation de la requête : " . $conn->error);
}

$stmt->bind_param("i", $userid);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows === 1) {
    $user = $result->fetch_assoc();
} else {
    echo "Utilisateur non trouvé.";
    exit;
}

$stmt->close();

// Mise à jour des informations de l'utilisateur
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $login = trim($_POST['login']);
    $password = trim($_POST['password']);
    $confirm_password = trim($_POST['confirm_password']);

    // Vérifier que le login est rempli et que les mots de passe correspondent s'ils sont fournis
    if (empty($login) || (!empty($password) && $password !== $confirm_password)) {
        $error = "Veuillez remplir tous les champs correctement.";
    } else {
        // Préparer la mise à jour
        if (!empty($password)) {
            // Hacher le mot de passe
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);
            $sql = "UPDATE utilisateurs SET login = ?, password = ? WHERE id = ?";
            $stmt = $conn->prepare($sql);

            if ($stmt === false) {
                die("Erreur lors de la préparation de la requête : " . $conn->error);
            }

            $stmt->bind_param("ssi", $login, $hashed_password, $userid);
        } else {
            $sql = "UPDATE utilisateurs SET login = ? WHERE id = ?";
            $stmt = $conn->prepare($sql);

            if ($stmt === false) {
                die("Erreur lors de la préparation de la requête : " . $conn->error);
            }

            $stmt->bind_param("si", $login, $userid);
        }

        // Exécuter la mise à jour
        if ($stmt->execute()) {
            $_SESSION['login'] = $login;
            $success = "Les informations ont été mises à jour avec succès.";
        } else {
            $error = "Erreur lors de la mise à jour. Veuillez réessayer.";
        }

        $stmt->close();
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier le profil</title>
    <link rel="stylesheet" href='../../assets/css/index.css'>
</head>
<body>
    <!-- Header -->
    <?php include '../../includes/header.php'; ?>

    <main>
        <?php if (isset($error)): ?>
            <p class="echo"><?php echo htmlspecialchars($error); ?></p>
        <?php endif; ?>
        <?php if (isset($success)): ?>
            <p class="echo"><?php echo htmlspecialchars($success); ?></p>
        <?php endif; ?>
        <form class="formulaire_profil" action="profil.php" method="post">
            <caption><u>Modifier votre profil :</u></caption><br><br>
            <label for="login">Login :</label><br>
            <input type="text" id="login" name="login" value="<?php echo htmlspecialchars($user['login']); ?>" required>
            <br><br>
            <label for="password">Nouveau mot de passe :</label><br>
            <input type="password" id="password" name="password">
            <br><br>
            <label for="confirm_password">Confirmer le nouveau mot de passe :</label><br>
            <input type="password" id="confirm_password" name="confirm_password">
            <br><br>
            <input type="submit" value="Mettre à jour">
        </form>
        <br><br>
        <a class="bouton" href="deconnexion.php">Déconnexion</a>
    </main>
</body>
</html>
