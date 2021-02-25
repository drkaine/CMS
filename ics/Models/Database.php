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
    			$sql = "SELECT * FROM $table WHERE `Archive` = :archive";
    		}
            $data = self::$conn->prepare($sql);
            $data->bindValue(":archive", $archive);
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
    			self::$conn->beginTransaction();
    			$sql = "INSERT INTO `fiches` (`Titre`, `Code_ROM`, `Description_Courte`, `Description_Detaille`, `Photo`, `Fichier`, `Archive`) VALUES (:Titre, :Code_ROM, :Description_Courte, :Description_Detaille, :Photo, :Fichier, :Archive)";

    			 $req = self::$conn->prepare($sql);
                $req->bindValue(":Titre", $fiche->Titre);
                $req->bindValue(":Code_ROM", $fiche->Code_ROM);
                $req->bindValue(":Description_Courte", $fiche->Description_Courte);
                $req->bindValue(":Description_Detaille", $fiche->Description_Detaille);
                $req->bindValue(":Photo", $fiche->Photo);
                $req->bindValue(":Fichier", $fiche->Fichier);
                $req->bindValue(":Archive", $fiche->Archive);

                $req->execute();
                
                $fiche->Id_Fiche = self::$conn->lastInsertId();
                self::creation_Fiche_Competence($fiche);
               
                self::$conn->commit();
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
                self::$conn->beginTransaction();
                
                $sql = "UPDATE `fiches` SET `Titre` = :Titre, `Code_ROM` = :Code_ROM, `Description_Courte` = :Description_Courte, `Description_Detaille` = :Description_Detaille, `Photo` = :Photo, `Fichier` = :Fichier, `Archive` = :Archive WHERE `fiches`.`Id_Fiche` = :Id_Fiche ";
                
                $req = self::$conn->prepare($sql);
                $req->bindValue(":Id_Fiche", $fiche->Id_Fiche);
                $req->bindValue(":Titre", $fiche->Titre);
                $req->bindValue(":Code_ROM", $fiche->Code_ROM);
                $req->bindValue(":Description_Courte", $fiche->Description_Courte);
                $req->bindValue(":Description_Detaille", $fiche->Description_Detaille);
                $req->bindValue(":Photo", $fiche->Photo);
                $req->bindValue(":Fichier", $fiche->Fichier);
                $req->bindValue(":Archive", $fiche->Archive);

                $req->execute();

                self::supression_File_Competence($fiche);

                self::creation_File_Competence($fiche);
                
                self::$conn->commit();
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
    			$sql = "INSERT INTO `utilisateurs` (`Id_Utilisateur`, `Nom`, `Prenom`, `Mail`, `Archive`, `Niveau`, `Mot_De_Passe`) VALUES (:Nom, :Prenom, :Mail, :Archive, :Niveau, :Mot_De_Passe)";

    			 $req = self::$conn->prepare($sql);
                
                $req->bindValue(":Nom", $user->Nom);
                $req->bindValue(":Prenom", $user->Prenom);
                $req->bindValue(":Mail", $user->Mail);
                $req->bindValue(":Archive", $user->Archive);
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
                $sql = "UPDATE `utilisateurs` SET  `Nom` = :Nom, `Prenom` = :Prenom, `Mail` = :Mail, `Archive` = :Archive, `Niveau` = :Niveau, `Mot_De_Passe` = :Mot_De_Passe WHERE `utilisateur`.`Id_Utilisateur` = :Id_Utilisateur ";
                
                $req = self::$conn->prepare($sql);
                $req->bindValue(":Id_Utilisateur", $user->Id_Utilisateur);
                $req->bindValue(":Nom", $user->Nom);
                $req->bindValue(":Prenom", $user->Prenom);
                $req->bindValue(":Mail", $user->Mail);
                $req->bindValue(":Archive", $user->Archive);
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
                $sql = "UPDATE $table SET `Archive` = :archive WHERE `Id_" . substr($table, strlen($table)-1) ."` = :Id ";
                
                $req = self::$conn->prepare($sql);
                $req->bindValue(":Id", $id);
                $req->bindValue(":Archive", $archive);
                $req->execute();
                return true;
            } 
            catch(PDOException $e)
            {
                return false;
            }
    	}

    	// static function creation_UtilisateurA($user)
    	// {
    	// 	self::creation_Connexion();
    	// 	try 
    	// 	{
    	// 		$sql = "INSERT INTO `utilisateurs` (`Nom`, `Prenom`, `Mail`, `Archive`, `Niveau`, `Mot_De_Passe`) VALUES (:Nom, :Prenom, :Mail, :Archive, :Niveau, :Mot_De_Passe)";

    	// 		 $req = self::$conn->prepare($sql);
                
     //            $req->bindValue(":Nom", $user["Nom"]);
     //            $req->bindValue(":Prenom", $user["Prenom"]);
     //            $req->bindValue(":Mail", $user["Mail"]);
     //            $req->bindValue(":Archive", $user["Archive"]);
     //            $req->bindValue(":Niveau", $user["Niveau"]);
     //            $req->bindValue(":Mot_De_Passe", $user["Mot_De_Passe"]);
     //            $req->execute();
                
     //            $user["Id_Utilisateur"] = self::$conn->lastInsertId();
                
     //            return true;	
    	// 	} 
    	// 	catch (Exception $e) 
    	// 	{
    	// 		return false;
    	// 	}
    	// }

    	// static function modification_UtilisateurA($user)
    	// {
    	// 	self::creation_Connexion();
    	// 	try
     //        {                
     //            $sql = "UPDATE `utilisateurs` SET `Nom` = :Nom, `Prenom` = :Prenom, `Mail` = :Mail, `Archive` = :Archive, `Niveau` = :Niveau, `Mot_De_Passe` = :Mot_De_Passe WHERE `utilisateurs`.`Id_Utilisateur` = :Id_Utilisateur ";
                
     //            $req = self::$conn->prepare($sql);
     //            $req->bindValue(":Id_Utilisateur", $user["Id_Utilisateur"]);
     //            $req->bindValue(":Nom", $user["Nom"]);
     //            $req->bindValue(":Prenom", $user["Prenom"]);
     //            $req->bindValue(":Mail", $user["Mail"]);
     //            $req->bindValue(":Archive", $user["Archive"]);
     //            $req->bindValue(":Niveau", $user["Niveau"]);
     //            $req->bindValue(":Mot_De_Passe", $user["Mot_De_Passe"]);

     //            $req->execute();
     //            return true;
     //        } 
     //        catch(PDOException $e)
     //        {
     //            return false;
     //        }
    	// }

    	// static function supression_Fiche_CompetenceA($fiche)
     //    {
     //    	self::creation_Connexion();
     //    	$sql = "DELETE FROM `fiche_competence` WHERE `Id_Fiche` = :Id_Fiche";
     //        $req = self::$conn->prepare($sql);
     //        $req->bindValue(":Id_Fiche", $fiche["Id_Fiche"]);
     //        $req->execute();
     //    }   

    	// static function creation_Fiche_CompetenceA($fiche)
     //    {
     //    	self::creation_Connexion();
     //    	$sqlI = "INSERT INTO `fiche_competence` (`Id_Fiche`, `Id_Competence`) VALUES (:Id_Fiche, :Id_Competence)";
     //            $reqI = self::$conn->prepare($sqlI);

     //        foreach($fiche["Id_Competence"] as $competence){
     //            $reqI->bindValue(":Id_Fiche", $fiche["Id_Fiche"]);
     //            $reqI->bindValue(":Id_Competence", $competence);
     //            $reqI->execute();
     //        }
     //    }

    	// static function creation_FicheA($fiche)
    	// {
    	// 	self::creation_Connexion();

    	// 	try 
    	// 	{
    	// 		self::$conn->beginTransaction();
    	// 		$sql = "INSERT INTO `fiches` (`Titre`, `Code_ROM`, `Description_Courte`, `Description_Detaille`, `Photo`, `Fichier`, `Archive`) VALUES (:Titre, :Code_ROM, :Description_Courte, :Description_Detaille, :Photo, :Fichier, :Archive)";

    	// 		 $req = self::$conn->prepare($sql);
     //            $req->bindValue(":Titre", $fiche["Titre"]);
     //            $req->bindValue(":Code_ROM", $fiche["Code_ROM"]);
     //            $req->bindValue(":Description_Courte", $fiche["Description_Courte"]);
     //            $req->bindValue(":Description_Detaille", $fiche["Description_Detaille"]);
     //            $req->bindValue(":Photo", $fiche["Photo"]);
     //            $req->bindValue(":Fichier", $fiche["Fichier"]);
     //            $req->bindValue(":Archive", $fiche["Archive"]);

     //            $req->execute();
                
     //            $fiche["Id_Fiche"] = self::$conn->lastInsertId();
     //            Database::creation_Fiche_CompetenceA($fiche);
               
     //            self::$conn->commit();
     //            return true;
    			
    	// 	} 
    	// 	catch (Exception $e) 
    	// 	{
    	// 		self::$conn->rollBack();
    	// 		return false;
    	// 	}
    	// }

    	// static function modification_FicheA($fiche)
    	// {
    	// 	self::creation_Connexion();
     //        try
     //        {
     //            self::$conn->beginTransaction();
                
     //            $sql = "UPDATE `fiches` SET `Titre` = :Titre, `Code_ROM` = :Code_ROM, `Description_Courte` = :Description_Courte, `Description_Detaille` = :Description_Detaille, `Photo` = :Photo, `Fichier` = :Fichier, `Archive` = :Archive WHERE `fiches`.`Id_Fiche` = :Id_Fiche ";
                
     //            $req = self::$conn->prepare($sql);
     //            $req->bindValue(":Id_Fiche", $fiche["Id_Fiche"]);
     //            $req->bindValue(":Titre", $fiche["Titre"]);
     //            $req->bindValue(":Code_ROM", $fiche["Code_ROM"]);
     //            $req->bindValue(":Description_Courte", $fiche["Description_Courte"]);
     //            $req->bindValue(":Description_Detaille", $fiche["Description_Detaille"]);
     //            $req->bindValue(":Photo", $fiche["Photo"]);
     //            $req->bindValue(":Fichier", $fiche["Fichier"]);
     //            $req->bindValue(":Archive", $fiche["Archive"]);

     //            $req->execute();

     //            Database::supression_Fiche_CompetenceA($fiche);

     //            Database::creation_Fiche_CompetenceA($fiche);
                
     //            self::$conn->commit();
     //            return true;
     //        } 
     //        catch(PDOException $e)
     //        {
     //            self::$conn->rollBack();
     //            return false;
     //        }
     //    }
    }

    // $user = ["Id_Utilisateur"=>1,"Nom"=> "Jpp", "Prenom" => "Jpp", "Mail"=>"jPPy@ics.com", "Archive"=>1, "Niveau"=>1,"Mot_De_Passe" => "1243"];
    // $fiche = ["Id_Fiche"=> 9, "Titre" => "k", "Code_ROM"=>"k", "Description_Courte"=>"k","Description_Detaille"=>"ljgkhfcugjvhkjblovi", "Photo"=>null, "Fichier"=>null, "Archive"=>null ,"Id_Competence"=>[4]];
    // var_dump( Database::afficher_Utilisateurs());
    // var_dump(Database::afficher_Info_Utilisateur(1));
	// var_dump(Database::creation_UtilisateurA($user));
	// var_dump(Database::afficher_Info_Utilisateur(1));
	// Database::modification_UtilisateurA($user);
	// Database::creation_Fiche_CompetenceA($fiche);
	// var_dump(Database::getCompetence(1));
	// var_dump(Database::afficher_Info_Fiche(1));
	// var_dump(Database::afficher_Fiches(NULL));
	// var_dump(Database::afficher_Fiches(1));
	// Database::creation_FicheA($fiche);
	// Database::modification_FicheA($fiche);
	// var_dump(Database::afficher_Info_Utilisateur("Id_Utilisateur", 1));
	// var_dump(Database::afficher_Info_Utilisateur("Mail", "E@ics.com"));