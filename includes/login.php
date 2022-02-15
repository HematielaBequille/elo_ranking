<?php
// Validation du formulaire
if (isset($_POST['login']) && isset($_POST['password'])) {
    $sqlQuery = 'SELECT * FROM users WHERE login=($_POST[login]) AND pass_md5=(md5($_POST[password]))';
    $usersStatement = $db->prepare($sqlQuery);
    $usersStatement->execute();
    $users = $usersStatement->fetchAll();

    if ($users[0] == 1) {
        session_start();
        $_SESSION['login'] = $_POST['login'];
        header('Location: index.php');
        exit();
    }
} 
?>


<div class="form_container">
    <form action="index.php" method="post">
        <label for="login" class="">Login</label>
        <input type="text" class="" id="" name="login">
        <label for="password" class="">Mot de passe</label>
        <input type="password" class="" id="" name="password">
        <button type="submit" class="" name="connection">Connexion</button>
    </form>
</div>


