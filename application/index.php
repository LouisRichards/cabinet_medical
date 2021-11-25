<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accueil</title>
    <link href="styles.css" rel="stylesheet">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">

    <header>
        <div class="logo">
            <a class="logo-link" href="./index.php">
                <h1>cabinet médical</h1>
            </a>
        </div>
        <div class="nav-menu">
            <a class="nav-link" href="./rendezvous/gestionRdv.php">
                <h2>rendez-vous</h2>
            </a>
            <a class="nav-link" href="./usager/gestionUsager.php">
                <h2>usager</h2>
            </a>
            <a class="nav-link" href="./medecin/gestionMedecin.php">
                <h2>médecin</h2>
            </a>
        </div>
    </header>

<body>
    <div class="ajouter">
        <div class="ajouter-usager">
            <h1 class="ajouter-titre">Ajouter un usager</h1>
            <form class="ajouter-usager-form" action="./usager/ajoutUsager.php" method="post">
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
                <div class="small-button-group">
                    <input class="small-button" type="submit" name="submit" value="Valider">
                    <input class="small-button" type="reset" name="reset" value="Reset">
                </div>
            </form>
        </div>

        <div class="ajouter-medecin">
            <h1 class="ajouter-titre">Ajouter un médecin</h1>
            <form class="ajouter-medecin-form" action="./medecin/ajoutMedecin.php" method="post">
                <div>
                    <label>Civilité: </label>
                    <input type="text" name="civilite" placeholder="Monsieur"><br>
                    <label>Nom: </label>
                    <input type="text" name="nom" placeholder="Dupont"><br>
                    <label>Prénom: </label>
                    <input type="text" name="prenom" placeholder="Jean"><br>
                </div>
                <div class="small-button-group">
                    <input class="small-button" type="submit" name="submit" value="Valider">
                    <input class="small-button" type="reset" name="reset" value="Reset">
                </div>
            </form>
        </div>
    </div>

    <div class="rechercher">
        <div class="rechercher-usager">
            <h3>Rechercher un usager</h3>
            <form action="./usager/rechercherUsager.php" method="post">
                <input type="text" name="nom" placeholder="Nom">
                <button class="search" type="submit">
                    <img class="icon" src="./public/search-icon.png" />
                </button>
            </form>
        </div>
        <div class="rechercher-usager">
            <h3>Recherche un médecin</h3>
            <form action="./medecin/rechercherMedecin.php" method="post">
                <input type="text" name="nom" placeholder="Nom">
                <button class="search" type="submit">
                    <img class="icon" src="./public/search-icon.png" />
                </button>
            </form>
        </div>
    </div>

</body>

</html>