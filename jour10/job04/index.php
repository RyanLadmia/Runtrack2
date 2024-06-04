<?php
    $mysqli = mysqli_connect("localhost", "root", "", "jour09");
    $myresult = mysqli_query($mysqli, "SELECT * FROM etudiants WHERE prenom LIKE 'T%'");
    $row = mysqli_fetch_assoc($myresult);

    echo
        "<table>
            <thead>
                <tr>
                    <th>Prenom</th>
                    <th>Nom</th>
                    <th>Date de naissance</th>
                    <th>Sexe</th>
                    <th>Email</th>
                </tr>
            </thead>
            <tbody>";
                foreach($myresult as $user){
                    echo "<tr>";
                        echo "<td>".$user['prenom']."</td>";
                        echo "<td>".$user['nom']."</td>";
                        echo "<td>".$user['naissance']."</td>";
                        echo "<td>".$user['sexe']."</td>";
                        echo "<td>".$user['email']."</td>";
                    echo "</tr>";
                }
                echo "</tbody>
        </table>";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="index.css">
    <title>Document</title>
</head>
<body>
</body>
</html>