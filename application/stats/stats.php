<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Statistiques</title>
    <link href="../styles.css" rel="stylesheet">
</head>

<header>
    <div class="logo">
        <a class="logo-link" href="../index.php">
            <img src="../public/logo.png" />
        </a>
    </div>
    <div class="nav-menu">
        <a class="active" href="../stats/stats.php">
            <h2>Stats</h2>
        </a>
        <a class="nav-link" href="../rendezvous/gestionRdv.php">
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

    $requete = 'SELECT count(*), civilite, FLOOR(DATEDIFF(NOW(), date_naissance)/365) as age from usager 
                group by civilite';

    if (!$resquery = mysqli_query($link, $requete)) {
        die("Error:" . mysqli_errno($link) . ":" . mysqli_error($link));
    } else {
        ///Traitement de la requête
        while ($row = mysqli_fetch_row($resquery)) {
            echo $row[0] . " " . $row[1] . " " . $row[2] . "<br/> ";
        }
    }

    ?>
</body>

</html>