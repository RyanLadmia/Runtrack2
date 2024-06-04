<?php
    $mysqli= mysqli_connect("localhost", "root", "", "jour09");
    $myresult = mysqli_query($mysqli, "SELECT prenom, nom, naissance FROM etudiants WHERE sexe= 'Femme'");
    $row = mysqli_fetch_assoc($myresult);

    echo
        "<table border=2>
            <thead>
                <tr>
                <th>Prenom</th>
                <th>Nom</th>
                <th>Date de naissance</th>
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