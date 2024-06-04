<?php
    $mysqli = mysqli_connect("localhost", "root", "", "jour09");
    $myresult = mysqli_query($mysqli, "SELECT SUM(capacite) AS capacite FROM salles");
    $row = ($myresult);

    echo
        "<table>
            <thead>
                <tr>
                    <th>capacite_totale</th>
                </tr>
            </thead>
            <tbody>";
                foreach($myresult as $user){
                    echo "<tr>";
                        echo "<td>".$user['capacite']."</td>";
                    echo "</tr>";
                }
                echo "</tbody>
        </table>";
?>
