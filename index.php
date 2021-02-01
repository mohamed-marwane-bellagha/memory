<?php
include_once('src/config/config.php');
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accueil - <?php echo $_SESSION['user']->login; ?></title>
    <link rel='stylesheet' href='src/config/style/style.css'>
</head>
<body>
    <header>
        <?php
            if(!isset($_SESSION['user'])){ ?>
                <div class='containerheader'>
                    <h1>Memory</h1>
                    <a href='index.php' class='paragrapheheader'>Accueil</a>
                    <a class='paragrapheheader' href='pages/connexion.php'>Connexion</a>
                    <a class='paragrapheheader' href='pages/inscription.php'>Inscription</a>
                </div>
            <?php } 
            else
            { ?>
                <div class='containerheader'>
                    <h1>Memory</h1>
                    <a href='index.php' class='paragrapheheader'>Accueil</a>
                    <a href='pages/profil.php' class='paragrapheheader'>Profil</a>
                    <form method='post'>
                        <input class='btndeconnexion' type='submit' name='disconnect' value='Deconnexion'>
                    </form>
                </div>
            <?php
        } ?>
            <?php 
                if(isset($_POST['disconnect'])){
                    $user = new User();
                    $user->disconnect();
                }
                ?>
        
    </header>
</body>
</html>
<?php
require_once("src/config/class/scoreclass.php");

echo "<form method='post' action='index.php'>
    <label  for='nb_paire'>Choix nombre de paire de carte a trouver</label>
    <input name='nb_paire' id='nb_paire' type='number'>
    <input type='submit' name='choixnbcarte' id='choixnbcartes' value='Faire une partie'>
</form>";
if(isset($_POST['choixnbcarte'])){
    $nb_paire=$_POST['nb_paire'];
    $game=new score();
    if($game->difficulty($nb_paire)){
        $nb_carte=range(1,$game->getnbpaire(),1);
        $nb_carte1=range(1,$game->getnbpaire(),1);
        $total_carte=array_merge($nb_carte,$nb_carte1);
        shuffle($total_carte);
        $_SESSION['game']=$game;
        $_SESSION['partie']=$total_carte;
        header("Location:pages/memory.php");
}else{
        echo "Est ce que vous voulez vraiment jouer?";
    }

}
?>

