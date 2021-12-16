<?php
require("../components/configDB.php");

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