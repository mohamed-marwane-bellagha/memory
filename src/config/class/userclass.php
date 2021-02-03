<?php
    class User {
        private $id;
        public $login;
        
        public function connectdb(){
            try
            {
                return new PDO('mysql:host=localhost;dbname=memory', 'root', '');
            }
            catch(PDOException $erreur)
            {
                echo $erreur->getMessage();
            }
        }

        public function register($login, $password, $cpassword){

            $db = $this->connectdb();

            $msg = '';

            $login = htmlspecialchars(trim($login));
            $password = htmlspecialchars(trim($password));
            $cpassword = htmlspecialchars(trim($cpassword));

            $query= $db->prepare("SELECT id from user WHERE login = '$login'");
            $query->execute();
        
            if(!$query->rowCount())
            {
                if($password === $cpassword)
                {
                    if(strlen($password) >= 6)
                    {
                        $password = password_hash($password, PASSWORD_BCRYPT);
                        $query = $db->prepare("INSERT INTO user (login, password) VALUES ('$login', '$password')");
                        $execute = $query->execute();

                        if(!$execute)
                        {
                            $msg = "Probleme lors de l'inscription, essayer plus tard";
                        }
                    }
                    else
                    {
                        $msg = 'Minimum 6 characteres pour le mot de passe';
                    }
                }
                else
                {
                    $msg = 'Les mots de passe ne correspondent pas';
                }
            }
            else
            {
                $msg = 'Le login existe déjà';
            }
        $db = null;
        return $msg;
        }
        
        public function connect($login, $password){
            $db = $this->connectdb();
            $error = false;

            $login = htmlspecialchars(trim($login));
            $password = htmlspecialchars(trim($password));
            
            $query = $db->prepare("SELECT id FROM user WHERE login = '$login'");
            $query->execute();

            if($query->rowCount()){

                $query = $db->prepare("SELECT password FROM user WHERE login = '$login'");
                $query->execute();

                $result = $query->fetch(PDO::FETCH_OBJ);
                $cryptedpass = $result->password;

                if(password_verify($password, $cryptedpass)){

                    $query = $db->prepare("SELECT id, login FROM user WHERE login = '$login' ");
                    $query->execute();
                    $result = $query->fetch(PDO::FETCH_OBJ);

                    $this->id = $result->id;
                    $this->login = $result->login;
                }
                else{
                    $error = true;
                }
            }
            else{
                $error = true;
            }


            $db = null;
            return $error;
        }

        public function disconnect(){
            unset($this->login);
            unset($this->id);
            session_destroy();
        }

        public function update($login, $password){
            $db=$this->connectdb();

            $msg= '';

            $newlogin = htmlspecialchars(trim($login));
            $newpassword = htmlspecialchars(trim($password));

            $query=$db->prepare("SELECT id FROM user WHERE login= '$newlogin'");
            $query->execute();

            if(!$query->rowCount()){
                if(strlen($newlogin) >= 6 ){
                    if(strlen($newpassword) >= 6){
                        $newpassword = password_hash($newpassword, PASSWORD_BCRYPT);

                        $query = $db->prepare("UPDATE user SET login= '$newlogin', password='$newpassword' WHERE login='$this->login'");
                        $query->execute();

                    }
                    else{
                        $msg ='Minimum de 6 characteres requis pour le mot de passe';
                    }
                }
                else{
                    $msg= 'Minimum de 6 characteres requis pour le login'; 
                }
            }
            else{
                $msg= 'Le login demander est déja pris';
            }
            $db = null;
            return $msg;    
        }
        public function getId(){
            return $this->id;   
        }

    }

?>