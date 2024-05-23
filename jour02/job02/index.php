<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    $exclusions = [26, 37, 88, 1111, 3233];
        for ($i=0; $i<=1337; $i++){
            if (!in_array($i, $exclusions)) {
                echo $i . '<br />';
        }
        }
    ?>
</body>
</html>