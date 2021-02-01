<link rel='stylesheet' href='../src/config/style/style.css'>

<?php

include_once('../src/config/config.php');
include_once('../src/component/header.php');


$db = new PDO('mysql:host=localhost;dbname=memory;charset=utf8', 'root', '');
$query=$db->prepare("SELECT `score`, user.login FROM `score` INNER JOIN `user` ON user.id=score.id_utilisateur ORDER BY `score` DESC");
$query->execute();
$leaderboard=$query->fetchAll();
echo "<table><th colspan='2'>Leaderboard:</th>";
for($i=0;isset($leaderboard[$i]) && $i<10;$i++){
    echo "<tr>";

        echo "<td>Score:".$leaderboard[$i][0];
        echo "</td><td>Réalisé par:".$leaderboard[$i][1]."</td>";
    }
    echo "</tr>";

echo "</table>";
?>