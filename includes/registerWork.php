<?php
//require_once('db_connection.php');
$db = new PDO('mysql:dbname=elo_ranking;host=localhost:8889', 'admin', 'testpassword');

$sqlQuery = 'INSERT INTO users (login, pass_md5) VALUES (:login, :pass_md5)';
$userRegister = $db->prepare($sqlQuery);

$userRegister->bindParam(':login', $_POST['login']);
$userRegister->bindParam(':pass_md5', $_POST['pass_md5']);
$login = $_POST['login'];
$pass_md5 = $_POST['pass_md5'];

$userRegister->execute();

?>