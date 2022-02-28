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
        <form method="post" action="addTeam.php" class="add_form">
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
        <form method="post" action="addTeam.php" class="add_form">
            <p class=form_p>Combien d`\'équipe(s) souhaitez-vous créer ?</p>
        <div class="choice_container">
            <input type="number" name="number" class="number_input" min="1" max="16" value="1" required/>
            <button type="submit" name="" class="submit_button">Valider</button>
        </div>
        </form>
    </div>';
}


// On récupère le champ rempli, on lui enlève les balises HTML & PHP puis on convertit la première lettre du nom d'équipe en majuscule, le reste en miniscule et on vérifie qu'il n'existe pas déjà en BDD puis on l'insert.
if (isset($_POST['team'])):

    require_once('includes/db_connection.php');
    $team = strip_tags($_POST['team']);
    $team = mb_convert_case($team, MB_CASE_TITLE, "UTF-8");

    $sqlQuery = $db->prepare("SELECT team_name FROM teams WHERE team_name='".$_POST['team']."'");
    $sqlQuery->execute();
    $teamCheck = $sqlQuery->fetch(PDO::FETCH_ASSOC);
    
        if(!empty($teamCheck)):
            if ($team == implode($teamCheck)):
                echo 'Nom d\'équipe déjà existant !';
            endif;
            
        else:
            $sqlQuery = $db->prepare("INSERT INTO teams (team_name) VALUES (:team)");
            $sqlQuery->execute(array(
                'team' => $team
                ));
        
            echo 'L\'équipe "' . $team . '" a bien été ajoutée à la base de données.';
            echo '<br>';
            echo '<a href="index.php" class="header_h1_link">Revenir à la page d\'accueil</a>';
        endif;
endif;


?>

    
