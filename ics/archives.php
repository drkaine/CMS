<?php
session_start();
require("Models/Autoloader.php");
    Autoloader::register();
    $table = "fiches";
    if(isset($_POST['online'])){
        $table= "fiches";
        $id = $_POST["online"];
        Archive::archivage($table,$id,null);
    }
    $fiche = Archive::afficher_Archive($table);

        $vue = new Vues();

        echo $vue->generateView_archives($fiche,Connexion::super_Admin());

        Connexion::relocalisation();
       
?>