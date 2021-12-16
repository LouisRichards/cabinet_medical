<?php
require("../components/configDB.php");

$nom = $_POST['nom'];

$requete = 'SELECT * FROM usager WHERE nom = "' . $nom . '"';

?>

<table>
  <tr>
    <th>Numéro de sécurité sociale</th>
    <th>Civilité</th>
    <th>Nom</th>
    <th>Prenom</th>
    <th>Adresse</th>
    <th>Date de naissance</th>
    <th>Lieu de naissance</th>
    <th>Modifier</th>
    <th>Supprimer</th>
  </tr>
</table>

<?php

if (!$resquery = mysqli_query($link, $requete)) {
  die("Error:" . mysqli_errno($link) . ":" . mysqli_error($link));
} else {
  ///Traitement de la requête
  while ($row = mysqli_fetch_row($resquery)) {
    echo
    "<table>
      <tr>
        <td>" . $row[1] . "</td>
        <td>" . $row[2] . "</td>
        <td>" . $row[3] . "</td>
        <td>" . $row[4] . "</td>
        <td>" . $row[5] . "</td>
        <td>" . $row[6] . "</td>
        <td>" . $row[7] . "</td>
        <td><a href='./modifierUsager.php?id=" . $row[0] . "'>Modifier </a>
        <td><a href='./supprimerUsager.php?id=" . $row[0] . "'>Suprimer </a>
      </tr>
    </table>
    ";
  }
}
