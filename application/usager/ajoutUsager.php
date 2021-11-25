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

$num_secu = $_POST['num-secu'];
$civilite = $_POST['civilite'];
$nom = $_POST['nom'];
$prenom = $_POST['prenom'];
$adresse = $_POST['adresse'];
$date_naissance = $_POST['date-naissance'];
$lieu_naissance = $_POST['lieu-naissance'];

$requete = 'INSERT INTO Usager (num_secu, civilite, nom, prenom, adresse, date_naissance, lieu_naissance)
            VALUES ("' . $num_secu . '",
                    "' . $civilite . '",
                    "' . $nom . '",
                    "' . $prenom . '",
                    "' . $adresse . '", 
                    "' . $date_naissance . '",
                    "' . $lieu_naissance . '"
                );';

if (!$resquery = mysqli_query($link, $requete)) {
    die("Error:" . mysqli_errno($link) . ":" . mysqli_error($link));
} else {
    ///Traitement de la requête
    header("Location: ../index.php");
    exit();
}
?>

<input type="button" onclick="window.location.href = './gestionUsager.php'" value="Retour" />