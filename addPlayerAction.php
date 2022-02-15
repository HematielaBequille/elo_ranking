<?php
//echo htmlspecialchars($_POST['nickname']);
//echo strip_tags($_POST['nickname']);
//echo htmlspecialchars($_POST['team']);
//echo htmlspecialchars($_POST['league']);

// Connexion à la base de données
include("includes/db_connection.php");


// Insertion en bdd d'un nouveau joueur
$nickname = htmlspecialchars($_POST['nickname']);
$request = $db->prepare('INSERT INTO joueur (Pseudo) VALUES (:Pseudo)');
$request->bindParam(':Pseudo', $nickname);
$request->execute();
echo "Le joueur " . $nickname . " a bien été ajouté à la base de données.";
echo '<br>';
echo "<a href='index.php' class='header_h1_link'>Revenir à la page d'accueil</a>";
?>

