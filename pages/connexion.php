<?php
include_once('../src/config/config.php');
include_once('../src/component/header.php');

?>

<?php

$error = false;

if(isset($_POST['btn_login'])){
    $user = new User();
    $error = $user->connect($_POST['login'], $_POST['password']);

    if(!$error){
        $_SESSION['user'] = $user;
        header('Location: ../index.php');
    }
    else{
        $user = null;
    }
}
?>





<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion</title>
    <link rel='stylesheet' href='../src/config/style/style.css'>
    <link rel='stylesheet' href='../src/config/style/bootstrap.css'>
    <link rel='stylesheet' href='../src/config/style/bootstrap.min.css'>
</head>
<body>
<form class="containerconnexion" method="post">
    <div class="form-group formconnexion">
        <div class="containerinput">
            <h2>Connectez-vous</h2>
            <input class="form-control test" type="text" name="login" placeholder="Username">
            <input class="form-control test" type="password" name="password" placeholder="Password">
            <input class="form-control test connect_btn" type="submit" value="connect" name="btn_login">
            <?php
            if($error){
                echo "<div class='errormessage'>Login ou mot de passe incorrect</div>";
            }
            ?>
        </div>
    </div>
</form>
</body>
</html>