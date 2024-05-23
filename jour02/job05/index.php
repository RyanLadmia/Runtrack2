<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
        function estPremier($nombre) {
            if ($nombre <= 1) {
                return false;
            }
            for ($i = 2; $i <= sqrt($nombre); $i++) {
                if ($nombre % $i == 0) {
                    return false;
                }
            }
            return true;
        }

        for ($i = 2; $i <= 1000; $i++) {
            if (estPremier($i)) {
                echo $i . "<br />";
            }
        }


    ?>
</body>
</html>