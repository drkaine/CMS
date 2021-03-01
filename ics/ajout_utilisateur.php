<?php
session_start();
require("Models/Autoloader.php");
    Autoloader::register();
    $user = Utilisateurs::afficher_Utilisateurs();
    $users = implode($_POST);
        $vue = new Vues();

        Connexion::relocalisation();


        
    if(isset($_POST["modif"])){

        echo $vue->generateView_modif_user($user,Connexion::super_Admin(),$users);
    }
   else{
        echo $vue->generateView_ajout_utilisateur();
   }
    
?>