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

<?php
////////// Formulaire de création d'une équipe //////////
$team_form = '
                <input type="text" name="team" class="text_input" placeholder="Nom d\'équipe" maxlength="25" required/>';


// Récupération du nombre de la création d'équipe souhaitée
$number = htmlspecialchars($_POST['number']);


// On adapte l'orthographe
if ($number > 1) {
    echo '<h1 class="h1_form">Création de ' . $number . ' nouvelles équipes</h1>';
}
else {
    echo '<h1 class="h1_form">Création d\'une nouvelle équipe</h1>';
}


// On affiche le nombre d'input demandés
echo '<div class="form_container">
        <form method="post" action="addTeamAction.php" class="add_form">
            <div class="input_container">';

$i = 0;
while ($i < $number) {
    echo $team_form;
    $i++;
}

echo '<input type="submit" value="Valider" class="submit_button" />
</div>
</form>
</div>';

?> 


<!--<script src="js/scripts.js"></script>-->
</body>
</html>