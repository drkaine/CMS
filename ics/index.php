<?php
session_start();
require("Models/Autoloader.php");

    Autoloader::register();


        $vue = new Vues();

        

        if(isset($_POST["Deco"])){
    
            Connexion::Deconnexion();

          }

        echo $vue->generateView_login();  
      

?>

