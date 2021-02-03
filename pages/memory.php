<link rel="stylesheet" href="../src/config/style/style.css">

<?php

include_once('../src/config/config.php');
include_once('../src/component/header.php');


require_once("../src/config/class/scoreclass.php");
$game=$_SESSION['game'];
$user=$_SESSION['user'];
$sign=0;

echo "<div class='cartecontainer'>";
for($i=0;$i<=$game->getnbpaire()*2 && isset($_SESSION['partie'][$i]) ;$i++){
echo "<form method='post'>
      <button class=' carte carte".$_SESSION['partie'][$i]."'type='submit' name='carte[$i]' value=".$_SESSION['partie'][$i].">".$_SESSION['partie'][$i]."</button>
      </form>";
}
echo "</div>";
echo "Score:".$game->getscore();

if(isset($_POST['carte'])){
$game->essai($_POST['carte']);

if($game->getTry1()===$game->getTry2() && $game->getIndexoftry1()!=$game->getIndexoftry2() ){
    $keyscarte=array_keys($_SESSION['partie'],$game->getTry1());
    array_splice($_SESSION['partie'],$keyscarte[0],1);
    $newpartie=$_SESSION['partie'];
    $keyscarte=array_keys($newpartie,$game->getTry1());
    array_splice($newpartie,$keyscarte[0],1);
    $_SESSION['partie']=$newpartie;
    $game->addScore();
    header("Location:memory.php");
    }else{
    if($game->getTentatives()%2==0 && $game->getTentatives()>0){
        $game->substractscore();
    }


}
}
if(count($_SESSION['partie'])==0  && !isset($_POST['carte'])){
    echo "Fin du game";
    $game->insertscore($user->getId());
}
?>