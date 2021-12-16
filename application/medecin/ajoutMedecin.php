<?php
require("../components/configDB.php");

$civilite = $_POST['civilite'];
$nom = $_POST['nom'];
$prenom = $_POST['prenom'];

$requete = 'INSERT INTO medecin (civilite, nom, prenom)
            VALUES ("' . $civilite . '",
                    "' . $nom . '",
                    "' . $prenom . '"
                );';

if (!$resquery = mysqli_query($link, $requete)) {
    die("Error:" . mysqli_errno($link) . ":" . mysqli_error($link));
} else {
    ///Traitement de la requête
    header("Location: ../index.php");
    exit();
}
?>

<input type="button" onclick="window.location.href = './gestionMedecin.php'" value="Retour" />