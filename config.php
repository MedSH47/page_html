<?php
include('connexion.php');

// Vérifier la connexion
if ($connexion->connect_error) {
    die("Échec de la connexion : " . $connexion->connect_error);
}

// Récupérer les donné?, ?, ?,?es du formulaire
$nom = $_POST['nom'];
$prenom = $_POST['prenom'];
$email = $_POST['email'];
$pswd = $_POST['pswd'];

// Préparer la requête SQL
$requete = $connexion->prepare("INSERT INTO client (nom, prenom, email,password) VALUES (?,?,?,?)");

// Binder les paramètres
$requete->bind_param("ssss", $nom, $prenom, $email,$pswd );

// Exécuter la requête
$requete->execute();
// Fermer la connexion
header("Location: login.html");
$requete->close();
$connexion->close();


?>


