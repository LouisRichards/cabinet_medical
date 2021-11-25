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
            <h1>cabinet médical</h1>
        </a>
    </div>
    <div class="nav-menu">
        <a class="nav-link" href="../rendezvous/gestionRdv.php">
            <h2>rendez-vous</h2>
        </a>
        <a class="nav-link" href="../usager/gestionUsager.php">
            <h2>usager</h2>
        </a>
        <a class="nav-link" href="./gestionMedecin.php">
            <h2>médecin</h2>
        </a>
    </div>
</header>

<body>
    <h1>Ajouter un médecin</h1>
    <form action="./ajoutMedecin.php" method="post">
        <label>Civilité: </label>
        <input type="text" name="civilite" placeholder="Monsieur"><br>
        <label>Nom: </label>
        <input type="text" name="nom" placeholder="Dupont"><br>
        <label>Prénom: </label>
        <input type="text" name="prenom" placeholder="Jean"><br>
        <input type="submit" name="submit" value="Valider">
        <input type="reset" name="reset" value="Reset">
    </form>

    <h1>Rechercher un médecin</h1>
    <form action="./rechercherMedecin.php" method="post">
        <label>Nom: </label>
        <input type="text" name="nom" placeholder="Dupont"><br>
        <input type="submit" name="submit" value="Valider">
        <input type="reset" name="reset" value="Reset">
    </form>
</body>

</html>