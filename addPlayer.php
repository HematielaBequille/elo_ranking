<?php
include_once('index.php');

$playerNumberForm = '<h1 class="h1_form">Formulaire de création de nouveau(x) joueur(s)</h1>
    <div class="form_container">
        <form method="POST" action="addPlayer.php" class="add_form">
            <p class=form_p>Combien de joueur(s) souhaitez-vous créer ?</p>
        <div class="choice_container">
            <input type="number" name="number" class="number_input" min="1" max="10" value="1" required/>
            <button type="submit" name="" class="submit_button">Valider</button>
        </div>
        </form>
    </div>';



if (isset($_POST['number'])):

    require_once('includes/db_connection.php');

    $number = htmlspecialchars($_POST['number']);

    if ($number > 1):
        echo '<h1 class="h1_form">Création de ' . $number . ' nouveaux joueurs</h1>';
    else:
        echo '<h1 class="h1_form">Création d\'un nouveau joueur</h1>';
    endif;

    echo '<div class="form_container">
            <form method="POST" action="addPlayer.php" class="add_form">
                <div class="input_container">
                    <label for="player" class="form_label">Nom du joueur : </label>';
    
    $i = 0;
    $iteration = 0;
    while ($i < $number):
        $playerForm = '<input type="text" name="nickname['.$iteration.']" class="text_input" placeholder="Pseudo" maxlenght="25" required />';
        echo $playerForm;
        $iteration++;
        $i++;
    endwhile;

    echo '<label for="team" class="form_label">Choix de l\'équipe : </label>
          <select name="team">';
    $sqlQuery = $db->prepare("SELECT team_name FROM teams");
    $sqlQuery->execute();
    while ($data = $sqlQuery->fetch(PDO::FETCH_ASSOC)):
        echo '<option value"">';
        echo $data['team_name'];
        echo '</option>';
    endwhile;

    echo '</select>
        <button type="submit" name="" class="submit_button">Valider</button>
        </div>
        </form>
        </div>';

else:
    echo $playerNumberForm;   
endif;


if (isset($_POST['nickname']) && is_array($_POST['nickname'])):
    
    require_once('includes/db_connection.php');

    

    $sqlQuery = $db->prepare("INSERT INTO players (player_name, team, team_id) VALUES (:nickname, :team, :team_id)");

    foreach ($_POST['nickname'] as $nickname):
        echo $nickname;
        echo '<br />';
        
        $sqlQuery->execute();
        $sqlQuery->execute(array(
            'nickname' => $nickname,
            'team' => $team,
            'team_id' => 1
            ));
    endforeach;

    

    
endif;





   


?>