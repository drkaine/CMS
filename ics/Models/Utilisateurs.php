<?php

	class Utilisateurs
	{

		function creation_Utilisateur($user)
		{
			$erreurs = [];
            foreach($fiche as $attribut => $valeur)
            {
            	if($attribut == "Mot_De_Passe")
            	{
            		MDP::generationMDP();
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
		}

		static function modification_Mot_De_Passe($mail, $mdp, 1)
		{
			Database::modification_Mot_De_Passe($mail, MDP::hachage($mdp), 1);
		}
	}