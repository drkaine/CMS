

<?php

session_start();
require("Models/Autoloader.php");
    Autoloader::register();

        $vue = new Vues();

        echo $vue->generateView_ajout_compet(Connexion::super_Admin(),$_GET);

        Connexion::relocalisation();


    unset($_GET);





