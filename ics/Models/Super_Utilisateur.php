<?php 
	
	class Super_Utilisateur extends Utilisateur 
	{

		static function creation_Utilisateur($user)
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
                    else if($attribut == "Mot_De_Passe")
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