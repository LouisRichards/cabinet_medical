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
            <img src="../public/logo.png" />
        </a>
    </div>
    <div class="nav-menu">
        <a class="nav-link" href="../stats/stats.php">
            <h2>Stats</h2>
        </a>
        <a class="nav-link" href="../rendezvous/gestionRdv.php">
            <h2>consultations</h2>
        </a>
        <a class="nav-link" href="./gestionUsager.php">
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

    if (isset($_POST["nom"])) {
        $requete = 'SELECT * FROM usager WHERE nom = "' . $_POST["nom"] . '"';
    } else {
        $requete = 'SELECT * FROM usager';
    }


    ?>

    <div class="rechercher-large">
        <form action="./gestionUsager.php" method="post">
            <input class="rechercher-large-bar" type="text" name="nom" placeholder="Nom">
            <button class="search-large" type="submit">
                <img class="icon-large" src="../public/search-icon.png" />
            </button>
        </form>
    </div>

    <table class="table">
        <tr class="table-header">
            <th>Numéro de sécurité sociale</th>
            <th>Civilité</th>
            <th>Nom</th>
            <th>Prenom</th>
            <th>Adresse</th>
            <th>Ville</th>
            <th>Code Postal</th>
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
        <td>" . $row[10] . "</td>
        <td>" . $row[9] . "</td>
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

    <div class="ajouter">
        <div class="ajouter-usager">
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
                <label>Médecin: </label>
                <select class="ajouter-input" name="medecin-traitant" class="ajouter-input">
                    <?php
                    if (!$resquery = mysqli_query($link, $requete)) {
                        die("Error:" . mysqli_errno($link) . ":" . mysqli_error($link));
                    } else {
                        ///Traitement de la requête
                        while ($row = mysqli_fetch_row($resquery)) {
                            echo
                            "<option class='ajouter-input' value='" . $row[0] . "' selected='selected'>" . $row[2] . " " . $row[3] . "</option>";
                        }
                    }
                    ?>
                </select>
                <div class="small-button-group">
                    <input class="small-button" type="submit" name="submit" value="Valider">
                    <input class="small-button" type="reset" name="reset" value="Reset">
                </div>
            </form>
        </div>
    </div>


</body>

</html>