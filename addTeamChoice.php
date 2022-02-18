<?php
include_once('index.php');

$team_form = '
            <input type="text" name="team" class="text_input" placeholder="Nom d\'équipe" maxlength="25" required/>';


// Récupération du nombre de la création d'équipe souhaitée, on adapte l'orthographe et on affiche le nombre d'input demandés
if (isset($_POST['number'])){

    $number = htmlspecialchars($_POST['number']);

    if ($number > 1):
        echo '<h1 class="h1_form">Création de ' . $number . ' nouvelles équipes</h1>';
    else:
        echo '<h1 class="h1_form">Création d\'une nouvelle équipe</h1>';
    endif;

    echo '<div class="form_container">
        <form method="post" action="addTeamAction.php" class="add_form">
        <div class="input_container">';

    $i = 0;
    while ($i < $number):
        echo $team_form;
        $i++;
    endwhile;

    echo '<button type="submit" name="" class="submit_button">Valider</button>
        </div>
        </form>
        </div>';
} else {
    echo '<h1 class="h1_form">Formulaire de création de nouvelle(s) équipe(s)</h1>

    <div class="form_container">
        <form method="post" action="addTeamChoice.php" class="add_form">
            <p class=form_p>Combien d`\'équipe(s) souhaitez-vous créer ?</p>
        <div class="choice_container">
            <input type="number" name="number" class="number_input" min="1" max="16" value="1" required/>
            <button type="submit" name="" class="submit_button">Valider</button>
        </div>
        </form>
    </div>';
}





?>

    
