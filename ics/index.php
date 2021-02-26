<?php
session_start();
require("Models/Autoloader.php");

    Autoloader::register();


        $vue = new Vues();

        echo $vue->generateView_login();  

        if(isset($_POST["Deco"])){
    
            Connexion::Deconnexion($_POST,$_SESSION);

          }
        // else if (isset($_POST['Mail'] and isset($_POST["Mot_De_Passe"])))
        // {
        // 	Connexion::login($_POST["Mail"],$_POST["Mot_De_Passe"]);
        // }
          // if (!empty($_SESSION['Nom'])){
          //   header("location: interface.php");
          // }

// var_dump($_POST);

?>


