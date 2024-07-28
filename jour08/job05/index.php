<?php
session_start();

// Initialiser la grille et le joueur courant si nécessaire
if (!isset($_SESSION['grid'])) {
    $_SESSION['grid'] = array_fill(0, 3, array_fill(0, 3, '-'));
    $_SESSION['currentPlayer'] = 'X';
}

// Réinitialiser la partie
if (isset($_POST['reset'])) {
    $_SESSION['grid'] = array_fill(0, 3, array_fill(0, 3, '-'));
    $_SESSION['currentPlayer'] = 'X';
    $_SESSION['message'] = '';
}

// Gérer les clics sur la grille
if (isset($_POST['move'])) {
    $position = $_POST['move'];
    $row = $position[0];
    $col = $position[1];
    
    if ($_SESSION['grid'][$row][$col] == '-') {
        $_SESSION['grid'][$row][$col] = $_SESSION['currentPlayer'];
        if (checkWin($_SESSION['grid'], $_SESSION['currentPlayer'])) {
            $_SESSION['message'] = $_SESSION['currentPlayer'] . " a gagné !";
            $_SESSION['grid'] = array_fill(0, 3, array_fill(0, 3, '-'));
        } elseif (isDraw($_SESSION['grid'])) {
            $_SESSION['message'] = "Match nul !";
            $_SESSION['grid'] = array_fill(0, 3, array_fill(0, 3, '-'));
        } else {
            $_SESSION['currentPlayer'] = ($_SESSION['currentPlayer'] == 'X') ? 'O' : 'X';
        }
    }
}

// Vérifier les conditions de victoire
function checkWin($grid, $player) {
    for ($i = 0; $i < 3; $i++) {
        if ($grid[$i][0] == $player && $grid[$i][1] == $player && $grid[$i][2] == $player) {
            return true;
        }
        if ($grid[0][$i] == $player && $grid[1][$i] == $player && $grid[2][$i] == $player) {
            return true;
        }
    }
    if ($grid[0][0] == $player && $grid[1][1] == $player && $grid[2][2] == $player) {
        return true;
    }
    if ($grid[0][2] == $player && $grid[1][1] == $player && $grid[2][0] == $player) {
        return true;
    }
    return false;
}

// Vérifier le match nul
function isDraw($grid) {
    for ($i = 0; $i < 3; $i++) {
        for ($j = 0; $j < 3; $j++) {
            if ($grid[$i][$j] == '-') {
                return false;
            }
        }
    }
    return true;
}
?>

<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="morpion.css">
    <title>Jeu du Morpion</title>
</head>
<body>
    <h1>Jeu du Morpion</h1>
    <?php
    if (isset($_SESSION['message']) && $_SESSION['message'] != '') {
        echo "<p>" . $_SESSION['message'] . "</p>";
        $_SESSION['message'] = '';
    }
    ?>
    <form method="post">
        <table>
            <?php
            for ($i = 0; $i < 3; $i++) {
                echo "<tr>";
                for ($j = 0; $j < 3; $j++) {
                    echo "<td>";
                    if ($_SESSION['grid'][$i][$j] == '-') {
                        echo '<button type="submit" name="move" value="' . $i . $j . '">-</button>';
                    } else {
                        $class = $_SESSION['grid'][$i][$j] == 'X' ? 'x' : 'o';
                        echo '<span class="' . $class . '">' . $_SESSION['grid'][$i][$j] . '</span>';
                    }
                    echo "</td>";
                }
                echo "</tr>";
            }
            ?>
        </table>
        <button type="submit" name="reset" class="reset-button">Réinitialiser la partie</button>
    </form>
</body>
</html>
