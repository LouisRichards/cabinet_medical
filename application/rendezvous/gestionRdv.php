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
        <a class="nav-link" href="../stats/stats.php">
            <h2>Stats</h2>
        </a>
        <a class="active" href="./gestionRdv.php">
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

    ?>

    <table class="table">
        <tr class="table-header">
            <th>Usager</th>
            <th>Médecin</th>
            <th>Date</th>
            <th>Heure</th>
            <th>Durée</th>
            <th>Modifier</th>
            <th>Supprimer</th>
        </tr>

        <?php

        $requete = 'SELECT u.nom, u.prenom, m.nom, m.prenom, r.date_RV, r.heure_RV, r.duree, r.id_usager, r.id_medecin 
                    FROM rendez_vous r, usager u, medecin m
                    WHERE u.id_usager = r.id_usager
                    AND m.id_medecin = r.id_medecin
                    ORDER BY r.date_RV DESC';


        if (!$resquery = mysqli_query($link, $requete)) {
            die("Error:" . mysqli_errno($link) . ":" . mysqli_error($link));
        } else {
            ///Traitement de la requête
            while ($row = mysqli_fetch_row($resquery)) {

                echo

                "<tr>
        <td>" . $row[0] . " " . $row[1] . "</td>
        <td>" . $row[2] . " " . $row[3] . "</td>
        <td>" . $row[4] . "</td>
        <td>" . $row[5] . "</td>
        <td>" . $row[6] . "</td>
        <td><a href='./modifierRdv.php?id_usager=" . $row[7] . "&id_medecin=" . $row[8] . "&date_RV=" . $row[4] . "&heure_RV=" . $row[5] . "&duree=" . $row[6] . "'>Modifier </a>
        <td><a href='./supprimerRdv.php?id_usager=" . $row[7] . "&id_medecin=" . $row[8] . "&date_RV=" . $row[4] . "&heure_RV=" . $row[5] . "&duree=" . $row[6] . "'>Suprimer </a>
      </tr>";
            }
        }
        ?>
    </table>

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

    $getMedecin = 'SELECT * FROM medecin';

    $getClient = 'SELECT * FROM usager';

    ?>

    <div class="ajouter">
        <div class="ajouter-rdv">
            <h1 class="ajouter-titre">Ajouter une consultations</h1>
            <form class="ajouter-rdv-form" action="./ajoutRdv.php" method="post">
                <label>Client: </label>
                <select class="ajouter-input" name="client" class="ajouter-input">
                    <?php
                    if (!$resquery = mysqli_query($link, $getClient)) {
                        die("Error:" . mysqli_errno($link) . ":" . mysqli_error($link));
                    } else {
                        ///Traitement de la requête
                        while ($row = mysqli_fetch_row($resquery)) {
                            echo
                            "<option value='" . $row[0] . "' selected='selected'>" . $row[3] . " " . $row[4] . "</option>";
                        }
                    }
                    ?>
                </select><br>
                <label>Médecin: </label>
                <select class="ajouter-input" name="medecin" class="ajouter-input">
                    <?php
                    if (!$resquery = mysqli_query($link, $getMedecin)) {
                        die("Error:" . mysqli_errno($link) . ":" . mysqli_error($link));
                    } else {
                        ///Traitement de la requête
                        while ($row = mysqli_fetch_row($resquery)) {
                            echo
                            "<option value='" . $row[0] . "' selected='selected'>" . $row[2] . " " . $row[3] . "</option>";
                        }
                    }
                    ?>
                </select><br>
                <label>Date du rendez-vous: </label>
                <input class="ajouter-input" type="date" name="date-rdv"><br>
                <label>Heure du rendez-vous: </label>
                <input class="ajouter-input" type="time" name="heure-rdv"><br>
                <label>Durée du rendez-vous: </label>
                <?php
                echo '<select class="ajouter-input" name="heure" />';
                for ($i = 0; $i < 25; $i++) {
                    echo '<option value="' . $i . '"> ' . $i . " heure" . '</option>';
                }
                echo '</select><br>';
                foreach (array("min", "sec") as $name) {
                    echo '<label></label><select class="ajouter-input" name="' . $name . '" />';
                    for ($i = 0; $i < 61; $i++) {
                        echo '<option value="' . $i . '"> ' . $i . " " . $name . '</option>';
                    }
                    echo '</select><br>';
                }
                ?>
                <div class="small-button-group">
                    <input class="small-button" type="submit" name="submit" value="Valider">
                    <input class="small-button" type="reset" name="reset" value="Reset">
                </div>
            </form>
        </div>
    </div>

</body>

</html>