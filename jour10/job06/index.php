<?php
    $mysqli = mysqli_connect("localhost", "root", "", "jour09");
    $myresult = mysqli_query($mysqli, "SELECT COUNT(*) AS nb_etudiants FROM etudiants");
    $row = mysqli_fetch_assoc($myresult);

    echo
        "<table>
            <thead>
                <tr>
                    <th>Nombre d'étudiants</th>
                </tr>
            </thead>
            <tbody>";
                foreach($myresult as $user){
                    echo "<tr>";
                        echo "<td>".$user['nb_etudiants']."</td>";
                    echo "</tr>";
                }
                echo "</tbody>
        </table>";
?>