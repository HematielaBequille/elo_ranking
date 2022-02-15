<?php

if (isset($_POST['nickname'], $_POST['passw'], $_POST['passw_confirm'])) {
    require_once('db_connection.php');

    $nicknameCheck = '';
    $sqlQuery = $db->prepare("SELECT * FROM users WHERE nickname='".$_POST['nickname']."'");
    $sqlQuery->execute(array(
        'nickname' => $nicknameCheck
    ));
    if ($_POST['nickname'] = $nicknameCheck) {
        echo 'erreur';
    } 
    else {
        $nickname = $_POST['nickname'];
        $passw = $_POST['passw'];
        $passw_confirm = $_POST['passw_confirm'];
        
        $sqlQuery = $db->prepare('INSERT INTO users (nickname, pass_md5) VALUES (:nickname, :passw)');
        $sqlQuery->execute(array(
            "nickname" => $nickname,
            "passw" => $passw
        ));
        header('Location: register.php');
    }
}

//$sqlQuery = 'INSERT INTO users (nickname, pass_md5) VALUES (:nickname, :pass_md5)';
//$userRegister = $db->prepare($sqlQuery);

//$userRegister->bindParam(':nickname', $_POST['nickname']);
//$userRegister->bindParam(':pass_md5', $_POST['pass_md5']);
//$nickname = $_POST['nickname'];
//$pass_md5 = $_POST['pass_md5'];

//$userRegister->execute();




?>



<div class="form_container">
    <form method="post" action="register.php" class="add_form">
        <p class="form_p">Inscription</p>
        <p class="input_container">
            <label for="nickname">Votre pseudo : </label>
            <input type="text" name="nickname" class="text_input" maxlength="19" required />
            <br />
            <label for="password">Votre mot de passe : </label>
            <input type="password" name="passw" class="text_input" maxlength="15" required />
            <label for="password_confirm">Confirmation du mot de passe : </label>
            <input type="password" name="passw_confirm" class="text_input" maxlength="15" required />
            <br/>
        </p>
        <button type="submit" class="submit_button" name="register">S'inscrire</button>
    </form>
</div>
<!-- action="register.php" -->