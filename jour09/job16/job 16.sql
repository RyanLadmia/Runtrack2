SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

/* Commandes employée :

SELECT 
    e.nom AS etage_nom,
    s.nom AS "Biggest Room",
    s.capacite
FROM
    Salles s
JOIN
    Etage e ON s.id_etage =e.id
ORDER BY
    s.capacite DESC
Limit 1;
*/