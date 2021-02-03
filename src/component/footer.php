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