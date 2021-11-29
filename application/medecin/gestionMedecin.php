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
            <img src="../public/logo.png" />
        </a>
    </div>
    <div class="nav-menu">
        <a class="nav-link" href="../rendezvous/gestionRdv.php">
            <h2>consultations</h2>
        </a>
        <a class="nav-link" href="../usager/gestionUsager.php">
            <h2>usagers</h2>
        </a>
        <a class="nav-link" href="./gestionMedecin.php">
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
        $requete = 'SELECT * FROM medecin WHERE nom = "' . $_POST["nom"] . '"';
    } else {
        $requete = 'SELECT * FROM medecin';
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

    <div class="ajouter">
        <div class="ajouter-medecin">
            <h1 class="ajouter-titre">Ajouter un médecin</h1>
            <form class="ajouter-medecin-form" action="./ajoutMedecin.php" method="post">
                <div>
                    <label>Civilité: </label>
                    <input class="ajouter-input" type="text" name="civilite" placeholder="Monsieur"><br>
                    <label>Nom: </label>
                    <input class="ajouter-input" type="text" name="nom" placeholder="Dupont"><br>
                    <label>Prénom: </label>
                    <input class="ajouter-input" type="text" name="prenom" placeholder="Jean"><br>
                </div>
                <div class="small-button-group">
                    <input class="small-button" type="submit" name="submit" value="Valider">
                    <input class="small-button" type="reset" name="reset" value="Reset">
                </div>
            </form>
        </div>
    </div>

</body>

</html>