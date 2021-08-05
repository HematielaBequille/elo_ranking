<?php
//Connexion à la base de données
$dsn = 'mysql:dbname=elo_ranking;host=localhost';
$user = "root";
$password = 'root';

$db = new PDO($dsn, $user, $password);
?>