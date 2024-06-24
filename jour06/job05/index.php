<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jour 6 Job 5</title>
    <?php
        if (isset($_POST['style'])) {
            $selectstyle = $_POST['style'];
            $validstyles = ['style1', 'style2', 'style3'];

            foreach ($validstyles as $style) {
                if ($selectstyle === $style) {
                    echo '<link rel="stylesheet" type="text/css" href="' . $selectstyle . '.css">';
                    break;
                }
            }
        }
    ?>
</head>

<body>
    <form method="POST" action="index.php">
        <label for="style">Choisissez un style :</label>
        <select name="style" id="style">
            <option value="style1">Style 1</option>
            <option value="style2">Style 2</option>
            <option value="style3">Style 3</option>
        </select><br>
        <input class="bouton" type="submit" value="Appliquer le style">
    </form>
</body>
</html>