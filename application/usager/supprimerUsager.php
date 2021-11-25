<?php
$server = "localhost";
$login = "root";
$mdp = "";
$db = "cabinet";

$link = mysqli_connect($server, $login, $mdp, $db) or die("Error " . mysqli_error($link));

if ($link->connect_errno) {
    echo "Failed to connect to MySQL: " . $link->connect_error;
    exit();
}

$requete = 'DELETE FROM usager WHERE id_usager = "' . $_GET['id'] . '"';

if (!$resquery = mysqli_query($link, $requete)) {
    die("Error:" . mysqli_errno($link) . ":" . mysqli_error($link));
} else {
    echo "Usager supprimé";
}
?>


<input type="button" onclick="window.location.href = './gestionUsager.php'" value="Retour" />