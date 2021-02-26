<?php
	
	require("Database.php");
	require("MDP.php");

	class Connexion
	{

		static function login($mail,$password)
		{
			$comp = Database::afficher_Info("utilisateurs", "Mail", $mail);
			var_dump($comp);
			var_dump($comp->Mot_De_Passe);
			var_dump($password);
			var_dump(password_verify($password, $comp->Mot_De_Passe ));
			var_dump($mail);
			if($comp === false)
			{
				return "Couple mail et mot de passe incorrect";
			}
			else if ($comp->Mail == $mail && password_verify($password, $comp->Mot_De_Passe))
			{
				$_SESSION['Id_Utilisateur'] = $comp->Id_Utilisateur;
				return $comp->Niveau;
			}
			else
			{
				return "Couple mail et mot de passe incorrect 2";
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
	var_dump(Connexion::login("ii@ics.com","hello"));