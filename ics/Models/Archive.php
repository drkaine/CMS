<?php

	class Archive 
	{

		static function archivage($table, $id, $archive = 1)
		{
			Database::archivage($table, $id, $archive);
		}

		static function afficher_Archive($table)
		{
			return Database::afficher($table, 1);
		}

		static function afficher_Info_Archive($table, $id, $valeur)
		{
			return Database::afficher_Info($table; $id, $valeur);
		}
	}