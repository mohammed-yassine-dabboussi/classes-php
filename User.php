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
                
?>