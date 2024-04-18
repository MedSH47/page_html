<?php
include('connexion.php');

// Vérifier la connexion
if ($connexion->connect_error) {
    die("Échec de la connexion : " . $connexion->connect_error);
}

// Requête de sélection pour récupérer toutes les données
$sql_select_all = "SELECT * FROM client";
$resultat = $connexion->query($sql_select_all);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="result.css">
    <title>Afficher Toutes les Données</title>
</head>
<body>

<h2>Toutes les données de la base de données :</h2>

<?php
// Vérifier s'il y a des données à afficher
if ($resultat->num_rows > 0) {
    echo "<table border='1'>";
    echo "<th>Nom</th><th>Prénom</th><th>Email</th></tr>";

    // Afficher les données dans un tableau
    while ($row = $resultat->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row["nom"] . "</td>";
        echo "<td>" . $row["prenom"] . "</td>";
        echo "<td>" . $row["email"] . "</td>";
        echo "</tr>";
    }

    echo "</table>";
} else {
    echo "Aucune donnée à afficher.";
}

// Fermer la connexion
$connexion->close();
?>

