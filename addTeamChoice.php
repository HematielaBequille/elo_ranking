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

    <h1 class="h1_form">Création de nouvelle(s) équipe(s)</h1>

    <div class="form_container">
        <form method="post" action="addTeam.php" class="add_form">
            <p class=form_p>Combien d'équipe(s) souhaitez-vous créer ?</p>
        <div class="choice_container">
            <input type="number" name="number" class="number_input" min="1" max="16" value="1" required/>
            <input type="submit" value="Valider" class="submit_button" />
        </div>
        </form>
    </div>

    

    <!--<script src="js/scripts.js"></script>-->
</body>
</html>