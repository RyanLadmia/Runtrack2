<?php
session_start();

// Vérifiez si l'utilisateur est non connecté:
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header('Location: connexion.php');
    exit;
}

// Connexion à la base de données :
    $conn = new mysqli('localhost', 'root', '', 'moduleconnexion');

      // Vérifier la connexion
      if ($conn->connect_error) {
        die("Échec de la connexion : " . $conn->connect_error);
    }

// Requête pour acceder aux infos des uilisateurs :
    $sql= "SELECT * FROM utilisateurs";
    $result = $conn->query($sql);


?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page Admin</title>
    <link rel="stylesheet" href='../../assets/css/index.css'>
</head>
<body>
    <!-- Header -->
    <?php include'../../includes/header.php'?>

    <h1>Bienvenue webmaster !</h1>
    <h2>Liste des utilisateurs</h2>
    <table class="table" border="1">
        <tr>
            <th>ID</th>
            <th>Login</th>
            <th>Prénom</th>
            <th>Nom</th>
        </tr>
        <?php
        if ($result->num_rows > 0) {
            // Afficher les données de chaque ligne
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row['id'] . "</td>";
                echo "<td>" . $row['login'] . "</td>";
                echo "<td>" . $row['prenom'] . "</td>";
                echo "<td>" . $row['nom'] . "</td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='4'>Aucun utilisateur trouvé</td></tr>";
        }
        ?>
    </table>
    <br><br><br>
    <a class="bouton" href="deconnexion.php">Se déconnecter</a>
</body>
</html>


