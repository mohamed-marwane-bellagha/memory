<?php
class score {
    private $db;
    private $id;
    private $id_utilisateur;
    private $score=0;
    private $nb_paire;
    private $booltry =true;
    private $try1;
    private $try2;
    private $indexoftry1;
    private $indexoftry2;
    private $tentatives=0;

//    public function __construct(){
//        $this->db = new PDO('mysql:host=localhost;dbname=memory', 'root', '');
//    }
    public function difficulty($nb_paire){
        $nb_paire=htmlspecialchars(trim($nb_paire));
        if($nb_paire>12 || $nb_paire<2){
            $verif=0;
        }else{
            $this->nb_paire=$nb_paire;
            $verif=1;
        }
        return $verif;
    }
public function essai($cartevalue){
        if($this->try1==null || $this->booltry==true){
            foreach ($cartevalue as $key=>$value){
            $this->indexoftry1=$key;
            $this->try1=$value;
            $this->tentatives=$this->tentatives+1;
            }
            $this->booltry=false;
        }else{
            foreach ($cartevalue as $key=>$value){
                $this->indexoftry2=$key;
                $this->try2=$value;
                $this->tentatives=$this->tentatives+1;
            }
            $this->booltry=true;
        }
}
    public function addscore(){
            $this->score=$this->score+(5*($this->nb_paire/2));

    }
    public function substractscore(){
        $this->score=$this->score-(1*($this->nb_paire/2));

    }
    public function getscore(){
        return $this->score;
    }
    public function getnbpaire(){
        return $this->nb_paire;
    }

    public function getTry1()
    {
        return $this->try1;
    }
    public function getTry2(){
        return $this->try2;
    }
    public function getIndexoftry1()
    {
        return $this->indexoftry1;
    }
    public function getIndexoftry2()
    {
        return $this->indexoftry2;
    }
    public function getTentatives(){
        return $this->tentatives;
    }
    public function insertscore($id_utilisateur){
        $id_utilisateur=htmlspecialchars(trim($id_utilisateur));
        $db = new PDO('mysql:host=localhost;dbname=memory', 'root', '');
        $query = $db->prepare( "INSERT INTO `score`( `id_utilisateur`,`score`) VALUES ('{$id_utilisateur}','{$this->score}')");
        $query->execute();
    }
}
?>