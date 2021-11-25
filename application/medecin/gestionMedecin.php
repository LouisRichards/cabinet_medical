<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestionnaire de médecin</title>
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
        <a class="nav-link" href="../usager/gestionUsager.php">
            <h2>usager</h2>
        </a>
        <a class="nav-link" href="./gestionMedecin.php">
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

    $requete = 'SELECT * FROM medecin';

    ?>

    <table class="medecins-table">
        <tr>
            <th>Civilité</th>
            <th>Nom</th>
            <th>Prenom</th>
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

                "<tr>
        <td>" . $row[1] . "</td>
        <td>" . $row[2] . "</td>
        <td>" . $row[3] . "</td>
        <td><a href='./modifierMedecin.php?id=" . $row[0] . "'>Modifier </a>
        <td><a href='./supprimerMedecin.php?id=" . $row[0] . "'>Suprimer </a>
      </tr>";
            }
        }
        ?>
    </table>
</body>

</html>