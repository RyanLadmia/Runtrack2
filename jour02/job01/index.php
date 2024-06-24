<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jour 2 Job 1</title>
</head>

<body>
    <?php
    for ($i=0; $i<=1337; $i++){
        if ($i== 42){
            echo '<b><u>'.$i.'</b></u></br>';
        } else {
            echo $i. '<br/>';
        }
    }
    ?>
    
</body>
</html>