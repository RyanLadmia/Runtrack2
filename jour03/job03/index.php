<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jour 3 Job 3</title>
</head>
<body>
    <?php
    
    $str = "I'm sorry Dave I'm afraid I can't do that";

    for ($i = 0; isset($str[$i]); $i++) {
            $chara = $str[$i];

            if($chara=='a' ||$chara=='A'||$chara=='e'||$chara=='E'||$chara=='i'||$chara=='I'||$chara=='o'||$chara=='O'||$chara=='u'||$chara=='U'||$chara== 'y'||$chara=='Y')
                echo $chara;
        }
      
    ?>    


</body>
</html>