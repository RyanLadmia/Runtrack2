<?php
    function gras($str){
        for ($i=0; isset($str[$i]); $i++){
            // Char = Maj ?
            if
        }
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form method="post" action="index.php">
        <label for="str">STR</label>
        <input type="text" id="str" name="str">
            <select name="fontion">
                <option value="selection">Selectionner une option</option>
                <option value="gras">Gras</option>
                <option value="cesar">Cesar</option>
                <option value="plateforme">Plateforme</option>
            </select>
        <input type="submit" value="Valider">
    </form>
</body>
</html>