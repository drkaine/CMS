<?php
require("Models/Autoloader.php");
    Autoloader::register();


        $vue = new Vues();

        echo $vue->generateView_reinit_mdp();
?>