<?php

	class Utilisateurs
	{

		static function creation_Utilisateur($user)
		{
			$erreurs = [];
            foreach($fiche as $attribut => $valeur)
            {
                $this->$attribut = $valeur;
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

		static function modification_Utilisateur()
		{
			Database::modification_Utilisateur($this);
		}

		static function sauvegarde_Utilisateur()
		{
			Database::creation_Utilisateur();
		}
	}