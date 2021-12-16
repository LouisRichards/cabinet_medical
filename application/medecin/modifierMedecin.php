<!DOCTYPE HTML>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier Médecin</title>
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

    $id = $_GET['id'];

    $requete = 'SELECT * FROM medecin
                WHERE id_medecin = ' . $id . '';

    if (!$resquery = mysqli_query($link, $requete)) {
        die("Error:" . mysqli_errno($link) . ":" . mysqli_error($link));
    } else {
        //Traitement de la requete
        $row = mysqli_fetch_row($resquery);
    }
    ?>
    <div class="ajouter">
        <div class="ajouter-medecin">
            <h1 class="ajouter-titre">Modifier médecin</h1>
            <form method="post" attritbute="post" action="modifierMedecin.php?id='<?php echo $row[0]; ?>'">
                <label>Civilité: </label>
                <input class="ajouter-input" type="text" name="civilite" value="<?php echo $row[1]; ?>"><br>
                <label>Nom: </label>
                <input class="ajouter-input" type="text" name="nom" value="<?php echo $row[2]; ?>"><br>
                <label>Prénom: </label>
                <input class="ajouter-input" type="text" name="prenom" value="<?php echo $row[3]; ?>"><br>
                <div class="small-button-group">
                    <input class="small-button" type='submit' name='submit' value='Modifier' />
                    <input class="small-button" type='reset' name='reset' value='Reset' />
                    <input class="small-button" type="button" onclick="window.location.href = '../index.php'" value="Retour" />
                </div>
            </form>
        </div>
    </div>

    <?php

    $civilite = isset($_POST['civilite']) ? $_POST['civilite'] : $row[1];
    $nom = isset($_POST['nom']) ? $_POST['nom'] : $row[2];
    $prenom = isset($_POST['prenom']) ? $_POST['prenom'] : $row[3];

    $id = $_GET['id'];

    $requete_modif = 'UPDATE medecin 
    SET civilite = "' . $civilite . '",
    nom = "' . $nom . '", 
    prenom="' . $prenom . '"
    WHERE id_medecin = ' . $id . '';

    if (!$resquery = mysqli_query($link, $requete_modif)) {
        die("Error:" . mysqli_errno($link) . ":" . mysqli_error($link));
    }
    ?>
</body>

</html>