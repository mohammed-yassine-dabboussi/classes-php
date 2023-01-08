<!--Partie PHP -->
<?php
    session_start();

    class user{
        private $id;
        public $login="abc";
        public $password="abc";
        public $email="abc";
        public $firstname="abc";
        public $lastname="abc";
        public $bdd;

        public function __construct(){
            $this->bdd = new mysqli('localhost', 'root', '', 'classes');
        }

        //Méthode register                            
        public function register($login, $password, $email, $firstname, $lastname){
            $requete = "INSERT INTO utilisateurs (`login`, `password`, `email`, `firstname`, `lastname`) VALUES ('$this->login', '$this->password', '$this->email', '$this->firstname', '$this->lastname')";
            $exec_requete = $this->bdd->query($requete);
        }

        //Méthode connect
        public function connect($login_c, $password_c){
            $requete2 = "SELECT COUNT(*) FROM `utilisateurs` WHERE `login`='abc' AND `password`='abc'";
            $exec_requete2 = $this->bdd->query($requete2);
            $result_fetch_array = $exec_requete2 -> fetch_array(); 
            echo $login_c.$password_c;
            var_dump($result_fetch_array);   
            if($result_fetch_array['COUNT(*)'] > 1){
                $msg="Vous êtes connecté";
                $_SESSION['user'][]= $login_c;
            }else {
                $msg="Vérifier l'identifiant ou le mot de passe";
            }

            return $msg;
        }

        //Méthode delete 

        public function delete(){
            $requete3 = "DELETE * FROM `utilisateurs` WHERE `login`='abc' AND `password`='abc'";
            $exec_requete3 = $this->bdd->query($requete3);

            session_destroy(); 
        }
         
        //Méthode delete 

        public function update($login, $password, $email, $firstname, $lastname){
            $requete3 = "UPDATE `utilisateurs` SET `id`='testupdate',`login`='testupdate',`password`='testupdate',`email`='testupdate',`firstname`='testupdate',`lastname`='testupdate' WHERE `login`='abc'";
            $exec_requete3 = $this->bdd->query($requete3);
        }

        //Méthode isConnected

        public function isConnected(){
            $msg=false;
            if ($_SESSION['user'][] != ""){
                $msg=true;
            }
            return $msg;
        }

        //Méthode getAllInfos

        public function getAllInfos(){
            $requete4 = "SELECT * FROM `utilisateurs` WHERE `login`='abc'";
            $exec_requete4 = $this->bdd->query($requete4);
            $result_fetch_array = $exec_requete4 -> fetch_array(); 

            return $result_fetch_array;
        }

        //Méthode getLogin

        public function getLogin(){
            $requete5 = "SELECT `login` FROM `utilisateurs` WHERE `firstname`='abc'";
            $exec_requete5 = $this->bdd->query($requete5);
            $result_fetch_array = $exec_requete5 -> fetch_array(); 

            return $result_fetch_array;
        }

        //Méthode getEmail

        public function getEmail(){
            $requete6 = "SELECT `email` FROM `utilisateurs` WHERE `login`='abc'";
            $exec_requete6 = $this->bdd->query($requete6);
            $result_fetch_array = $exec_requete6 -> fetch_array(); 

            return $result_fetch_array;
        }

        //Méthode getFirstname

        public function getFirstname(){
            $requete7 = "SELECT `firstname` FROM `utilisateurs` WHERE `login`='abc'";
            $exec_requete7 = $this->bdd->query($requete7);
            $result_fetch_array = $exec_requete7 -> fetch_array(); 

            return $result_fetch_array;
        }

        //Méthode getLastname

        public function getLastname(){
            $requete8 = "SELECT `lastname` FROM `utilisateurs` WHERE `login`='abc'";
            $exec_requete8 = $this->bdd->query($requete8);
            $result_fetch_array = $exec_requete8 -> fetch_array(); 

            return $result_fetch_array;
        }

    }
    $login="";
    $password="";
    $email="";
    $firstname="";
    $lastname="";

    $user= new user();
    
    //Méthode register
        $user->register($login, $password, $email, $firstname, $lastname);
        echo "felicitation vous êtes inscrits !";
        echo "  <table border:1px>
                    <tr>
                        <td>Login</td><td>Email</td><td>First name</td><td>LAst name</td>
                    </tr>
                    <tr>
                        <td>".$user->login."</td><<td>".$user->email."</td><td>".$user->firstname."</td><td>".$user->lastname."</td>
                    </tr>
                </table>";

    //Méthode connect
    $login_c="abc";
    $password_c="abc";
        echo $user->connect($login_c, $password_c);     
        
    //Méthode supprimer
        $user->delete();   

    //Méthode update
        $user->update($login, $password, $email, $firstname, $lastname);

    //Méthode isConnected
        $user->isConnected();

    //Méthode getAllInfos
        var_dump($user->getAllInfos());
    
    //Méthode Login
        var_dump($user->getLogin());

    //Méthode Email
        var_dump($user->Email());

    //Méthode Firstname
        var_dump($user->Firstname());

    //Méthode Lastname
        var_dump($user->Lastname());
                
?>