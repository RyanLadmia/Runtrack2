<?php
    $mysqli = mysqli_connect("localhost", "root", "", "jour09");
    $myresult = mysqli_query($mysqli, "SELECT * FROM salles ORDER BY capacite ASC");
    $row = mysqli_fetch_assoc($myresult);

    echo
    "<table>
        <thead>
            <tr>
                <th>Nom</th>
                <th>Id_etage</th>
                <th>Capacite</th>
            </tr>
        </thead>
        <tbody>";
            foreach($myresult as $user){
                echo "<tr>";
                    echo "<td>".$user['nom']."</td>";
                    echo "<td>".$user['id_etage']."</td>";
                    echo "<td>".$user['capacite']."</td>";
                echo "</tr>";
            }
            echo "</tbody>
    </table>";
?>