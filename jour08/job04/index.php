<?php
// Définir les actions de connexion et de déconnexion
if (isset($_POST['connexion']) && isset($_POST['prenom'])) {
    // Si le formulaire est soumis avec un prénom, définir le cookie
    setcookie('prenom', $_POST['prenom'], time() + 3600); // Cookie valide pendant 1 heure
    $_COOKIE['prenom'] = $_POST['prenom'];
}

if (isset($_POST['deco'])) {
    // Si l'utilisateur clique sur déconnexion, effacer le cookie
    setcookie('prenom', '', time() - 3600); // Expirer le cookie
    unset($_COOKIE['prenom']);
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jour 8 Job 04</title>
</head>

<body>
    <?php
    if (isset($_COOKIE['prenom'])) {
        // Si le cookie existe, afficher le message de bienvenue et le bouton de déconnexion
        echo "Bonjour " . htmlspecialchars($_COOKIE['prenom']) . " !";
        echo '<form method="post" action=""><br>
                <button type="submit" name="deco">Déconnexion</button>
              </form>';
    } else {
        // Si le cookie n'existe pas, afficher le formulaire de connexion
        echo '<form method="post" action="">
                <label for="prenom">Prénom:</label><br>
                <input type="text" id="prenom" name="prenom" required><br><br>
                <button type="submit" name="connexion">Connexion</button>
              </form>';
    }
    ?>
</body>
</html>
