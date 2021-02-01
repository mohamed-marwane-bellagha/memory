<?php
require_once("src/config/class/scoreclass.php");
session_start();
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