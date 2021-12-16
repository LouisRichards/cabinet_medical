<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accueil</title>
    <link href="styles.css" rel="stylesheet">
</head>

<header>
    <div class="logo">
        <a class="logo-link" href="./index.php">
            <img src="./public/logo.png" />
        </a>
    </div>
    <div class="nav-menu">
        <a class="nav-link" href="./stats/stats.php">
            <h2>Stats</h2>
        </a>
        <a class="nav-link" href="./rendezvous/gestionRdv.php">
            <h2>consultations</h2>
        </a>
        <a class="nav-link" href="./usager/gestionUsager.php">
            <h2>usagers</h2>
        </a>
        <a class="nav-link" href="./medecin/gestionMedecin.php">
            <h2>médecins</h2>
        </a>
    </div>
</header>

<body>
    <h1 class="titre">Bienvenue sur votre gestionnaire de cabinet !</h1>
    <div class="button-menu-group">
        <a class="button-menu-group-link" href="./usager/gestionUsager.php">
            <img class="button-menu-group-image" src="./public/usager-icon.png" alt="icon usager" />
            Usagers
        </a>
        <a class="button-menu-group-link" href="./medecin/gestionMedecin.php">
            <img class="button-menu-group-image" src="./public/medecin-icon.png" alt="icon medecin" />
            Médecins
        </a>
        <a class="button-menu-group-link" href="./rendezvous/gestionRdv.php">
            <img class="button-menu-group-image" src="./public/calendar-icon.png" alt="icon calendrier">
            Consultations
        </a>
        <a class="button-menu-group-link" href="./stats/stats.php">
            <img class="button-menu-group-image" src="./public/stats-icon.png" alt="icon statistiques" />
            Statistiques
        </a>
    </div>
</body>

</html>