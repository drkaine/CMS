<?php
	require("Database.php");
	require("MDP.php");
	require("Mail.php");
	class Utilisateurs
	{

		function creation_Utilisateur($user)
		{			
            foreach($user as $attribut => $valeur)
            {
            	if($attribut == "Niveau")
            	{
            		if($valeur == "Null")
            		{
            			$this->$attribut = Null;
            		}
                	$this->$attribut = $valeur;
            	}
            	$this->$attribut = $valeur;
			}
			if(!in_array("Mot_De_Passe", $user))
        	{
        		$this->Mot_De_Passe = MDP::GenerationMDP($valeur);
        		Mail::creation_Mot_De_Passe($this->Mail,$this->Mot_De_Passe);
        		$this->Mot_De_Passe = MDP::hachage($this->Mot_De_Passe);
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

	$user = ["Nom"=>"h","Prenom"=>"h","Mail"=>"azz@ics.com","Niveau"=>"Null"];
    $u = new Utilisateurs();
    $u->creation_Utilisateur($user);
    var_dump($u->sauvegarde_Utilisateur());