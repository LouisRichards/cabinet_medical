<!DOCTYPE HTML>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier Usager</title>
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

    $requete = 'SELECT * FROM usager 
                WHERE id_usager = ' . $id . '';

    if (!$resquery = mysqli_query($link, $requete)) {
        die("Error:" . mysqli_errno($link) . ":" . mysqli_error($link));
    } else {
        //Traitement de la requete
        $row = mysqli_fetch_row($resquery);
    }
    ?>

    <div class="ajouter">
        <div class="ajouter-usager">
            <h1 class="ajouter-titre">Modifier un usager</h1>
            <form class="ajouter-usager-form" method="post" attritbute="post" action="modifierUsager.php?id='<?php echo $row[0]; ?>'">
                <label>Numero de sécurité: </label>
                <input class="ajouter-input" type="number" name="num-secu" value="<?php echo $row[1]; ?>"><br>
                <label>Civilité: </label>
                <input class="ajouter-input" type="text" name="civilite" value="<?php echo $row[2]; ?>"><br>
                <label>Nom: </label>
                <input class="ajouter-input" type="text" name="nom" value="<?php echo $row[3]; ?>"><br>
                <label>Prénom: </label>
                <input class="ajouter-input" type="text" name="prenom" value="<?php echo $row[4]; ?>"><br>
                <label>Adresse: </label>
                <input class="ajouter-input" type="text" name="adresse" value="<?php echo $row[5]; ?>"><br>
                <label>Ville: </label>
                <input class="ajouter-input" type="text" name="ville" value="<?php echo $row[10]; ?>"><br>
                <label>Code postal: </label>
                <input class="ajouter-input" type="text" name="code_postal" value="<?php echo $row[9]; ?>"><br>
                <label>Date de naissance: </label>
                <input class="ajouter-input" type="date" name="date-naissance" value="<?php echo $row[6]; ?>"><br>
                <label>Lieu de naissance: </label>
                <input class="ajouter-input" type="text" name="lieu-naissance" value="<?php echo $row[7]; ?>"><br>
                <div class="small-button-group">
                    <input class="small-button" type='submit' name='submit' value='Modifier' />
                    <input class="small-button" type='reset' name='reset' value='Reset' />
                    <input class="small-button" type="button" onclick="window.location.href = './gestionUsager.php'" value="Retour" />
                </div>
            </form>
        </div>
    </div>

    <?php

    $num_secu = isset($_POST['num-secu']) ? $_POST['num-secu'] : $row[1];
    $civilite = isset($_POST['civilite']) ? $_POST['civilite'] : $row[2];
    $nom = isset($_POST['nom']) ? $_POST['nom'] : $row[3];
    $prenom = isset($_POST['prenom']) ? $_POST['prenom'] : $row[4];
    $adresse = isset($_POST['adresse']) ? $_POST['adresse'] : $row[5];
    $ville = isset($_POST['ville']) ? $_POST['ville'] : $row[10];
    $code_postal = isset($_POST['code_postal']) ? $_POST['code_postal'] : $row[9];
    $date_naissance = isset($_POST['date-naissance']) ? $_POST['date-naissance'] : $row[6];
    $lieu_naissance = isset($_POST['lieu-naissance']) ? $_POST['lieu-naissance'] : $row[7];

    $id = $_GET['id'];

    $requete_modif = 'UPDATE usager 
    SET num_secu = "' . $num_secu . '",
    civilite = "' . $civilite . '",
    nom = "' . $nom . '", 
    prenom="' . $prenom . '", 
    adresse="' . $adresse . '", 
    date_naissance = "' . $date_naissance . '",
    lieu_naissance = "' . $lieu_naissance . '",
    ville = "' . $ville . '",
    code_postal = "' . $code_postal . '"
    WHERE id_usager = ' . $id . '';

    if (!$resquery = mysqli_query($link, $requete_modif)) {
        die("Error:" . mysqli_errno($link) . ":" . mysqli_error($link));
    }
    ?>
</body>

</html>