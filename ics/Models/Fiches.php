<?php

	class Fiches
	{

		function creation_Fiche($fiche)
		{
	
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
			// self::creation_Fiche_Competence();
		}

		function modification_Fiche()
		{
		
			if(Database::modification_Fiche($this))
			{
				return true;
			}
			else
			{
				return false;
			}
			// self::supression_Fiche_Competence();
			// self::creation_Fiche_Competence();
		}

		static function afficher_Fiches()
		{
			return Database::afficher("fiches", $archive = NULL);
		}

		static function hydrate($id)
		{
			return Database::afficher_Info("fiches", "Id_Fiches", $id);
		}

		// static function creation_Fiche_Competence()
		// {
		// 	Database::creation_Fiche_Competence($this);
		// }

		// function supression_Fiche_Competence()
		// {
		// 	Database::supression_Fiche_Competence($this);
		// }

		// function getCompetence($id)
		// {
		// 	Database::getCompetence($id);
		// }

	}