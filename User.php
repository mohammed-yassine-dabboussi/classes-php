<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css"/>
    <link rel="shortcut icon" href="" >
    <title>Classes PHP</title>
</head>


  
<header>
    <!--Partie gauche du header-->
    <div class="hGauche">
        <div class="bouton_header">Classes PHP | Mohammed Yassine Dabboussi</div>
    </div>
    <!--Partie droite du header-->
    <div class="hDroite">
        <div class="bouton_header">POO</div>
    </div>
</header>

    <body>
        <!--div principale-->
        <div class="div_body">
        <!--div du milieu du body-->
            <div class="div_milieu">
                <!--formulaire 1--> 
                <form action="" method="post">

                    <table>
                        <tr>
                            <td>Identifiant</td>
                            <td><input type="text" name="login"  size="25"/></td>
                        </tr>
                        <tr>
                            <td>Mot de Passe</td>
                            <td><input type="password" name="password"  size="25"/></td>
                        </tr>
                        <tr>
                            <td>Email</td>
                            <td><input type="text" name="email"  size="25"/></td>
                        </tr>
                        <tr>
                            <td>Prénom</td>
                            <td><input type="text" name="firstname"  size="25"/></td>
                        </tr>
                        <tr>
                            <td>Nom</td>
                            <td><input type="text" name="lastname"  size="25"/></td>
                        </tr>
                        </table>
                        <table>
                        <tr>
                            <td><input type="submit" value="Ajouter" name="register"></td>
                            <td><input type="submit" value="Supprimer" name="delete"></td>
                        </tr>
                        <tr>
                            <td><input type="submit" value="Mettre à jour" name="update"></td>
                            <td><input type="submit" value="Get All Infos" name="getallinfos"></td>
                        </tr>
                        <tr>
                            <td><input type="submit" value="Get Login" name="getlogin"></td>
                            <td><input type="submit" value="Get Email" name="getemail"></td>
                        </tr>
                        <tr>
                            <td><input type="submit" value="Get Firstname" name="firstname"></td>
                            <td><input type="submit" value="Get Lastname" name="getlastname"></td>
                        </tr>
                    </table>
                </form>
                <!--Partie PHP -->
                <?php
                    if (isset($_POST['login']) && isset($_POST['password']) && isset($_POST['email']) && isset($_POST['firstname']) && isset($_POST['lastname'])){
                                
                        class User{
                            private $id;
                            public $login;
                            public $password;
                            public $email;
                            public $firstname;
                            public $lastname;
                            public $bdd;

                            public function __construct(){
                                $this->bdd = new mysqli('localhost', 'root', '', 'classes');
                                $this->login=$_POST['login'];
                                $this->password=$_POST['password'];
                                $this->email=$_POST['email'];
                                $this->firstname=$_POST['firstname'];
                                $this->lastname=$_POST['lastname'];
                            }
                                                        
                            public function register($login, $password, $email, $firstname, $lastname){
                                $requete = "INSERT INTO utilisateurs (`login`, `password`, `email`, `firstname`, `lastname`) VALUES ('$this->login', '$this->password', '$this->email', '$this->firstname', '$this->lastname')";
                                $exec_requete = $this->bdd -> query($requete);
                            }
                                            
                        }
                    }
                    $login=$_POST['login'];$password=$_POST['password'];$email=$_POST['email'];$firstname=$_POST['firstname'];$lastname=$_POST['lastname'];
                    $user= new user();
                    if ( isset($_POST['register'])){
                        $user->register($_POST['login'], $_POST['password'], $_POST['email'], $_POST['firstname'], $_POST['lastname']);
                        echo "Félicitations, vous êtes bien inscrit !";
                        
                    }

                   
                
                    ?>
            </div>
            
            <div class="div_milieu">
                <!--formulaire 2--> 
                <form action="" method="post">

                    <table>
                        <tr>
                            <td>Identifiant</td>
                            <td><input type="text" name="login"  size="25"/></td>
                        </tr>
                        <tr>
                            <td>Mot de Passe</td>
                            <td><input type="password" name="password"  size="25"/></td>
                        </tr>
                        <tr>
                            <td><input type="submit" value="Connexion" name="connexion"></td>
                            <td><input type="submit" value="Deconnexion" name="deconnexion"></td>
                        </tr>
                        <tr>
                            <td><input type="submit" value="Is Connected" name="isconnected"></td>
                        </tr>
                    </table>
                </form>
                <?php
                    echo "test 2";
                ?>
            </div>
            </div>
        </div>
    </body> 

    <footer>
        <p><b>© Mohammed Yassine Dabboussi | La Plateforme | 2022-2023</b> </p>
    </footer> 

</html>