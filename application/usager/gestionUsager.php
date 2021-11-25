<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestionnaire d'usager</title>
    <link href="../styles.css" rel="stylesheet">
</head>

<header>
    <div class="logo">
        <a class="logo-link" href="../index.php">
            <h1>cabinet médical</h1>
        </a>
    </div>
    <div class="nav-menu">
        <a class="nav-link" href="../rendezvous/gestionRdv.php">
            <h2>rendez-vous</h2>
        </a>
        <a class="nav-link" href="./gestionUsager.php">
            <h2>usager</h2>
        </a>
        <a class="nav-link" href="../medecin/gestionMedecin.php">
            <h2>médecin</h2>
        </a>
    </div>
</header>

<body>
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


    $requete = 'SELECT * FROM usager';

    ?>

    <table class="usager-table">
        <tr>
            <th>Numéro de sécurité sociale</th>
            <th>Civilité</th>
            <th>Nom</th>
            <th>Prenom</th>
            <th>Adresse</th>
            <th>Date de naissance</th>
            <th>Lieu de naissance</th>
            <th>Modifier</th>
            <th>Supprimer</th>
        </tr>

        <?php

        if (!$resquery = mysqli_query($link, $requete)) {
            die("Error:" . mysqli_errno($link) . ":" . mysqli_error($link));
        } else {
            ///Traitement de la requête
            while ($row = mysqli_fetch_row($resquery)) {
                echo
                "
      <tr>
        <td>" . $row[1] . "</td>
        <td>" . $row[2] . "</td>
        <td>" . $row[3] . "</td>
        <td>" . $row[4] . "</td>
        <td>" . $row[5] . "</td>
        <td>" . $row[6] . "</td>
        <td>" . $row[7] . "</td>
        <td><a href='./modifierUsager.php?id=" . $row[0] . "'>Modifier </a>
        <td><a href='./supprimerUsager.php?id=" . $row[0] . "'>Suprimer </a>
      </tr>
    ";
            }
        }
        ?>
    </table>
</body>

</html>