<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LeetSpeak</title>
</head>
<body>
    <?php
    function leetSpeak($str) {
        // Tableau de correspondance pour les caractères leet speak
        $leet = [
            'A' => '4', 'a' => '4',
            'B' => '8', 'b' => '8',
            'E' => '3', 'e' => '3',
            'G' => '6', 'g' => '6',
            'L' => '1', 'l' => '1',
            'S' => '5', 's' => '5',
            'T' => '7', 't' => '7'
        ];

        // Déclaration de la chaîne convertie
        $leetStr = '';
        $i = 0;

        // Parcourir la chaîne $str caractère par caractère
        while (isset($str[$i])) {
            if (isset($leet[$str[$i]])) {
                $leetStr .= $leet[$str[$i]];
            } else {
                $leetStr .= $str[$i];
            }
            $i++;
        }

        return $leetStr;
    }

    // Exemples d'utilisation de la fonction
    $str = "Les Gars sont forts";
    echo "Original: $str<br>";
    echo "Leet Speak: " . leetSpeak($str) . "<br>";

    $str = "A B C D E F G H I J K L M N O P Q R S T U V W X Y Z";
    echo "Original: $str<br>";
    echo "Leet Speak: " . leetSpeak($str) . "<br>";
    ?>
</body>
</html>
