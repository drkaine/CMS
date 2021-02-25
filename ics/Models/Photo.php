<?php

	class Photo
	{
		static $pathImg = "img/";
        static $imgAutorise = ["img/png","img/jpeg","img/bpm","img/tiff","img/gif"];

		static function supression_Photo($imgId)
		{
			$contentDir = scandir(self::$pathImg);
            for ($i=0; $i < sizeof($contentDir); $i++) 
            { 
                if($contentDir[$i] != "." && $contentDir[$i] != "..")
                {
                    $tmp = explode(".", $contentDir[$i])[0];
                    if($tmp == $imgId)
                    {
                        unlink(self::$pathImg.$contentDir[$i]);
                    }
                }
            }
            return true;
		}

		static function modification_Photo($img)
		{
			self::supression_Photo($img->Id_Fiche);
			self::ajout_Photo($img);
		}

		static function ajout_Photo($img)
		{
			$tmp = explode(".", $img->Photo["name"]);
            $ext = $tmp[sizeof($tmp)-1];
            foreach ($img->Photo as $key => $value) 
            {
            	$nameFile = $img->Id_Fiche.".". $key .$ext;
             	move_uploaded_file($img->Photo['tmp_name'], self::$pathImg.$nameFile);
            }
            return true;
		}

		static function afficher_Photo($img)
		{
			$photo = [];
			foreach ($img->["Photo"] as $value) 
			{
				$photo[]= self::$pathImg . $img->("Id_Fiche") . "_" . $value;
			}
			return $photo;
		}

	}
