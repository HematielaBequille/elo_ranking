<?php
    echo 'étape 1 ';
    $hash = password_hash('motdepasse', PASSWORD_DEFAULT);
    echo $hash;
    echo '<br>';

    echo 'étape 2 ';
    if (password_verify('motdepasse', $hash)) {
        echo 'Mot de passe valide';
    } else {
        echo 'Mot de passe invalide';
    }
?>