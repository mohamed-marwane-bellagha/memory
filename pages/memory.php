<link rel="stylesheet" href="../src/config/style/style.css">
<link rel="stylesheet" href="../src/config/style/bootstrap.css">
<link rel="stylesheet" href="../src/config/style/bootstrap.min.css">


<?php
include_once('../src/config/config.php');
include_once('../src/component/header.php');
require_once("../src/config/class/scoreclass.php");
$game=$_SESSION['game'];
$user=$_SESSION['user'];

if(isset($_POST['carte'])){
$game->essai($_POST['carte']);

    if($game->getTry1()===$game->getTry2() && $game->getIndexoftry1()!=$game->getIndexoftry2()){
        $keyscarte=array_keys($_SESSION['partie'],$game->getTry1());
        array_splice($_SESSION['partie'],$keyscarte[0],1);
        $newpartie=$_SESSION['partie'];
        $keyscarte=array_keys($newpartie,$game->getTry1());
        array_splice($newpartie,$keyscarte[0],1);
        $_SESSION['partie']=$newpartie;
        $game->addScore();

//        header("Location:memory.php");
    }else{
        if($game->getTentatives()%2==0 && $game->getTentatives()>0){
            $game->substractscore();
        }
    }
}
if(isset($_SESSION['user'])){
echo "<main id='memorygame'><div class='cartecontainermemory'>";
for($i=0;$i<=$game->getnbpaire()*2 && isset($_SESSION['partie'][$i]) ;$i++){
    echo "<form method='post' class='formcardmemory' action='memory.php'>
     <div class='form-group'>
     <button class=' cartememory carte".$_SESSION['partie'][$i]."' type='submit' name='carte[$i]' value=".$_SESSION['partie'][$i]."></button>
     </div>
      </form>";
}

echo "</div>";
echo "<div class='scorecontainer'>Score:".$game->getscore()."</div>";
if(count($_SESSION['partie'])==0  && isset($_POST['carte'])){
    echo "<div class='scorecontainer'><p>Fin du game</p>";
    echo "<a class='leaderboardlink' href='leaderboard.php'>Check si t'es dans le leaderboard</a>
          </div></main>";
    $game->insertscore($user->getId());
}
}else{
    header("Location:../index.php");
}
include_once('../src/component/footer.php');

?>