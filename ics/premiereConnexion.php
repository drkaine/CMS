<?php
session_start();
require("Models/Autoloader.php");
    Autoloader::register();
    $vue = new Vues();