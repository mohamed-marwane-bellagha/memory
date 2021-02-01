<?php 
include_once('../src/config/config.php');
include_once('../src/component/header.php');
require_once('../src/config/class/userclass.php');
?>

<?php
$msg ='';
if(isset($_POST['btn_update'])){
    $msg = $_SESSION['user']->update($_POST['login'], $_POST['password']);
    if($msg == ''){
        header('Location: ../index.php');
    }
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil</title>
    <link rel='stylesheet' href='../src/config/style/style.css'>
</head>
<body>
    <form method="post">
        <input type="text" name="login" placeholder="New username">
        <input type="password" name="password" placeholder="New password">
        <input type="submit" value="Edit" name="btn_update">
        <?php
            if($msg != ''){
                echo $msg;
            }
        ?>
    </form>
</body>
</html>