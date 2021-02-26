<?php

	class Fiches
	{

		function creation_Fiche($fiche)
		{
			$erreurs = [];
            foreach($fiche as $attribut => $valeur)
            {
                $this->$attribut = $valeur;
			}
			if(!in_array("Photo", $fiche))
			{
				$this->Photo = Null;
			}
			if(!in_array("Fichier", $fiche))
			{
				$this->Fichier = Null;
			}
			return true;
		}

		function save_Fiche()
		{
			Database::creation_Fiche($this);
			self::creation_Fiche_Competence();
		}

		function modification_Fiche()
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

		function supression_Fiche_Competence()
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

		function getCompetence($id)
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

	}