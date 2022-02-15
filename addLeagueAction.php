<?php
// Connexion à la base de données
include("includes/db_connection.php");


// Insertion en bdd d'une nouvelle ligue
$name = htmlspecialchars($_POST['league']);
$request = $db->prepare('INSERT INTO ligue (Nom) VALUES (:Nom)');
$request->bindParam(':Nom', $name);
$request->execute();
echo "La ligue " . $name . " a bien été ajoutée à la base de données.";
echo '<br>';
echo "<a href='index.php' class='header_h1_link'>Revenir à la page d'accueil</a>";
?>