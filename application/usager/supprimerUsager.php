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

$requeteDelUsager = 'DELETE FROM usager WHERE id_usager = "' . $_GET['id'] . '"';
$requeteDelRDV = 'DELETE FROM rendez_vous WHERE id_usager = "' . $_GET['id'] . '"';

if (!$resquery = mysqli_query($link, $requeteDelUsager)) {
    die("Error:" . mysqli_errno($link) . ":" . mysqli_error($link));
} else {
    if (!$resquery = mysqli_query($link, $requeteDelRDV)) {
        die("Error:" . mysqli_errno($link) . ":" . mysqli_error($link));
    } else {
        header("Location: ./gestionUsager.php");
        exit();
    }
}
?>


<input type="button" onclick="window.location.href = './gestionUsager.php'" value="Retour" />