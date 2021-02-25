<?php

	class Utilisateur
	{

		static function creation_Fiche($fiche)
		{
			$erreurs = [];
            foreach($fiche as $attribut => $valeur)
            {
                if(!empty($valeur))
                {
                    if($attribut == "Mail")
                    {
                        if(empty($valeur))
                        {
                            $erreurs[] = $attribut;
                        } 
                        else 
                        {
                            $this->$attribut = $valeur;
                        }
                    } 
                    else 
                    {
                        $this->$attribut = $valeur;
                    }
                    
                } 
                else 
                {
                    $erreurs[] = $attribut;
                }
            }
            
            if(empty($erreurs)) 
            {
                return true;
            } 
            else 
            {
                return $erreurs;
            }
		}

		static function save_Fiche()
		{
			$bdd = Database::creation_Fiche($this);
			Utilisateur::creation_Fiche_Competence();
		}

		static function modification_Fiche()
		{
			if(Database::modification_Fiche($this) and Utilisateur::supression_Fiche_Competence() and Utilisateur::creation_Fiche_Competence())
			{
				return true;
			}
			else
			{
				return false;
			}
		}

		static function supression_Fiche()
		{
			if(Database::supression_Fiche($this) and Utilisateur::creation_Fiche_Competence())
			{
				return true;
			}
			else
			{
				return false;
			}
		}

		static function afficher_Fiches($archive = NULL)
		{
			return Database::afficher_Fiches($archive);
		}

		static function hydrate($id)
		{
			return Database::afficher_Info_Fiche($id);
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
	}