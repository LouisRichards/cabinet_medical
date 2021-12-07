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

$client = $_POST['client'];
$medecin = $_POST['medecin'];
$date = $_POST['date-rdv'];
$heure = $_POST['heure-rdv'];

$duree_h = strlen($_POST['heure']) < 2 ? "0" . $_POST['heure'] : $_POST['heure'];
$duree_m = strlen($_POST['min']) < 2 ? "0" . $_POST['min'] : $_POST['min'];
$duree_s = strlen($_POST['sec']) < 2 ? "0" . $_POST['sec'] : $_POST['sec'];

$duree = $duree_h . $duree_m . $duree_s;

$requete = 'INSERT INTO rendez_vous (id_usager, id_medecin, date_RV, heure_RV, duree)
            VALUES ("' . $client . '",
                    "' . $medecin . '",
                    "' . $date . '",
                    "' . $heure . '",
                    "' . $duree . '" 
                );';

if (!$resquery = mysqli_query($link, $requete)) {
    die("Error:" . mysqli_errno($link) . ":" . mysqli_error($link));
} else {
    ///Traitement de la requête
    header("Location: ./gestionRdv.php");
    exit();
}
