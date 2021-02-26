<?php
session_start();
require("Models/Autoloader.php");

    Autoloader::register();


        $vue = new Vues();

        echo $vue->generateView_login();  

        if(isset($_POST["Deco"])){
    
            Connexion::Deconexion($_POST,$_SESSION);

          }
          if (!empty($_SESSION['Nom'])){
            header("location: interface.php");
          }

// var_dump($_POST);

?>


