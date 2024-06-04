<?php
    $mysqli = mysqli_connect("localhost", "root", "", "jour09");
    $myresult = mysqli_query($mysqli, "SELECT nom, capacite FROM salles");
    $row = mysqli_fetch_assoc($myresult);

    echo
        "<table border= 2>
            <thead>
                <tr>
                    <th>Nom</th>
                    <th>Capacite</th>
                </tr>
            </thead>
            <tbody>";
                foreach($myresult as $user){
                    echo"<tr>";
                        echo "<td>".$user['nom']."</td>";
                        echo "<td>".$user['capacite']."</td>";
                    echo"</tr>";
                }
            echo "</tbody>
                </table>";
mysqli_close($mysqli)
?>