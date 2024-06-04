<?php
    $mysqli = mysqli_connect("localhost", "root", "", "jour09");
    $myresult = mysqli_query($mysqli, "SELECT salles.id AS salles_id, salles.nom AS salles_nom, salles.id_etage, salles.capacite, etage.id AS etage_id, etage.nom AS etage_nom, etage.numero, etage.superficie FROM salles INNER JOIN etage ON salles.id_etage = etage.id;");
    $row = ($myresult);

    echo
    "<table border=1>
        <thead>
            <tr>
                <th>ID des salles</th>
                <th>Nom des salles</th>
                <th>ID des etages</th>
                <th>Capacite</th>
                <th>ID des etages</th>
                <th>Nom des etages</th>
                <th>Numero de l'etage</th>
                <th>Superficie</th>
            </tr>
        </thead>
        <tbody>";
            foreach($myresult as $user){
                echo "<tr>";
                    echo "<td>".$user['salles_id']."</td>";
                    echo "<td>".$user['salles_nom']."</td>";
                    echo "<td>".$user['id_etage']."</td>";
                    echo "<td>".$user['capacite']."</td>";
                    echo "<td>".$user['etage_id']."</td>";
                    echo "<td>".$user['etage_nom']."</td>";
                    echo "<td>".$user['numero']."</td>";
                    echo "<td>".$user['superficie']."</td>";
                echo "</tr>";
            }
            echo "</tbody>
    </table>";


?>
