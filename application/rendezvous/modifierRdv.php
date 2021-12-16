<!DOCTYPE HTML>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier RDV</title>
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
    require("../components/configDB.php");

    $requete = 'SELECT * FROM rendez_vous WHERE id_usager = ' . $_GET['id_usager'] . ' 
                AND id_medecin = ' . $_GET['id_medecin'] . '
                AND date_RV = "' . $_GET['date_RV'] . '"
                AND heure_RV = "' . $_GET['heure_RV'] . '"
                AND duree = "' . $_GET['duree'] . '"';

    $getMedecin = 'SELECT * FROM medecin';

    $getClient = 'SELECT * FROM usager';

    $getMedecinSelect = 'SELECT nom FROM medecin WHERE id_medecin = ' . $_GET['id_medecin'] . '';

    $getUsagerSelect = 'SELECT nom FROM usager WHERE id_usager = ' . $_GET['id_usager'] . '';

    if (!$resquery = mysqli_query($link, $requete)) {
        die("Error:" . mysqli_errno($link) . ":" . mysqli_error($link));
    } else {
        //Traitement de la requete
        $row = mysqli_fetch_row($resquery);
    }
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
                        while ($row_client = mysqli_fetch_row($resquery)) {
                            echo
                            "<option value='" . $row_client[0] . "' selected='selected'>" . $row_client[3] . " " . $row_client[4] . "</option>";
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
                        while ($row_medecin = mysqli_fetch_row($resquery)) {
                            echo
                            "<option value='" . $row_medecin[0] . "' selected='selected'>" . $row_medecin[2] . " " . $row_medecin[3] . "</option>";
                        }
                    }
                    ?>
                </select><br>
                <label>Date du rendez-vous: </label>
                <input class="ajouter-input" type="date" name="date-rdv" value="<?php echo $row[2]; ?>"><br>
                <label>Heure du rendez-vous: </label>
                <input class="ajouter-input" type="time" name="heure-rdv" value="<?php echo $row[3]; ?>"><br>
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