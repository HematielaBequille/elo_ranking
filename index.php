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
    include("includes/header.php");
    ?>    
    
    <h2>Bienvenue sur la plateforme ELO Ranking</h2>

    <?php
    include("includes/db_connection.php");

    // requête préparée
    $request = $db->prepare("INSERT INTO joueur (Pseudo) VALUES (:Pseudo)");
    $request->bindParam(':Pseudo', $pseudo);

    $pseudo = '';
    $request->execute();

    ?>



  <!--<script src="js/scripts.js"></script>-->
</body>
</html>
