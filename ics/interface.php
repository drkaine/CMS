<?php
session_start();
require("Models/Autoloader.php");
    Autoloader::register();
                                     // ADD fiche

    if (!empty($_POST["Mail"]))
    {
      $Mail = $_POST["Mail"];
      $Pass = $_POST["Mot_De_Passe"];
      Connexion::login($Mail,$Pass);
  
    }
 
    if (isset($_POST["ajout"])){
       // var_dump($_POST);
      $add_fiche = new Fiches;

      $add_fiche->creation_Fiche($_POST);
       // var_dump($add_fiche);
      // var_dump($_FILES);
      if(isset($_FILES["File"]))
      {
        $add_fiche->File = $_FILES["File"];
      }
      
      $add_fiche->Photo1 = $_FILES["Photo1"];
      // var_dump($add_fiche);
      if(Fichier::ajout_Fichier($add_fiche))
        {
          $add_fiche->Fichier = 1;
        }
      if(Photo::ajout_Photo($add_fiche))
      {
        $add_fiche->Photo = 1;
      }
      $add_fiche->save_Fiche();
      // echo "Fiche bien add";
    }
    if (isset($_POST["modifier"])){
      $modif_fiche = new Fiches;
      $modif_fiche->creation_Fiche($_POST);
      if($modif_fiche->Fichier == 1)
      {
        $modif_fiche->File = $_FILES["File"];
        Fichier::modification_Fichier();
      }
      $modif_fiche->modification_Fiche();
     
      // echo "Fiche bien modif";
    }

                              // arhive fiche
    if (isset($_POST["Oui"])){
      $table= "fiches";
      $id = $_POST["ID"];
      Archive::archivage($table,$id);
  
    }

    $fiche = Fiches::afficher_Fiches();
    $DB = Database::creation_Connexion();
    $Mail = "";
    $Password = "";

  

    $vue = new Vues();
                                                // Connexion

  
  Connexion::relocalisation();
               


                          // IF SUPER ADMIN AFFICHE NAV ADMIN

  echo $vue->generateView_interface($fiche,Connexion::super_Admin());

?>