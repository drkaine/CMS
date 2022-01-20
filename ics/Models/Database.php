<?php 
  
    class Database
    {

    	static $hostname = "localhost";
        static $dbname = "CSM";
        static $userdb = "root";
        static $mdpdb = "";
        static $driverdb = "mysql";

        static $conn;

        static function creation_Connexion()
        {
            if(empty(self::$conn))
            {
                self::$conn = new PDO(self::$driverdb.":host=".self::$hostname.";dbname=".self::$dbname, self::$userdb, self::$mdpdb);
            }
        }  

        static function afficher($table, $archive)
    	{
    		self::creation_Connexion();
    		if($archive == null)
    		{
    			$sql = "SELECT * FROM $table WHERE `Archive` IS NULL";
    		}
    		else
    		{
    			$sql = "SELECT * FROM $table WHERE `Archive` = 1";
    		}
            $data = self::$conn->prepare($sql);
            $data->execute();
            return $data->fetchAll(PDO::FETCH_OBJ);
    	}

    	static function afficher_Info($table, $attribut, $valeur)
    	{
    		self::creation_Connexion();
    		$sql = "SELECT * FROM $table WHERE ". $attribut ." = :valeur";
            $data = self::$conn->prepare($sql);
            $data->bindValue(":valeur", $valeur);
            $data->execute();
            return $data->fetch(PDO::FETCH_OBJ);
    	}

    	
    	static function creation_Fiche($fiche)
    	{
    		self::creation_Connexion();

    		try 
    		{
    			// self::$conn->beginTransaction();
    			$sql = "INSERT INTO `fiches` (`Titre`, `Code_ROM`, `Description_Courte`, `Description_Detaille`, `Photo`, `Fichier`) VALUES (:Titre, :Code_ROM, :Description_Courte, :Description_Detaille, :Photo, :Fichier)";

    			 $req = self::$conn->prepare($sql);
                $req->bindValue(":Titre", $fiche->Titre);
                $req->bindValue(":Code_ROM", $fiche->Code_ROM);
                $req->bindValue(":Description_Courte", $fiche->Description_Courte);
                $req->bindValue(":Description_Detaille", $fiche->Description_Detaille);
                $req->bindValue(":Photo", $fiche->Photo);
                $req->bindValue(":Fichier", $fiche->Fichier);
                

                $req->execute();
                return true;
    			
    		} 
    		catch (Exception $e) 
    		{
    			self::$conn->rollBack();
    			return false;
    		}
    	}

    	static function modification_Fiche($fiche)
    	{
    		self::creation_Connexion();
            try
            {
                $sql = "UPDATE `fiches` SET `Titre` = :Titre, `Code_ROM` = :Code_ROM, `Description_Courte` = :Description_Courte, `Description_Detaille` = :Description_Detaille, `Photo` = :Photo, `Fichier` = :Fichier WHERE Id_Fiche = :Id_Fiche ";
                
                $req = self::$conn->prepare($sql);
                $req->bindValue(":Id_Fiche", $fiche->Id_Fiche);
                $req->bindValue(":Titre", $fiche->Titre);
                $req->bindValue(":Code_ROM", $fiche->Code_ROM);
                $req->bindValue(":Description_Courte", $fiche->Description_Courte);
                $req->bindValue(":Description_Detaille", $fiche->Description_Detaille);
                $req->bindValue(":Photo", $fiche->Photo);
                $req->bindValue(":Fichier", $fiche->Fichier);

                $req->execute();
                return true;
            } 
            catch(PDOException $e)
            {
                self::$conn->rollBack();
                return false;
            }
        }

        static function getCompetence($id)
    	{
    		self::creation_Connexion();

    		$sql = "SELECT  * FROM  `competences` INNER JOIN fiche_competence USING (Id_Competence) WHERE Id_Fiche = :id ";
            $data = self::$conn->prepare($sql);
            $data->bindValue(":id", $id);
            $data->execute();
            return $data->fetchAll(PDO::FETCH_OBJ);
    	}

        static function creation_Fiche_Competence($fiche)
        {
        	self::creation_Connexion();
        	$sqlI = "INSERT INTO `fiche_competence` (`Id_Fiche`, `Id_Competence`) VALUES (:Id_Fiche, :Id_Competence)";
                $reqI = self::$conn->prepare($sqlI);

            foreach($fiche->competence as $competence){
                $reqI->bindValue(":Id_Fiche", $fiche->Id_Fiche);
                $reqI->bindValue(":Id_Competence", $competence);
                $reqI->execute();
            }
        }

        static function supression_Fiche_Competence($fiche)
        {
        	self::creation_Connexion();
        	$sqlD = "DELETE FROM `fiche_competence` WHERE `Id_Fiche` = :Id_Fiche";
            $reqD = self::$conn->prepare($sqlD);
            $reqD->bindValue(":Id_Fiche", $fiche->Id_Fiche);
            $reqD->execute();
        }    

    	static function creation_Utilisateur($user)
    	{
    		self::creation_Connexion();
    		try 
    		{
    			$sql = "INSERT INTO `utilisateurs` (`Nom`, `Prenom`, `Mail`, `Niveau`, `Mot_De_Passe`) VALUES (:Nom, :Prenom, :Mail, :Niveau, :Mot_De_Passe)";

    			 $req = self::$conn->prepare($sql);
                
                $req->bindValue(":Nom", $user->Nom);
                $req->bindValue(":Prenom", $user->Prenom);
                $req->bindValue(":Mail", $user->Mail);
                $req->bindValue(":Niveau", $user->Niveau);
                $req->bindValue(":Mot_De_Passe", $user->Mot_De_Passe);
                $req->execute();
                
                $user->Id_Utilisateur = self::$conn->lastInsertId();
                
                return true;	
    		} 
    		catch (Exception $e) 
    		{
    			return false;
    		}
    	}

    	static function modification_Utilisateur($user)
    	{
    		self::creation_Connexion();
    		try
            {                
                $sql = "UPDATE `utilisateurs` SET  `Nom` = :Nom, `Prenom` = :Prenom, `Mail` = :Mail, `Niveau` = :Niveau, `Mot_De_Passe` = :Mot_De_Passe WHERE Id_Utilisateur = :Id_Utilisateur ";
                
                $req = self::$conn->prepare($sql);
                $req->bindValue(":Id_Utilisateur", $user->Id_Utilisateur);
                $req->bindValue(":Nom", $user->Nom);
                $req->bindValue(":Prenom", $user->Prenom);
                $req->bindValue(":Mail", $user->Mail);
               
                $req->bindValue(":Niveau", $user->Niveau);
                $req->bindValue(":Mot_De_Passe", $user->Mot_De_Passe);

                $req->execute();
                return true;
            } 
            catch(PDOException $e)
            {
                return false;
            }
    	}

    	static function modification_Mot_De_Passe($mail, $mdp, $co = NULL)
    	{
    		self::creation_Connexion();
    		try
            {                
                $sql = "UPDATE `utilisateurs` SET  `Mot_De_Passe` = :Mot_De_Passe, `Connexion` = :co WHERE `mail` = :mail ";
                
                $req = self::$conn->prepare($sql);
                $req->bindValue(":mail", $mail);     
                $req->bindValue(":Mot_De_Passe", $mdp);
                $req->bindValue(":co", $co);
                $req->execute();
                return true;
            } 
            catch(PDOException $e)
            {
                return false;
            }
    	}

    	static function archivage($table, $id, $archive = 1)
    	{
    		self::creation_Connexion();
    		try
            {                
                $sql = "UPDATE $table SET `Archive` = :archive WHERE `Id_" . ucfirst(substr($table, 0, strlen($table)-1)) ."` = :Id ";
         
                $req = self::$conn->prepare($sql);
                $req->bindValue(":Id", $id);
                $req->bindValue(":archive", $archive);
                $req->execute();
                return true;
            } 
            catch(PDOException $e)
            {
                return false;
            }
    	}
    }