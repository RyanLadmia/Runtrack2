<?php
// PREMIERE METHODE :
    $mysqli= mysqli_connect("localhost", "root", "", "jour09");
    $myresult= mysqli_query($mysqli, "SELECT * FROM etudiants");
    $row= mysqli_fetch_assoc($myresult);
    echo
        "<table border=2>
            <thead>
                <tr>
                    <th>Prenom</th>
                    <th>Nom</th>
                    <th>Naissance</th>
                    <th>Sexe</th>
                    <th>Email</th>
                </tr>
            </thead>
            <tbody>";
            foreach ($myresult as $user){
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
mysqli_close($mysqli)
?> 





<!-- SECONDE METHODE : (J'ai changer de valeurs)-->

<?php
$mysql= mysqli_connect("localhost", "root", "", "jour09");

if(!$mysql){
    die("Connection failed: " . mysqli_connect_error());
}
$results= mysqli_query($mysql, "SELECT * FROM etudiants");

if (!$results){
    die("Error" . mysqli_error($mysql));
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="index.css">
    <title>Jour 10 Job 01</title>
</head>
<body>
    <br><br>
    <table>
        <thead>
            <tr>
            <?php
                if ($results->num_rows > 0) {
                    // Récupère les noms des champs
                    $fields = $results->fetch_fields();
                    foreach ($fields as $field) {
                        echo "<th>" . $field->name . "</th>";
                    }
                }
                ?>
            </tr>
        </thead>
        <tbody>
            <?php
            while($row= mysqli_fetch_assoc($results)){
            echo "<tr>";
                echo "<td>".$row['id']."</td>";
                echo "<td>".$row['prenom']."</td>";
                echo "<td>".$row['nom']."</td>";
                echo "<td>".$row['naissance']."</td>";
                echo "<td>".$row['sexe']."</td>";
                echo "<td>".$row['email']."</td>";
            echo "</tr>";  
            }
            ?>          
        </tbody>
    </table>
<?php
    mysqli_close($mysql);
?>
</body>
</html>