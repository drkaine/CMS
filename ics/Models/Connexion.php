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
				header("Location: index.php");
			}
			else if ($comp->Mail == $mail && password_verify($password, $comp->Mot_De_Passe))
			{
				$_SESSION['Id_Utilisateur'] = $comp->Id_Utilisateur;
				$_SESSION["Niveau"] = $comp->Niveau;
				$_SESSION["Connexion"] = $comp->Connexion;
				// self::premiere_Connexion();
				return true;
			}
			else
			{
				header("Location: index.php");
				exit;
			}
	
		}

		static function deconnexion(){
			if(isset($POST["Deco"])){

				$Session = array();
				session_destroy();
				header("location: index.php");
			  }  
		}

		static function super_Admin()
		{
			if($_SESSION["Niveau"] == 0 or $_SESSION["Niveau"] == Null)
			{
				header("Location: interface.php");
			}
		}

		static function relocalisation()
		{
			if(empty($_SESSION))
			{
				header("Location: index.php");
			}
			elseif(!empty($_SESSION) and $_SERVER["PHP_SELF"] == "index.php")
			{
				header("Location: interface.php");
			}
		}

		static function premiere_Connexion()
		{
			if($_SESSION["Connexion"] != 1)
			{
				header("Location: premiereConnexion.php");
				exit;
			}
			
		}
		
	}
	// var_dump(Connexion::login("ii@ics.com","hello"));
	// Connexion::relocalisation();
	// Connexion::premiere_Connexion();
	// Connexion::super_Admin();