<?php
// Validation que tous les champs soient remplis puis comparaison entre les données envoyées par l'utilisateur et celles stockées en BDD. Si les vérifications sont réussies, on démarre une session pour l'utilisateur
if (isset($_POST['nickname'], $_POST['pass_md5'])) {
    require_once('db_connection.php');

    $userCredentials = array(
        'nickname' => $_POST['nickname'],
        'pass_md5' => $_POST['pass_md5']
    );
    print_r($userCredentials);
    echo '<br />';


    $sqlQuery = $db->prepare("SELECT nickname, pass_md5 FROM users WHERE nickname='".$_POST['nickname']."' AND pass_md5='".$_POST['pass_md5']."'");
    $sqlQuery->execute();
    $queryCheck = $sqlQuery->fetch(PDO::FETCH_ASSOC);
    print_r($queryCheck);
    echo '<br />';
    
        if ($userCredentials === $queryCheck) {
            echo 'test réussi';
            session_start();
            $_SESSION['nickname'] = $_POST['nickname'];
            header('Location: ../index.php');
        } else {
            echo 'test échoué';
        }
    exit();
}

?>


<div class="form_container">
    <form method="post" action="includes/login.php">
        <p class="form_p">Se connecter</p>
        <label for="nickname" class="">Pseudo : </label>
        <input type="text" class="" name="nickname" class="text_input" maxlength="19" required />
        <label for="password" class="">Mot de passe : </label>
        <input type="password" class="" name="pass_md5" class="text_input" maxlength="15" required />
        <button type="submit" class="submit_button" name="connection">Connexion</button>
    </form>
</div>


