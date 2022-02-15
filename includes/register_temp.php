<?php
if (isset($_POST['login']) && (isset($_POST['password']) && (isset($_POST['password_confirm'])))) {
  if ($_POST['password'] != $_POST['password_confirm']) {
    $erreur = 'Les deux mots de passe sont différents.';
  }
  else {
    require_once('db_connection.php');
    $sqlQuery = 'SELECT count(*) FROM users WHERE login=($_POST[login])';
    $usersStatement = $db->prepare($sqlQuery);
    $usersStatement->execute();
    $users = $usersStatement->fetchAll();

    if ($users[0] == 0) {
      $sqlQuery = 'INSERT INTO users VALUES($_POST[login],  md5($_POST[password]))';
      $db->query($sqlQuery);

      session_start();
      $_SESSION['login'] = $_POST['login'];
      header('Location: ../index.php');
      exit();
    }
    else {
      $erreur = 'Un utilisateur possède déjà ce login.';
    }
  }
}
else {
$erreur = 'test.';
}

?>

<div class="form_container">
    <form method="post" action="register.php" class="add_form">
        <p class="form_p">Inscription</p>
        <p class="input_container">
            <label for="login">Votre login : </label>
            <input type="text" name="login" class="text_input" maxlength="19" required />
            <br />
            <label for="password">Votre mot de passe : </label>
            <input type="password" name="password" class="text_input" maxlength="15" required />
            <label for="password_confirm">Confirmation du mot de passe : </label>
            <input type="password" name="password_confirm" class="text_input" maxlength="15" required />
            <br/>
        </p>
        <input type="submit" value="Valider" class="submit_button" name="register" />
    </form>
</div>

<?php
if (isset($erreur)) echo '<br />', $erreur;
?>