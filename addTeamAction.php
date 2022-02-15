<?php
// Connexion à la base de données
include("includes/db_connection.php");


// Insertion en bdd d'une nouvelle équipe
$team = htmlspecialchars($_POST['team']);
$request = $db->prepare('INSERT INTO equipe (Nom) VALUES (:Nom)');
$request->bindParam(':Nom', $team);
$request->execute();
echo "L'équipe " . $team . " a bien été ajoutée à la base de données.";
echo '<br>';
echo "<a href='index.php' class='header_h1_link'>Revenir à la page d'accueil</a>";
?>