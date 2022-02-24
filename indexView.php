<?php
session_start();
?>

<!doctype html>
<html lang="fr">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>ELO_Ranking</title>
  <meta name="description" content="Le site web ELO_Ranking">
  <meta name="author" content="Clément Deligny">
  <!--<link rel="icon" href="/favicon.ico">
  <link rel="icon" href="/favicon.svg" type="image/svg+xml">-->
  <link rel="stylesheet" href="css/styles.css">
</head>

<body>

    <?php
    include_once('includes/header.php');

    // On affiche le formulaire de connexion, d'inscription ou le menu si l'utilisateur est connecté
    if (!isset($_SESSION['nickname'])) {
      include_once('includes/login.php');
      echo '<p class="not_member_yet">Pas encore membre ?</p>';
      include_once('includes/register.php');
    } else {
      include_once('includes/menu.php');
      echo 'Bienvenue ' . $_SESSION['nickname'];
    }



    ?>


  <!--<script src="js/scripts.js"></script>-->
</body>
</html>