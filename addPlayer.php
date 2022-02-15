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


    <div class="form_container">
        <form method="post" action="addPlayerAction.php" class="add_form">
            <p class="form_p">Création d'un nouveau joueur</p>
            <div class="input_container">
                <input type="text" name="nickname" class="text_input" />
                <input type="submit" value="Valider" class="submit_button" />
            </div>
        </form>
    </div>

    <!--<script src="js/scripts.js"></script>-->
</body>
</html>