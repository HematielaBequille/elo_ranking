<?php
// Validation que tous les champs soient remplis puis vérification du couple mot de passe / utilisateur. Si les vérifications sont réussies, on démarre une session pour l'utilisateur
if (isset($_POST['nickname'], $_POST['passw'])) {
    require_once('db_connection.php');

    $passw = $_POST['passw'];

    $sqlQuery = $db->prepare("SELECT nickname, passw_hashed FROM users WHERE nickname='".$_POST['nickname']."'");
    $sqlQuery->execute();
    $queryCheck = $sqlQuery->fetch(PDO::FETCH_ASSOC);

    if (password_verify($passw, $queryCheck['passw_hashed'])) {
        session_start();
        $_SESSION['nickname'] = $_POST['nickname'];
        header('Location: ../index.php');
    } else {
        echo 'La combinaison de votre pseudo et mot de passe n\' a pas été reconnue. <br /> Vous allez être redirigé sur la page d\'accueil dans quelques secondes ou <a href=../index.php class=""> cliquez ici. </a>';
        header('Refresh: 5; url=../index.php');
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
        <input type="password" class="" name="passw" class="text_input" maxlength="15" required />
        <button type="submit" class="submit_button" name="connection">Connexion</button>
    </form>
</div>


