<?php
include_once('src/config/config.php');
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accueil -
<?php //echo $_SESSION['user']->login; ?>
    </title>
    <link rel='stylesheet' href='src/config/style/style.css'>
    <link rel='stylesheet' href='src/config/style/bootstrap.css'>
    <link rel='stylesheet' href='src/config/style/bootstrap.min.css'>
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
                    <a href='pages/profil.php' class='paragrapheheader'><?php echo $_SESSION['user']->login; ?></a>
                    <form method='post'>
                        <input class='btndeconnexion' type='submit' name='disconnect' value='Deconnexion'>
                    </form>
                </div>
            <?php }
                if(isset($_POST['disconnect'])){
                    $user = new User();
                    $user->disconnect();
                }
                ?>
        
    </header>
<?php
require_once("src/config/class/scoreclass.php");
if(isset($_SESSION['user'])){
    echo "<main class='divindex'>
    <h1 class='display-3'>Bonjour ".$_SESSION['user']->login."</h1>
    <form method='post' action='index.php' class='formindex'>
    <fieldset class='fieldsetindex '>
    <label  for='nb_paire'>Choix de cartes memory</label>
    
    <input class='form-control inputindex' name='nb_paire' id='nb_paire' type='number'>
    <input class='btn btn-success btnindex' type='submit' name='choixnbcarte' id='choixnbcartes' value='Faire une partie'>
    </fieldset>
    </form></main>";
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
}else{
?>
    <main class='divindex'>
        <h1>Ce jeu du memory est fait pour toi</h1>
        <form action="pages/inscription.php" method="post">
            <button class='btn btn-secondary' type="submit">Inscris toi pour jouer</button>
        </form>
    </main>
<?php }

?>
    <footer>
        <?php
        if(!isset($_SESSION['user'])){ ?>
            <div class='containerfooter'>
                <h1>Memory</h1>
                <a href='../index.php' class='paragrapheheader'>Accueil</a>
                <a class='paragrapheheader' href='../pages/connexion.php'>Connexion</a>
                <a class='paragrapheheader' href='../pages/inscription.php'>Inscription</a>
            </div>
        <?php }
        else
        { ?>
            <div class='containerfooter'>
                <h1>Memory</h1>
                <a href='../index.php' class='paragrapheheader'>Accueil</a>
                <a href='profil.php' class='paragrapheheader'>Profil</a>
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
            header('Location: ../index.php');
        }
        ?>

    </footer>
</body>
</html>


