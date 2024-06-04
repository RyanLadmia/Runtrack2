<?php   
    $mysqli = mysqli_connect("localhost", "root", "", "jour09");
    $myresult = mysqli_query($mysqli, "SELECT SUM(superficie)AS superficie FROM etage");
    $row = mysqli_fetch_assoc($myresult);

    echo
        "<table>
            <thead>
                <tr>
                    <th>Superficie_totale</th>
                </tr>
            </thead>
            <tbody>";
                foreach($myresult as $user){
                    echo "<tr>";
                        echo "<td>".$user['superficie']."</td>";
                    echo "</tr>";
                }
                echo "</tbody>
        </table>";
?>