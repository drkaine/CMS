<?php

	class Fiches
	{

		static function creation_Fiche($fiche)
		{
			$erreurs = [];
            foreach($fiche as $attribut => $valeur)
            {
                $this->$attribut = $valeur;
			}
			return true;
		}

		static function save_Fiche()
		{
			$bdd = Database::creation_Fiche($this);
			self::creation_Fiche_Competence();
		}

		static function modification_Fiche()
		{
			if(Database::modification_Fiche($this) and self::supression_Fiche_Competence() and self::creation_Fiche_Competence())
			{
				return true;
			}
			else
			{
				return false;
			}
		}

		static function afficher_Fiches()
		{
			return Database::afficher("fiches", $archive = NULL);
		}

		static function hydrate($id)
		{
			return Database::afficher_Info("fiches", "Id_Fiches", $id);
		}

		static function creation_Fiche_Competence()
		{
			if(Database::creation_Fiche_Competence($this))
			{
				return true;
			}
			else
			{
				return false;
			}
		}

		static function supression_Fiche_Competence()
		{
			if(Database::supression_Fiche_Competence($this))
			{
				return true;
			}
			else
			{
				return false;
			}
		}

		static function getCompetence($id)
		{
			if(Database::getCompetence($id))
			{
				return true;
			}
			else
			{
				return false;
			}
		}

		static function modification_Mot_De_Passe($mail, $mdp, 1)
		{
			Database::modification_Mot_De_Passe($mail, $mdp, 1);
		}

	}