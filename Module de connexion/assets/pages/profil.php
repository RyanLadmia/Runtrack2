<?php
session_start();

// Rediriger les utilisateurs non connectés vers la page de connexion
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header("Location: connexion.php");
    exit;
}

// Connexion à la base de données
$conn = new mysqli('localhost', 'root', '', 'moduleconnexion');

// Vérifier la connexion
if ($conn->connect_error) {
    die("Échec de la connexion : " . $conn->connect_error);
}

// Récupérer les informations actuelles de l'utilisateur
$userid = $_SESSION['userid'];
$sql = "SELECT login, prenom, nom FROM utilisateurs WHERE id = ?";
$stmt = $conn->prepare($sql);
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
    $prenom = trim($_POST['prenom']);
    $nom = trim($_POST['nom']);
    $password = trim($_POST['password']);
    $confirm_password = trim($_POST['confirm_password']);

    // Vérifier que tous les champs sont remplis et que les mots de passe correspondent
    if (empty($login) || empty($prenom) || empty($nom) || (!empty($password) && $password !== $confirm_password)) {
        $error = "Veuillez remplir tous les champs correctement.";
    } else {
        // Préparer la mise à jour
        if (!empty($password)) {
            // Hacher le mot de passe
            $hashed_password = password_hash($password, PASSWORD_BCRYPT);
            $sql = "UPDATE utilisateurs SET login = ?, prenom = ?, nom = ?, password = ? WHERE id = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("ssssi", $login, $prenom, $nom, $hashed_password, $userid);
        } else {
            $sql = "UPDATE utilisateurs SET login = ?, prenom = ?, nom = ? WHERE id = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("sssi", $login, $prenom, $nom, $userid);
        }

        // Exécuter la mise à jour
        if ($stmt->execute()) {
            $_SESSION['login'] = $login;
            $_SESSION['prenom'] = $prenom;
            $_SESSION['nom'] = $nom;
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
    <?php include'../../includes/header.php'?>

    <?php if (isset($error)): ?>
        <?php echo $error; ?>
    <?php endif; ?>
    <?php if (isset($success)): ?>
        <?php echo $success; ?>
    <?php endif; ?>
    <form class ="formulaire_profil" action="profil.php" method="post">
        <caption><u>Modifier votre profil :</u></caption><br><br>
        <label for="login">Login :</label><br>
        <input type="text" id="login" name="login" value="<?php echo htmlspecialchars($user['login']); ?>" required>
        <br><br>
        <label for="prenom">Prénom :</label><br>
        <input type="text" id="prenom" name="prenom" value="<?php echo htmlspecialchars($user['prenom']); ?>" required>
        <br><br>
        <label for="nom">Nom :</label><br>
        <input type="text" id="nom" name="nom" value="<?php echo htmlspecialchars($user['nom']); ?>" required>
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

</body>
</html>
