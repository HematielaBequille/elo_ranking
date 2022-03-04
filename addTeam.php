<?php
include_once('index.php');

$team_form = ' <input type="text" name="team" class="text_input" placeholder="Nom d\'équipe" maxlength="25" required/>';


// Récupération du nombre de la création d'équipe souhaitée, on adapte l'orthographe et on affiche le nombre d'input demandés
if (isset($_POST['number'])):

    require_once('includes/db_connection.php');

    $number = htmlspecialchars($_POST['number']);

    if ($number > 1):
        echo '<h1 class="h1_form">Création de ' . $number . ' nouvelles équipes</h1>';
    else:
        echo '<h1 class="h1_form">Création d\'une nouvelle équipe</h1>';
    endif;

    echo '<div class="form_container">
            <form method="post" action="addTeam.php" class="add_form">
                <div class="input_container">
                    <label for="team" class="form_label">Nom de l\'équipe : </label>';

    $i = 0;
    while ($i < $number):
        echo $team_form;
        $i++;
    endwhile;


    echo '<label for="league" class="form_label">Choix de la ligue : </label>
          <select name="league">';
    $sqlQuery = $db->prepare("SELECT league_name FROM leagues");
    $sqlQuery->execute();
    while ($data = $sqlQuery->fetch(PDO::FETCH_ASSOC)):
        echo '<option value"">';
        echo $data['league_name'];
        echo '</option>';
    endwhile;
    echo '</select>
        <button type="submit" name="" class="submit_button">Valider</button>
        </div>
        </form>
        </div>';

else:
    echo '<h1 class="h1_form">Formulaire de création de nouvelle(s) équipe(s)</h1>

    <div class="form_container">
        <form method="POST" action="addTeam.php" class="add_form">
            <p class=form_p>Combien d`\'équipe(s) souhaitez-vous créer ?</p>
        <div class="choice_container">
            <input type="number" name="number" class="number_input" min="1" max="16" value="1" required/>
            <button type="submit" name="" class="submit_button">Valider</button>
        </div>
        </form>
    </div>';
endif;


// INSERTION D'UNE EQUIPE EN BASE DE DONNEES
// On récupère les champs remplis, on lui enlève les balises HTML & PHP puis on convertit la première lettre du nom d'équipe en majuscule, le reste en miniscule et on vérifie qu'il n'existe pas déjà en BDD puis on l'insert.
if (isset($_POST['team'])):

    require_once('includes/db_connection.php');

    $team = strip_tags($_POST['team']);
    $team = mb_convert_case($team, MB_CASE_TITLE, "UTF-8");
    $league = strip_tags($_POST['league']);

    $addSuccessful = 'L\'équipe "' . $team . '" a bien été ajoutée à la base de données en ' . $league .'<br><a href="index.php" class="header_h1_link">Revenir à la page d\'accueil</a>';


    $sqlQuery = $db->prepare("SELECT team_name FROM teams WHERE team_name='".$_POST['team']."'");
    $sqlQuery->execute();
    $teamCheck = $sqlQuery->fetch(PDO::FETCH_ASSOC);
    
        if (!empty($teamCheck)):
            if ($team == implode($teamCheck)):
                echo 'Nom d\'équipe déjà existant !';
            endif;
        
        else:
            switch($league):
                case 'Ligue Nord':
                    $sqlQuery = $db->prepare("INSERT INTO teams (team_name, league, league_id) VALUES (:team, :league, :league_id)");
                    $sqlQuery->execute(array(
                        'team' => $team,
                        'league' => $league,
                        'league_id' => 1
                        ));
                    echo $addSuccessful;
                    break;
                    
                case 'Ligue Est':
                    $sqlQuery = $db->prepare("INSERT INTO teams (team_name, league, league_id) VALUES (:team, :league, :league_id)");
                    $sqlQuery->execute(array(
                        'team' => $team,
                        'league' => $league,
                        'league_id' => 2
                        ));
                    echo $addSuccessful;
                    break;

                case 'Ligue Ouest':
                    $sqlQuery = $db->prepare("INSERT INTO teams (team_name, league, league_id) VALUES (:team, :league, :league_id)");
                    $sqlQuery->execute(array(
                        'team' => $team,
                        'league' => $league,
                        'league_id' => 3
                        ));
                    echo $addSuccessful;
                    break;
                        
                case 'Ligue Sud':
                    $sqlQuery = $db->prepare("INSERT INTO teams (team_name, league, league_id) VALUES (:team, :league, :league_id)");
                    $sqlQuery->execute(array(
                        'team' => $team,
                        'league' => $league,
                        'league_id' => 4
                        ));
                    echo $addSuccessful;
                    break;

                case 'Ligue Île de France':
                    $sqlQuery = $db->prepare("INSERT INTO teams (team_name, league, league_id) VALUES (:team, :league, :league_id)");
                    $sqlQuery->execute(array(
                        'team' => $team,
                        'league' => $league,
                        'league_id' => 5
                        ));
                    echo $addSuccessful;
                    break;

                default:
                    echo 'cassé';
            endswitch;
        endif;
endif;


?>

    
