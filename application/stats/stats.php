<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Statistiques</title>
    <link href="../styles.css" rel="stylesheet">
</head>

<?php include("../components/header.php"); ?>

<body>
    <?php
    require("../components/configDB.php");

    $moins25Madame = 'SELECT count(*) from usager 
                WHERE civilite = "Madame"
                AND FLOOR(DATEDIFF(NOW(), date_naissance)/365) < 25';

    if (!$resquery = mysqli_query($link, $moins25Madame)) {
        die("Error:" . mysqli_errno($link) . ":" . mysqli_error($link));
    } else {
        ///Traitement de la requête
        while ($row = mysqli_fetch_row($resquery)) {
            $nbMadame25 = $row[0];
        }
    }

    $entre25_50Madame = 'SELECT count(*) from usager 
                WHERE civilite = "Madame"
                AND FLOOR(DATEDIFF(NOW(), date_naissance)/365) BETWEEN 25 AND 50';

    if (!$resquery = mysqli_query($link, $entre25_50Madame)) {
        die("Error:" . mysqli_errno($link) . ":" . mysqli_error($link));
    } else {
        ///Traitement de la requête
        while ($row = mysqli_fetch_row($resquery)) {
            $nbMadame25_50 = $row[0];
        }
    }

    $plus50Madame = 'SELECT count(*) from usager 
                WHERE civilite = "Madame"
                AND FLOOR(DATEDIFF(NOW(), date_naissance)/365) > 50';

    if (!$resquery = mysqli_query($link, $plus50Madame)) {
        die("Error:" . mysqli_errno($link) . ":" . mysqli_error($link));
    } else {
        ///Traitement de la requête
        while ($row = mysqli_fetch_row($resquery)) {
            $nbMadame50 = $row[0];
        }
    }

    $moins25Monsieur = 'SELECT count(*) from usager 
                WHERE civilite = "Monsieur"
                AND FLOOR(DATEDIFF(NOW(), date_naissance)/365) < 25';

    if (!$resquery = mysqli_query($link, $moins25Monsieur)) {
        die("Error:" . mysqli_errno($link) . ":" . mysqli_error($link));
    } else {
        ///Traitement de la requête
        while ($row = mysqli_fetch_row($resquery)) {
            $nbMonsieur25 = $row[0];
        }
    }

    $entre25_50Monsieur = 'SELECT count(*) from usager 
                WHERE civilite = "Monsieur"
                AND FLOOR(DATEDIFF(NOW(), date_naissance)/365) BETWEEN 25 AND 50';

    if (!$resquery = mysqli_query($link, $entre25_50Monsieur)) {
        die("Error:" . mysqli_errno($link) . ":" . mysqli_error($link));
    } else {
        ///Traitement de la requête
        while ($row = mysqli_fetch_row($resquery)) {
            $nbMonsieur25_50 = $row[0];
        }
    }

    $plus50Monsieur = 'SELECT count(*) from usager 
                WHERE civilite = "Monsieur"
                AND FLOOR(DATEDIFF(NOW(), date_naissance)/365) > 50';

    if (!$resquery = mysqli_query($link, $plus50Monsieur)) {
        die("Error:" . mysqli_errno($link) . ":" . mysqli_error($link));
    } else {
        ///Traitement de la requête
        while ($row = mysqli_fetch_row($resquery)) {
            $nbMonsieur50 = $row[0];
        }
    }

    ?>

    <table class="table">
        <tr class="table-header">
            <th>Tranche d'âge</th>
            <th>Nombre d'homme</th>
            <th>Nombre de femme</th>
        </tr>
        <tr>
            <th>Moins de 25 ans</th>
            <td><?php echo $nbMonsieur25; ?></td>
            <td><?php echo $nbMadame25; ?></td>
        </tr>
        <tr>
            <th>Entre 25 et 50 ans</th>
            <td><?php echo $nbMonsieur25_50; ?></td>
            <td><?php echo $nbMadame25_50; ?></td>
        </tr>
        <tr>
            <th>Plus de 50 ans</th>
            <td><?php echo $nbMonsieur50; ?></td>
            <td><?php echo $nbMadame50; ?></td>
        </tr>
    </table>

    <?php
    $medecinHeure = 'SELECT SUM(rdv.duree), m.nom, m.prenom FROM rendez_vous rdv, medecin m
                        WHERE rdv.id_medecin = m.id_medecin
                        AND rdv.date_RV < NOW()
                        GROUP BY m.nom';
    ?>

    <table class="table">
        <tr class="table-header">
            <th>Médecin</th>
            <th>Nombre d'heures effectuées</th>
        </tr>

        <?php
        if (!$resquery = mysqli_query($link, $medecinHeure)) {
            die("Error:" . mysqli_errno($link) . ":" . mysqli_error($link));
        } else {
            ///Traitement de la requête
            while ($row = mysqli_fetch_row($resquery)) {

                $duree = $row[0];

                while (strlen($duree) < 6) {
                    $duree = "0" . $duree;
                }
                $heure = substr($duree, 0, 2);
                $minute = substr($duree, 2, 2);
                $seconde = substr($duree, 4, 2);

                echo "
                <tr>
                    <td> " . $row[1] . " " . $row[2] . "</td>
                    <td> " . $heure . "h " . $minute . "min " . $seconde . "sec" . "</td>
                </tr>
                ";
            }
        }
        ?>

</body>

</html>