<?php

	class Verification
	{
		///// secu formulaire ajout utilisateur ///////
		static function verificationIdentifiant($P)
		{
			$erreurs = null;
			if(!empty($P["mail"]))
			{
				if(!filter_var($P["mail"],FILTER_VALIDATE_EMAIL))
				{
					$erreurs[] = "InvalidateEmail";
				}
			}
			else if(empty($P["Nom"]))
			{
				$erreurs[] = "NomNull";
			}
			else if(empty($P["Prenom"]))
			{
				$erreurs[] = "PrenomNull";
			}
			else if(empty($P["Mail"]))
			{
				$erreurs[] = "MailNull";
			}
			else if(empty($P["Mot_de_passe"]))
			{
				$erreurs[] = "MDPNull";
			}
			else if(strlen($P["Mot_de_passe"])>10)
			{
				//$erreurs[] = "MDPLong";
				echo 'Votre mot de passe est trop long';
			}


			if($erreurs != null)
			{
				$post = array();
        		foreach($P as $key => $value){
		            $post[] = $key."=".$value;
		        }
		        header("Location: utilisateur.php?page=inscription&erreurs=".implode("--", $erreurs)."&".implode("&", $post));
		        exit;
			}
			else
			{
				if (User::createUser($P))
				{
					User::createUser($P);
					header("Location: utilisateur.php?page=inscriptionreussi");
					exit;
				}
				else
				{
					header("Location : utilisateur.php?page=inscription&erreur=nonEnregistre");
				}
			}
		}


		///// secu formulaire ajout fiches métiers ///////
		static function verificationMetier($P)
		{
			$erreurs = null;
			if(!empty($P["titre"]))
			{
				if(empty($P["titre"]))
				{
					$erreurs[] = "Invalidatetitre";
				}
			}
			else if(empty($P["rom"]))
			{
				$erreurs[] = "romNull";
			}
			else if(strlen($P["rom"])>5)
			{
				
				echo 'Votre code ROM est trop long';
			}
			else if(empty($P["descriptionc"]))
			{
				$erreurs[] = "DescriptioncNull";
			}
			else if(empty($P["descriptiond"]))
			{
				$erreurs[] = "descriptiondNull";
			}

			if($erreurs != null)
			{
				$post = array();
				foreach($P as $key => $value){
					$post[] = $key."=".$value;
				}
				header("Location: fiche.php?page=inscription&erreurs=".implode("--", $erreurs)."&".implode("&", $post));
				exit;
			}
			else
			{		
				if (Database::creation_Fiche($P))
				{
					Database::creation_Fiche($P);
					header("Location: fiche.php?page=creationDeFicheReussi");
					exit;
				}
				else
				{
					header("Location : fiche.php?page=inscription&erreur=nonEnregistre");
				}
			}
		}


	}
