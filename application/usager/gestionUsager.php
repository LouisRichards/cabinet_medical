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
            <h1>cabinet médical</h1>
        </a>
    </div>
    <div class="nav-menu">
        <a class="nav-link" href="../rendezvous/gestionRdv.php">
            <h2>rendez-vous</h2>
        </a>
        <a class="nav-link" href="./gestionUsager.php">
            <h2>usager</h2>
        </a>
        <a class="nav-link" href="../medecin/gestionMedecin.php">
            <h2>médecin</h2>
        </a>
    </div>
</header>

<body>
    <h1>Ajouter un usager</h1>
    <form action="./ajoutUsager.php" method="post">
        <label>Numero de sécurité: </label>
        <input pattern="[0-9]{15}" type="number" name="num-secu" placeholder="0 11 22 33 444 555 66"><br>
        <label>Civilité: </label>
        <input type="text" name="civilite" placeholder="Monsieur"><br>
        <label>Nom: </label>
        <input type="text" name="nom" placeholder="Dupont"><br>
        <label>Prénom: </label>
        <input type="text" name="prenom" placeholder="Jean"><br>
        <label>Adresse: </label>
        <input type="text" name="adresse" placeholder="123 rue du chemin"><br>
        <label>Date de naissance: </label>
        <input type="date" name="date-naissance"><br>
        <label>Lieu de naissance: </label>
        <input type="text" name="lieu-naissance" placeholder="Toulouse"><br>
        <input type="submit" name="submit" value="Valider">
        <input type="reset" name="reset" value="Reset">
    </form>

    <h1>Rechercher un usager</h1>
    <form action="./rechercherUsager.php" method="post">
        <label>Nom: </label>
        <input type="text" name="nom" placeholder="Dupont"><br>
        <input type="submit" name="submit" value="Valider">
        <input type="reset" name="reset" value="Reset">
    </form>
</body>

</html>