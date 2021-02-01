<?php 
include_once('../src/config/config.php');
include_once('../src/component/header.php');

?>


<?php
require_once('../src/config/class/userclass.php');

$msg = '';

if(isset($_POST['btn_register'])){
    $user = new User();
    $msg = $user->register($_POST['login'], $_POST['password'], $_POST['cpassword']);

        if($msg == ''){
            header('Location: connexion.php');
        }
    }
?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription</title>
    <link rel='stylesheet' href='../src/config/style/header.css'>

</head>
<body>
    <form method="post">
        <input type="text" name="login" placeholder="Username">
        <input type="password" name="password" placeholder="Password">
        <input type="password" name="cpassword" placeholder="Confirm password">
        <input type="submit" value="Register" name="btn_register">
    </form>
    <?php
    if($msg != ''){
        echo $msg;
    }
    ?>
</body>
</html>