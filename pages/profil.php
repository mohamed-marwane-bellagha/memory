<?php 
include_once('../src/config/config.php');
include_once('../src/component/header.php');
require_once('../src/config/class/userclass.php');
require_once('../src/config/class/scoreclass.php');
?>

<?php
$msg ='';
if(isset($_POST['btn_update'])){
    $msg = $_SESSION['user']->update($_POST['login'], $_POST['password']);
    if($msg == ''){
        header('Location: ../index.php');
    }
}
$user=$_SESSION['user'];
if(isset($_SESSION['game'])){
    $game=$_SESSION['game'];
}else{
    $game=new score();
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil</title>
    <link rel='stylesheet' href='../src/config/style/style.css'>
    <link rel='stylesheet' href='../src/config/style/bootstrap.css'>
    <link rel='stylesheet' href='../src/config/style/bootstrap.min.css'>
</head>
<body>
        <form class="containerchangeaccount" method="post">
            <div class="form-group formconnexion">
                    <div class="containerinput">
                        <h2>Modifiez vos informations</h2>
                        <input class="form-control test" type="text" name="login" placeholder="New username">
                        <input class="form-control test" type="password" name="password" placeholder="New password">
                        <input class="form-control test connect_btn" type="submit" value="Edit" name="btn_update">
                        <?php
                            if($msg != ''){
                                echo "<div class='errormessage'> $msg </div>";
                            }
                        ?>
                    </div>
                </div>
                <div class="containerscore">
                    <h2 id='titreprofil'>Vos meilleurs scores:</h2>
                    <table>
                        <?php
                        $id=$user->getId();
                        $db = new PDO('mysql:host=localhost;dbname=memory', 'root', '');
                        $query = $db->prepare("SELECT * FROM score WHERE id_utilisateur = '$id' ORDER BY score DESC");
                        $query->execute();
                        $scoreutilisateur = $query->fetchAll();
                        for($i=0;isset($scoreutilisateur[$i]);$i++){ ?>
                            <tr>
                                <td>
                                    <?php echo $scoreutilisateur[$i][2]; ?>
                                <td>
                            </tr>
                        <?php }
        
                        ?>
                    </table>
                </div>
        </form>
</body>
</html>