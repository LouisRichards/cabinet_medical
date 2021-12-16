<?php
require("../components/configDB.php");

$nom = $_POST['nom'];

$requete = 'SELECT * FROM medecin WHERE nom = "' . $nom . '"';

?>

<table>
  <tr>
    <th>Civilité</th>
    <th>Nom</th>
    <th>Prenom</th>
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
        <td><a href='./modifierMedecin.php?id=" . $row[0] . "'>Modifier </a>
        <td><a href='./supprimerMedecin.php?id=" . $row[0] . "'>Suprimer </a>
      </tr>
    </table>";
  }
}
