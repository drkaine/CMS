<?php
session_start();
require("Models/Autoloader.php");
    Autoloader::register();
    
   
    if (isset($_POST["Oui"])){
      $table= "utilisateurs";
      $id = $_POST["ID"];
   
      Archive::archivage($table,$id);
  
    }
    $user = Utilisateurs::afficher_Utilisateurs();
    $DB = Database::creation_Connexion();

    $vue = new Vues();
   
                        // Verif Connexion
  // if (empty($_SESSION['Id_Utilisateur'])){
  //   header("location: index.php");
  // }




                        // Supp fiche

  if (isset($_POST["Oui"])){
    echo "Element bien supprimer";
  }
  if (isset($_POST["Nom"])){
      $utilisateur = new Utilisateurs;
      $utilisateur->creation_Utilisateur($_POST);
      $utilisateur->sauvegarde_Utilisateur();   
  }
        echo $vue->generateView_utilisateur($user);
var_dump($_POST);
      
?>