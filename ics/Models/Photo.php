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
			$tmp = explode(".", $img->Photo1["name"]);
			// $tmp2 = explode(".", $img->Photo2["name"]);
			// $tmp3 = explode(".", $img->Photo3["name"]);
            $ext = $tmp[sizeof($tmp)-1];
            for($i = 1; $i <4; $i++) 
            {
            $nameFile = $img->Code_ROM. "_". $i .".".$ext;
             	move_uploaded_file($img->Photo['tmp_name'], self::$pathImg.$nameFile);
            }
            return true;
		}

		// static function afficher_Photo($img)
		// {
		// 	// $photo = "";
		// 	foreach ($img->["Photo"] as $value) 
		// 	{
		// 		$photo[]= self::$pathImg .  $value . ".pdf";
		// 	}
		// 	return $photo;
		// }

	}
