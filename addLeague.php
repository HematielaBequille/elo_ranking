<?php
include_once('index.php');
    
$league_form = '
            <div class="form_container">
                <form method="post" action="addLeague.php" class="add_form">
                    <p class="form_p">Création d\'une nouvelle ligue</p>
                    <div class="input_container">
                        <input type="text" name="league" class="text_input" placeholder="Nom de ligue" maxlength="20" required/>
                        <input type="submit" value="Valider" class="submit_button" />
                    </div>
                </form>
            </div>';

echo $league_form;

if (isset($_POST['league'])):

    require_once('includes/db_connection.php');
    $league = strip_tags($_POST['league']);
    $league = mb_convert_case($league, MB_CASE_TITLE, "UTF-8");
    //echo $league . '<br />';

    $sqlQuery = $db->prepare("SELECT league_name FROM leagues WHERE league_name='".$_POST['league']."'");
    $sqlQuery->execute();
    $leagueCheck = $sqlQuery->fetch(PDO::FETCH_ASSOC);
    //print_r($leagueCheck);
    //echo '<br>';

    if (!empty($leagueCheck)):
        if ($league == implode($leagueCheck)):
            echo 'La ligue "' . $league . '" existe déjà en base de données !' . '<br />';
        endif;

    else:
        $sqlQuery = $db->prepare("INSERT INTO leagues (league_name) VALUES (:league)");
        $sqlQuery->execute(array(
            'league' => $league
        ));
        echo 'La ligue "' . $league . '" a bien été ajoutée à la base de données.' . '<br />' . '<a href="index.php" class="header_h1_link">Revenir à la page d\'accueil</a>';
    endif;

endif;

    
?>