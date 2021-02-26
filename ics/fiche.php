<?php
session_start();
require("Models/Autoloader.php");

    Autoloader::register();
    $fiche = Fiches::afficher_Fiches();
    $input = implode($_POST);
        $vue = new Vues();

        echo $vue->generateView_fiche($fiche,$input);       

    
        // if (empty($_SESSION['Nom'])){
        //     header("location: index.php");
        //   }
        
          var_dump($input);


?>


