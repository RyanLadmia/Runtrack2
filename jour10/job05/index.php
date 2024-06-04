<?php
    $mysqli = mysqli_connect("localhost", "root", "", "jour09");
    $myresult = mysqli_query($mysqli, "SELECT * FROM etudiants WHERE TIMESTAMPDIFF(YEAR, naissance, CURDATE()) > 18;");
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

