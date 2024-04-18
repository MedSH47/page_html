<?php
$serveur = "localhost"; // Adresse du serveur MySQL
$utilisateur = "root"; // Nom d'utilisateur MySQL
$motDePasse = ""; // Mot de passe MySQL
$nomBaseDeDonnees = "client"; // Nom de la base de données

// Créer une connexion
$connexion = new mysqli($serveur, $utilisateur, $motDePasse, $nomBaseDeDonnees);
?>