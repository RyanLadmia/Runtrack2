<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="index.css">
    <title>Jour 1 Job 3</title>
</head>

<body>
    <p>Teste 1er tableau, uniquement php</p>
        <?php
            $NbrCol = 9;
            $NbrLigne = 9;
            echo '<table>';
                for ($i=1; $i<=$NbrLigne; $i++) {
            echo '<tr>';
                for ($j=1; $j<=$NbrCol; $j++) {
            echo '<td>';
            echo 'ligne'. $i. 'colonne'. $j;
            echo '<td>';
             }
             echo '</tr>';       
            }
        ?>

<!--Autre tableau-->

    <?php
        $data = [
            ['Nom' => 'Ryan', 'Age' => 27, 'Ville' => 'Marseille'],
            ['Nom' => 'Jean', 'Age' => 34, 'Ville' => 'Paris'],
            ['Nom'=> 'Adrien', 'Age' => 19, 'Ville' => 'Lyon'],
         ];
    ?>


    <table>
    <br><br><br><p>Test tableau html + php</p>
        <thead>
            <tr>
                <th>Nom</th>
                <th>Age</th>
                <th>Ville</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($data as $row): ?>
                <tr>
                    <td><?php echo htmlspecialchars($row['Nom']); ?></td>
                    <td><?php echo htmlspecialchars($row['Age']); ?></td>
                    <td><?php echo htmlspecialchars($row['Ville']); ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>