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

		function __construct($to)
		{
			$this->to = $to;
			$this->mdp = MDP::generationMDP();
			$this->message .= $this->mdp;
			self::envoi();
			self::modification_Mot_De_Passe();
		}

		function envoi()
		{
			mail($this->to, $this->subject, $this->message, $this->from);
		}

		function modification_Mot_De_Passe()
		{
			Database::modification_Mot_De_Passe($this->to,$this->mdp);
		}
	}

	// $mail = new Mail("PPy@ics.com");