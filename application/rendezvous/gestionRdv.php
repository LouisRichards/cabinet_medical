<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestionnaire de rendez-vous</title>
    <link href="../styles.css" rel="stylesheet">
</head>

<header>
    <div class="logo">
        <a class="logo-link" href="../index.php">
            <img src="../public/logo.png" />
        </a>
    </div>
    <div class="nav-menu">
        <a class="nav-link" href="./gestionRdv.php">
            <h2>consultations</h2>
        </a>
        <a class="nav-link" href="../usager/gestionUsager.php">
            <h2>usagers</h2>
        </a>
        <a class="nav-link" href="../medecin/gestionMedecin.php">
            <h2>médecins</h2>
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

    $requete = 'SELECT * FROM rendez_vous';

    ?>

    <table class="table">
        <tr class="table-header">
            <th>Usager</th>
            <th>Médecin</th>
            <th>Date</th>
            <th>Heure</th>
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
        <td>" . $row[4] . "</td>
        <td><a href='./modifierMedecin.php?id=" . $row[0] . "'>Modifier </a>
        <td><a href='./supprimerMedecin.php?id=" . $row[0] . "'>Suprimer </a>
      </tr>";
            }
        }
        ?>
    </table>

    <div class="ajouter">
        <div class="ajouter-rdv">
            <h1 class="ajouter-titre">Ajouter un usager</h1>
            <form class="ajouter-usager-form" action="./ajoutUsager.php" method="post">
                <label>Numero de sécurité: </label>
                <input class="ajouter-input" pattern="[0-9]{15}" type="number" name="num-secu" placeholder="0 11 22 33 444 555 66"><br>
                <label>Civilité: </label>
                <input class="ajouter-input" type="text" name="civilite" placeholder="Monsieur"><br>
                <label>Nom: </label>
                <input class="ajouter-input" type="text" name="nom" placeholder="Dupont"><br>
                <label>Prénom: </label>
                <input class="ajouter-input" type="text" name="prenom" placeholder="Jean"><br>
                <label>Adresse: </label>
                <input class="ajouter-input" type="text" name="adresse" placeholder="123 rue du chemin"><br>
                <label>Ville: </label>
                <input class="ajouter-input" type="text" name="ville" placeholder="Toulouse"><br>
                <label>Code postal: </label>
                <input class="ajouter-input" type="text" name="code_postal" placeholder="31000"><br>
                <label>Date de naissance: </label>
                <input class="ajouter-input" type="date" name="date-naissance"><br>
                <label>Lieu de naissance: </label>
                <input class="ajouter-input" type="text" name="lieu-naissance" placeholder="Toulouse"><br>
                <div class="small-button-group">
                    <input class="small-button" type="submit" name="submit" value="Valider">
                    <input class="small-button" type="reset" name="reset" value="Reset">
                </div>
            </form>
        </div>
    </div>

</body>

</html>