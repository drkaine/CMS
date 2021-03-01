<?php
session_start();
require("Models/Autoloader.php");
    Autoloader::register();
           // Supp fiche

  if (isset($_POST["Oui"])){
    echo "Element bien supprimer";
  }
  if (isset($_POST["ajout"])){
      $utilisateur = new Utilisateurs;
      $utilisateur->creation_Utilisateur($_POST);
      $utilisateur->sauvegarde_Utilisateur();   
  } 
  if (isset($_POST["modif_user"])){
    $utilisateur = new Utilisateurs;
    $utilisateur->creation_Utilisateur($_POST, 1);
    $utilisateur->modification_Utilisateur();   
}
   
    if (isset($_POST["Oui"])){
      $table= "utilisateurs";
      $id = $_POST["ID"];
   
      Archive::archivage($table,$id);
  
    }
    $user = Utilisateurs::afficher_Utilisateurs();
    $DB = Database::creation_Connexion();

    $vue = new Vues();
   
                        // Verif Connexion
                        Connexion::relocalisation();




                 


        echo $vue->generateView_utilisateur($user);

      
?>