<?php
//Données de connexion à la base de données
$dsn = 'mysql:dbname=elo_ranking;host=localhost:8889';
$user = 'admin';
$password = 'testpassword';


// On essaie de se connecter et si ça ne fonctionne pas, on renvoit un message d'erreur
try {
    $db = new PDO($dsn, $user, $password);
}
catch (Exception $e) {
    die('Erreur : ' . $e->getMessage());
}

