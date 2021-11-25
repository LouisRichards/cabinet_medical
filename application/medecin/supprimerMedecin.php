<?php
$server = "localhost";
$login = "root";
$mdp = "";
$db = "cabine";

$link = mysqli_connect($server, $login, $mdp, $db) or die("Error " . mysqli_error($link));

if ($link->connect_errno) {
    echo "Failed to connect to MySQL: " . $link->connect_error;
    exit();
}

$requete = 'DELETE FROM medecin WHERE id_medecin = "' . $_GET['id'] . '"';

if (!$resquery = mysqli_query($link, $requete)) {
    die("Error:" . mysqli_errno($link) . ":" . mysqli_error($link));
} else {
    echo "Médecin supprimé";
}
?>


<input type="button" onclick="window.location.href = '../index.php'" value="Retour" />