<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jour 2 job 7</title>
</head>

<body>

<?php

$height = 5; // Set the desired height of the triangle

for ($row = 0; $row < $height; $row++) {
    // Print leading spaces
    for ($space = 0; $space < $height - $row - 1; $space++) {
        echo " &nbsp;";
    }
    // Print the left side of the triangle
    echo " /";

    // Print spaces or underscores for the base
    if ($row == $height - 1) {
        for ($col = 0; $col < 2 * $row; $col++) {
            echo "_";
        }
    } else {
        for ($col = 0; $col < 2 * $row; $col++) {
            echo "&nbsp; ";
        }
    }

    // Print the right side of the triangle
    if ($row > -1) {
        echo "\\";
    }
    echo "<br />"; // Move to the next line after each row
}

?>
</body>
</html>