<?php
require("../components/configDB.php");

$requete = 'DELETE FROM rendez_vous WHERE id_usager = ' . $_GET['id_usager'] . ' 
AND id_medecin = ' . $_GET['id_medecin'] . '
AND date_RV = "' . $_GET['date_RV'] . '"
AND heure_RV = "' . $_GET['heure_RV'] . '"
AND duree = "' . $_GET['duree'] . '"';

if (!$resquery = mysqli_query($link, $requete)) {
    die("Error:" . mysqli_errno($link) . ":" . mysqli_error($link));
} else {
    trigger_error("Consultation supprimé", E_USER_NOTICE);
    header("Location: ./gestionRdv.php");
    exit();
}
