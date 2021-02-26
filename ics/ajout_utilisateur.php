<?php
require("Models/Autoloader.php");
    Autoloader::register();
    $user = Utilisateurs::afficher_Utilisateurs();

        $vue = new Vues();

        


        
    if (isset($_POST["modif_user"])){
        echo $vue->generateView_modif_utilisateur($user);
      }
    else{
        echo $vue->generateView_ajout_utilisateur();

    }
?>