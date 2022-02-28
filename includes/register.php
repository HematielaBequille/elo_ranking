<?php
// Validation que tous les champs soient remplis, hash du mot de passe puis que les champs mots de passe soient identiques. On vérifie ensuite si le pseudo n'est pas déjà présent en BDD. Si toutes les vérifications sont réussies, on inscrit le nouvel utilisateur
if (isset($_POST['nickname'], $_POST['passw'], $_POST['passw_confirm'])) {

    $nickname = $_POST['nickname'];

    $passw = $_POST['passw'];
    $passw_hashed = password_hash($passw, PASSWORD_DEFAULT);
    
    $passw_confirm = $_POST['passw_confirm'];
    $passw_confirm_hashed = password_hash($passw_confirm, PASSWORD_DEFAULT);
    

    if ($passw !== $passw_confirm) {
        echo 'Les mots de passe ne sont pas identiques.';
        
    } else {
    require_once('db_connection.php');

    $sqlQuery = $db->prepare("SELECT nickname FROM users WHERE nickname='".$_POST['nickname']."'");
    $sqlQuery->execute();
    $nicknameCheck = $sqlQuery->fetch(PDO::FETCH_ASSOC);
        if (!empty($nicknameCheck)) {
            if ($nickname == implode($nicknameCheck)) {
                echo 'pseudo déjà pris' . '<br />' . '<a href="register.php" class="nav_menu_link">Retourner à la page d\'inscription</a>';
                exit();
            }
        exit();
        }

        else {
            $sqlQuery = $db->prepare('INSERT INTO users (nickname, passw_hashed) VALUES (:nickname, :passw_hashed)');
            $sqlQuery->execute(array(
                "nickname" => $nickname,
                "passw_hashed" => $passw_hashed
                ));
            header('Location: ../index.php');
            echo 'Inscription réussie.';
        }
    }
}
?>


<div class="form_container">
    <form method="post" action="includes/register.php" class="add_form">
        <p class="form_p">S'inscrire</p>
            <label for="nickname" class="form_label">Votre pseudo : </label>
            <input type="text" name="nickname" class="form_input" maxlength="19" required />
            <br />
            <label for="password" class="form_label">Votre mot de passe : </label>
            <input type="password" name="passw" class="form_input" maxlength="15" required />
            <label for="password_confirm" class="form_label">Confirmation du mot de passe : </label>
            <input type="password" name="passw_confirm" class="form_input" maxlength="15" required />
        <button type="submit" class="submit_button" name="register">S'inscrire</button>
    </form>
</div>