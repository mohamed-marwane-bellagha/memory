
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
</head>
<body>
    <form method="post">
        <input type="text" name="login" placeholder="Username">
        <input type="password" name="password" placeholder="Password">
        <input type="submit" value="connect" name="btn_login">
    </form>
    <?php
    if($error){
        echo 'Login ou mot de passe incorrect';
    }
    ?>
</body>
</html>