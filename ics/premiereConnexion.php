<?php

	session_start();
	require("Models/Autoloader.php");

    Autoloader::register();


        $vue = new Vues();
 		


            

        

       
        var_dump($_SESSION);

        echo $vue->generateView_reinit_mdp("interface.php");