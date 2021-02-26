<?php
session_start();
require("Models/Autoloader.php");
    Autoloader::register();
    $user = Utilisateurs::afficher_Utilisateurs();
    $input = implode($_POST);;

        $vue = new Vues();

        echo $vue->generateview_supp_user($user,$input);

        // if (empty($_SESSION['Nom'])){
        //     header("location: index.php");
        //   }
          
?>