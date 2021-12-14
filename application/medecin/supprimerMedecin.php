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

$requeteDelMedecin = 'DELETE FROM medecin WHERE id_medecin = "' . $_GET['id'] . '"';
$requeteDelRDV = 'DELETE FROM rendez_vous WHERE id_medecin = "' . $_GET['id'] . '"';

if (!$resquery = mysqli_query($link, $requeteDelMedecin)) {
    die("Error:" . mysqli_errno($link) . ":" . mysqli_error($link));
} else {
    if (!$resquery = mysqli_query($link, $requeteDelRDV)) {
        die("Error:" . mysqli_errno($link) . ":" . mysqli_error($link));
    } else {
        header("Location: ./gestionMedecin.php");
        exit();
    }
}
?>


<input type="button" onclick="window.location.href = '../index.php'" value="Retour" />