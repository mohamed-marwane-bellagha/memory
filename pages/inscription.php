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
    <link rel='stylesheet' href='../src/config/style/style.css'>
    <link rel='stylesheet' href='../src/config/style/bootstrap.css'>
    <link rel='stylesheet' href='../src/config/style/bootstrap.min.css'>

</head>
<body>
    <form class="containerconnexion" method="post">
        <div class="form-group formconnexion">
                <div class="containerinput">
                    <h2>Inscrivez-vous</h2>
                    <input class="form-control test" type="text" name="login" placeholder="Username">
                    <input class="form-control test" type="password" name="password" placeholder="Password">
                    <input class="form-control test" type="password" name="cpassword" placeholder="Confirm password">
                    <input class="form-control test connect_btn" type="submit" value="Register" name="btn_register">
                    <?php
                    if($msg != ''){
                        echo "<div class='errormessage'> $msg </div>";
                    }
                    ?>
                </div>
        </div>
    </form>
</body>
</html>