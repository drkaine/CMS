<?php
	
	class MDP
	{

		static function generationMDP()
		{
			$tmpMDP = "";
			$rand = 0;
			for ($i=0; $i < 15; $i++) 
			{ 
				$rand = chr(rand(33,126));
				$tmpMDP .= $rand;
			}
			return $tmpMDP;
		}

		static function hachage($mdp)
		{
			password_hash($mdp);
		}
	}