<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tableau voyelles/consonnes</title>
</head>
<body>
<?php
    // Variable:
    $str = "On n’est pas le meilleur quand on le croit mais quand on le sait";

    // Dictionnaire
    $dic = [
        "voyelles" => 0,
        "consonnes" => 0
    ];

    // Voyelles
    $voyelles = "aeiouyAEIOUY";

    // Compter les voyelles et consonnes
    for ($i = 0; isset($str[$i]); $i++) {
        $chara = $str[$i];
        
        // Le caractère est une lettre ?
        if (('a' <= $chara && $chara <= 'z') || ('A' <= $chara && $chara <= 'Z') || $chara == 'é' || $chara == 'è' || $chara == 'ê') {
            // Le caractère est une voyelle ?
            $is_vowel = false;
            for ($v = 0; isset($voyelles[$v]); $v++) {
                if ($chara == $voyelles[$v]) {
                    $is_vowel = true;
                    break;
                }
            }
            
            // Compte :
            if ($is_vowel) {
                $dic["voyelles"]++;
            } else {
                $dic["consonnes"]++;
            }
        }
    }
    ?>

    <table>
        <thead>
            <tr>
                <th>Voyelles</th>
                <th>Consonnes</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td><?php echo $dic["voyelles"];?></td>
                <td><?php echo $dic["consonnes"];?></td>
            </tr>
        </tbody>
    </table>


            
    
</body>
</html>