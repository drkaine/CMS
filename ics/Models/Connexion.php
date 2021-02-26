<?php
	
	// require("Database.php");
	// require("MDP.php");

	class Connexion
	{

		static function login($mail,$password)
		{
			$comp = Database::afficher_Info("utilisateurs", "Mail", $mail);
			// var_dump($comp);
			// var_dump($comp->Mot_De_Passe);
			// var_dump($password);
			// var_dump(password_verify($password, $comp->Mot_De_Passe ));
			// var_dump($mail);
			if($comp === false)
			{
				header("Location : index.php");
				return "Couple mail et mot de passe incorrect";
			}
			else if ($comp->Mail == $mail && password_verify($password, $comp->Mot_De_Passe))
			{
				$_SESSION['Id_Utilisateur'] = $comp->Id_Utilisateur;
				$_SESSION['Niveau'] = $comp->Niveau;
				header("Location : interphace.php");
				return true;
			}
			else
			{
				header("Location : index.php");
				return "Couple mail et mot de passe incorrect";
			}
	
		}

		static function Deconexion($POST,$Session ){

			if(isset($POST["Deco"])){

				$Session = array();
				session_destroy();
				header("location: index.php");
		  
			  }
		  
		}
		
	}
	// var_dump(Connexion::login("ii@ics.com","hello"));