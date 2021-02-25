<?php

	class Utilisateur
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

		static function afficher_Utilisateurs($archives = NULL)
		{
			return Database::afficher_Utilisateurs($archive);
		}

		static function hydrate($id)
		{
			return Database::afficher_Info_Utilisateur($id);
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