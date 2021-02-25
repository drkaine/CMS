<?php

	class Connexion
	{

		static function login($mail,$password)
		{
			$comp = Database::afficher_Info("utilisateurs", "Mail", $mail);
			if($comp === false)
			{
				return "Couple mail et mot de passe incorrect";
			}
			else if ($comp->Mail == $mail and $comp->Mot_De_Passe == $password)
			{
				return $comp->Niveau;
			}
			else
			{
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

		function session()
		{

		}

		function coockie()
		{

		}
		
	}