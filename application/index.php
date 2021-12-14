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
        <a class="nav-link" href="../stats/stats.php">
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
    <div class="ajouter">
        <a class="ajouter-usager-link" href="./usager/gestionUsager.php">
            <h1>Ajouter un usager</h1>
            <img class="icon-large" src="./public/add-icon.png" />
        </a>
        <a class="ajouter-medecin-link" href="./medecin/gestionMedecin.php">
            <h1>Ajouter un médecin</h1>
            <img class="icon-large" src="./public/add-icon.png" />
        </a>
    </div>

    <div class="rechercher">
        <div class="rechercher-usager">
            <h3>Rechercher un usager</h3>
            <form action="./usager/rechercherUsager.php" method="post">
                <input type="text" name="nom" placeholder="Nom">
                <button class="search-ajouter" type="submit">
                    <img class="icon-search-ajouter" src="./public/search-icon.png" />
                </button>
            </form>
        </div>
        <div class="rechercher-usager">
            <h3>Recherche un médecin</h3>
            <form action="./medecin/rechercherMedecin.php" method="post">
                <input type="text" name="nom" placeholder="Nom">
                <button class="search-ajouter" type="submit">
                    <img class="icon-search-ajouter" src="./public/search-icon.png" />
                </button>
            </form>
        </div>
    </div>

</body>

</html>