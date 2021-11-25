<!DOCTYPE HTML>
<html>

<head>
    <title>Modifier contact</title>
</head>

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
    <form method="post" attritbute="post" action="modifierMedecin.php?id='<?php echo $row[0]; ?>'">
        <label>Civilité: </label>
        <input type="text" name="civilite" value="<?php echo $row[1]; ?>"><br>
        <label>Nom: </label>
        <input type="text" name="nom" value="<?php echo $row[2]; ?>"><br>
        <label>Prénom: </label>
        <input type="text" name="prenom" value="<?php echo $row[3]; ?>"><br>
        <input type='submit' name='submit' value='Modifier' />
        <input type='reset' name='reset' value='Reset' />
        <input type="button" onclick="window.location.href = '../index.php'" value="Retour" />
    </form>
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