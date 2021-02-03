<?php 
    require_once('../src/config/config.php');
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Header</title>
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
                    <a href='../index.php' class='paragrapheheader'>Accueil</a>
                    <a class='paragrapheheader' href='../pages/connexion.php'>Connexion</a>
                    <a class='paragrapheheader' href='../pages/inscription.php'>Inscription</a>
                </div>
            <?php } 
            else
            { ?>
                <div class='containerheader'>
                    <h1>Memory</h1>
                    <a href='../index.php' class='paragrapheheader'>Accueil</a>
                    <a href='profil.php' class='paragrapheheader'><?php echo $_SESSION['user']->login; ?></a>
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
        
    </header>
</body>
</html>