<?php
    $mysqli = mysqli_connect("localhost", "root", "", "jour09");
    $myresult = mysqli_query($mysqli, "SELECT prenom, nom, naissance FROM etudiants WHERE naissance BETWEEN '1998-01-01' AND '2018-12-31'");
    $row = ($myresult);

    echo
    "<table>
        <thead>
            <tr>
                <th>Prenom</th>
                <th>Nom</th>
                <th>Date de Naissance</th>
            </tr>
        </thead>
        <tbody>";
            foreach($myresult as $user){
                echo "<tr>";
                    echo "<td>".$user['prenom']."</td>";
                    echo "<td>".$user['nom']."</td>";
                    echo "<td>".$user['naissance']."</td>";
                echo "</tr>";
            }
            echo "</tbody>
    </table>";
?>