<?php
	// require("Database.php");
	// require("MDP.php");
	class Utilisateurs
	{

		function creation_Utilisateur($user)
		{
			
            foreach($user as $attribut => $valeur)
            {
            	if($attribut == "Mot_De_Passe")
            	{
            		$this->$attribut = MDP::generationMDP();
            	}
            	else
            	{
                	$this->$attribut = $valeur;
                }
			}
			return true;
		}

		static function afficher_Utilisateurs()
		{
			return Database::afficher("utilisateurs", $archive = NULL);
		}

		static function hydrate($attribut, $valeur)
		{
			switch ($attribut) 
			{
				case 'Id_Utilisateur':
					return Database::afficher_Info("utilisateurs", "Id_Utilisateur", $valeur);
				
				default:
					return Database::afficher_Info("utilisateurs", "Mail", $valeur);
					break;
			}
		}

		function modification_Utilisateur()
		{
			Database::modification_Utilisateur($this);
		}

		function sauvegarde_Utilisateur()
		{
			Database::creation_Utilisateur($this);
			return true;
		}

		static function modification_Mot_De_Passe($mail, $mdp, $co = 1)
		{
			Database::modification_Mot_De_Passe($mail, MDP::hachage($mdp), $co);
		}
	}

	// $user = ["Nom"=>"h","Prenom"=>"h","Mail"=>"h@ics.com","Niveau"=>null,"Archive"=>Null,"Mot_De_Passe"=>"h"];
 //    $u = new Utilisateurs();
 //    $u->creation_Utilisateur($user);
 //    var_dump($u->sauvegarde_Utilisateur());