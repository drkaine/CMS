<?php
session_start();
require("Models/Autoloader.php");
    Autoloader::register();
    


    if (isset($_POST["Oui"])){
      $table= "fiches";
      $id = $_POST["ID"];
      var_dump($id);
      Archive::archivage($table,$id);
  
    }
    $fiche = Fiches::afficher_Fiches();
    $DB = Database::creation_Connexion();
    $Mail = "";
    $Password = "";

    
 

    $vue = new Vues();
                            // Connexion
   if (isset($_POST["Mail"])){
    $Mail = $_POST["Mail"];
    $Password = $_POST["Password"];
    Connexion::login($Mail,$Password);
  }
                        // Verif Connexion
  // if (empty($_SESSION['Id_Utilisateur'])){
  //   header("location: index.php");
  // }




                        // Supp fiche


  if (isset($_POST["Titre"])){
    $add_fiche = new Fiches;
    $add_fiche->creation_Fiche($_POST);
    $add_fiche->save_Fiche();
  }


var_dump($_POST);
var_dump($_SESSION);
  

        echo $vue->generateView_interface($fiche);

      
?>