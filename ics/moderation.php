<?php
session_start();
require("Models/Autoloader.php");
    Autoloader::register();


        $vue = new Vues();

        echo $vue->generateView_interface();

        if (empty($_SESSION['Nom'])){
            header("location: index.php");
          }
          
?>