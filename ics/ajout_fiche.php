<?php
require("Models/Autoloader.php");
session_start();
    Autoloader::register();
    $fiche = Fiches::afficher_Fiches();
    $id = implode($_POST);
    $vue = new Vues();
     

        if(isset($_POST["modif"])){
            echo $vue->generateView_modif_fiche($fiche,Connexion::super_Admin(),$id);
        }
        else{
        echo $vue->generateView_ajout_fiche(Connexion::super_Admin());
        }
        Connexion::relocalisation();
?>