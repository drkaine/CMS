<?php

	class Fichier
	{	
		static $pathFile = "fichier/";
        static $fileAutorise = ["fichier/pdf"];

		static function supression_Fichier($fileId)
		{
			$contentDir = scandir(self::$pathFile);
            for ($i=0; $i < sizeof($contentDir); $i++) 
            { 
                if($contentDir[$i] != "." && $contentDir[$i] != "..")
                {
                    $tmp = explode(".", $contentDir[$i])[0];
                    if($tmp == $fileId)
                    {
                        unlink(self::$pathImg.$contentDir[$i]);
                    }
                }
            }
            return true;
		}

		static function ajout_Fichier($file)
		{
			$tmp = explode(".", $file->File["name"]);
            $ext = ".pdf";
            $nameFile = $file->Titre.$ext;
            return move_uploaded_file($file->File['tmp_name'], self::$pathFile.$nameFile);
		}

		static function modification_Fichier($file)
		{
			self::supression_Fichier($file->Id_Fiche);
			self::ajout_Fichier($file);
		}

		static function afficher_Fichier($file)
		{
			return self::$pathFile . $file->Id_Fiche . "pdf";
		}

	}