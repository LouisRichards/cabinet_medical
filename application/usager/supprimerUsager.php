<?php
require("../components/configDB.php");

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