<?php

	// require("Database.php");
	// require("MDP.php");

	class Mail
	{
		protected $to;
		protected $from = "From : not_reply@csm.com \r\n";
		protected $subject = "Mot de passe oublié ";
		protected $message = "Vous avez demandé un nouveau mot de passe, en voici un temporaire : ";
		protected $mdp;

		function __construct($to, $action)
		{
			$this->to = $to;
			$this->mdp = MDP::generationMDP();
			$this->message .= $this->mdp;
			self::envoi();
			self::modification_Mot_De_Passe();
		}

		static function creation_Mot_De_Passe($t, $m)
		{
			mail($t,"Bienvenu dans le CSM, voici votre mot de passe : " . $m, "From : not_reply@csm.com \r\n");
		}

		function envoi()
		{
			mail($this->to, $this->subject, $this->message, $this->from);
		}

		function modification_Mot_De_Passe()
		{
			Database::modification_Mot_De_Passe($this->to,MDP::hachage($this->mdp));
		}
	}

	// $mail = new Mail("PPy@ics.com");