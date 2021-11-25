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

    $requete = 'SELECT * FROM usager 
                WHERE id_usager = ' . $id . '';

    if (!$resquery = mysqli_query($link, $requete)) {
        die("Error:" . mysqli_errno($link) . ":" . mysqli_error($link));
    } else {
        //Traitement de la requete
        $row = mysqli_fetch_row($resquery);
    }
    ?>
    <form method="post" attritbute="post" action="modifierUsager.php?id='<?php echo $row[0]; ?>'">
        <label>Numero de sécurité: </label>
        <input type="tel" name="num-secu" value="<?php echo $row[1]; ?>"><br>
        <label>Civilité: </label>
        <input type="text" name="civilite" value="<?php echo $row[2]; ?>"><br>
        <label>Nom: </label>
        <input type="text" name="nom" value="<?php echo $row[3]; ?>"><br>
        <label>Prénom: </label>
        <input type="text" name="prenom" value="<?php echo $row[4]; ?>"><br>
        <label>Adresse: </label>
        <input type="text" name="adresse" value="<?php echo $row[5]; ?>"><br>
        <label>Date de naissance: </label>
        <input type="date" name="date-naissance" value="<?php echo $row[6]; ?>"><br>
        <label>Lieu de naissance: </label>
        <input type="text" name="lieu-naissance" value="<?php echo $row[7]; ?>"><br>
        <input type='submit' name='submit' value='Modifier' />
        <input type='reset' name='reset' value='Reset' />
        <input type="button" onclick="window.location.href = './gestionUsager.php'" value="Retour" />
    </form>
    <?php

    $num_secu = isset($_POST['num-secu']) ? $_POST['num-secu'] : $row[1];
    $civilite = isset($_POST['civilite']) ? $_POST['civilite'] : $row[2];
    $nom = isset($_POST['nom']) ? $_POST['nom'] : $row[3];
    $prenom = isset($_POST['prenom']) ? $_POST['prenom'] : $row[4];
    $adresse = isset($_POST['adresse']) ? $_POST['adresse'] : $row[5];
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
    lieu_naissance = "' . $lieu_naissance . '"
    WHERE id_usager = ' . $id . '';

    if (!$resquery = mysqli_query($link, $requete_modif)) {
        die("Error:" . mysqli_errno($link) . ":" . mysqli_error($link));
    }
    ?>
</body>

</html>