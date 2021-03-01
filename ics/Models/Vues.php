<?php 
  
    class Vues{

                    
                // Generate  Page  login

                function generateView_login(){

                    $template = file_get_contents("Vues/template.tpl");

                        $accueil = file_get_contents("Vues/accueil.tpl");

                        $login = file_get_contents("Vues/login.tpl");


                        $template = str_replace("<!--ContentView-->", $accueil, $template);
                        return str_replace("<!--baniere-->", $login, $template);
                }

                        // Generate Page Fiche

                function generateView_fiche($fiche,$input,$admin){
                        $ContentView ="";

                         $template = file_get_contents("Vues/template.tpl");

                        $temp_fich = file_get_contents("Vues/fiche.tpl");

                        if($admin == "Super_Admin"){
                                $baniere = file_get_contents("Vues/bar_nav_admin.tpl");
                                 }
                        else{
                                $baniere = file_get_contents("Vues/bar_nav.tpl");  
                        }


                        foreach($fiche as $fiches){

                                if( $fiches->Id_Fiche == $input){

                                $c = str_replace("<!--Titre-->", $fiches->Titre, $temp_fich);
                                $c = str_replace("<!--ROM-->", $fiches->Code_ROM, $c);  
                                $c = str_replace("<!--Description_Courte-->", $fiches->Description_Courte, $c);
                                $c = str_replace("<!--Description_Detaille-->", $fiches->Description_Detaille, $c);  
                                $c = str_replace("<!--Photo-->", $fiches->Photo, $c);
                                $ContentView .= $c;
                                
                        }

                       
                }
                $template = str_replace("<!--ContentView-->", $ContentView, $template);
                return str_replace("<!--baniere-->", $baniere, $template);
        }           // Generate View Interface

                function generateview_interface($fiche,$admin){              
                        $ContentView = "";

                        $Message = '<h1 class="titre_accueil">Bienvenue dans le gestionnaire de fiches metiers du CSM</h1>';

                       $template = file_get_contents("Vues/template.tpl");                                     
                       $interface = file_get_contents("Vues/interface.tpl"); 
                       
                       if($admin == "Super_Admin"){
                                $baniere = file_get_contents("Vues/bar_nav_admin.tpl");
                                 }
                        else{
                                $baniere = file_get_contents("Vues/bar_nav.tpl");  
                        }

                        foreach($fiche as $fiches){
                                $c = str_replace("<!--Titre-->", $fiches->Titre, $interface);
                                $c = str_replace("<!--ROM-->", $fiches->Code_ROM, $c);
                                $c = str_replace("<!--ID-->", $fiches->Id_Fiche, $c);  
                                $ContentView .= $c;
                        }
                     
                        $template = str_replace("<!--Message-->", $Message, $template);
                       $template = str_replace("<!--ContentView-->", $ContentView, $template);
                       return str_replace("<!--baniere-->", $baniere, $template);
                }

                






                        // Supprimer Fiche
                function generateview_supp_fiche($fiche,$input,$admin){              
                    $ContentView="";
                    $template = file_get_contents("Vues/template.tpl");                                       
                      
                    $Supp_fiche = file_get_contents("Vues/supprimer_fiche.tpl");   
                    
                    if($admin == "Super_Admin"){
                        $baniere = file_get_contents("Vues/bar_nav_admin.tpl");
                         }
                else{
                        $baniere = file_get_contents("Vues/bar_nav.tpl");  
                }

                    

                    foreach($fiche as $fiches){

                        if( $fiches->Id_Fiche == $input){

                        $c = str_replace("<!--Titre-->", $fiches->Titre, $Supp_fiche);
                        $c = str_replace("<!--ROM-->", $fiches->Code_ROM, $c);  
                        $c = str_replace("<!--ID-->", $fiches->Id_Fiche, $c);
                        $ContentView .= $c;
                        
                }
        }      
        
                  
                 
                    $template = str_replace("<!--ContentView-->", $ContentView, $template);
                    return str_replace("<!--baniere-->", $baniere, $template);
             }
            

             
                        // Supprimer user
                        function generateview_supp_user($user,$input){              
                                $ContentView="";
                                $template = file_get_contents("Vues/template.tpl");                                       
                                  
                                $Supp_fiche = file_get_contents("Vues/supprimer_user.tpl");   
                                
                                $baniere = file_get_contents("Vues/bar_nav.tpl");
                                
            
                                foreach($user as $users){
            
                                    if( $users->Id_Utilisateur == $input){
            
                                    $c = str_replace("<!--Nom-->", $users->Nom, $Supp_fiche);
                                    $c = str_replace("<!--Prenom-->", $users->Prenom, $c);  
                                    $c = str_replace("<!--ID-->", $users->Id_Utilisateur, $c);
                                    $ContentView .= $c;
                                    
                            }
                    }      
                    
                              
                             
                                $template = str_replace("<!--ContentView-->", $ContentView, $template);
                                return str_replace("<!--baniere-->", $baniere, $template);
                         }
                        // Archives Super Admin

                        function generateview_archives($fiche,$admin){                 
                        $ContentView = "";

                        $Message = '<h1 class="titre_accueil">Archives</h1> ';

                       $template = file_get_contents("Vues/template.tpl");                                     
                       $interface = file_get_contents("Vues/archives.tpl"); 
                       
                       if($admin == "Super_Admin"){
                                $baniere = file_get_contents("Vues/bar_nav_admin.tpl");
                                 }
                        else{
                                $baniere = file_get_contents("Vues/bar_nav.tpl");  
                        }

                        foreach($fiche as $fiches){
                                $c = str_replace("<!--Titre-->", $fiches->Titre, $interface);
                                $c = str_replace("<!--ROM-->", $fiches->Code_ROM, $c);
                                $c = str_replace("<!--ID-->", $fiches->Id_Fiche, $c);  
                                $ContentView .= $c;
                        }
                     
                        $template = str_replace("<!--Message-->", $Message, $template);
                       $template = str_replace("<!--ContentView-->", $ContentView, $template);
                       return str_replace("<!--baniere-->", $baniere, $template);
                }

                

                //  generate view ajout_fiche

                function generateView_ajout_fiche($admin){
                        
                        $template = file_get_contents("Vues/template.tpl");
                        if($admin == "Super_Admin"){
                                $baniere = file_get_contents("Vues/bar_nav_admin.tpl");
                                 }
                        else{
                                $baniere = file_get_contents("Vues/bar_nav.tpl");  
                        }
        
                        $ajout = file_get_contents("Vues/ajout_fiche.tpl"); 

                        $template = str_replace("<!--ContentView-->", $ajout, $template);
                        return str_replace("<!--baniere-->", $baniere, $template);
                }

                                // MODIF FICHE

               function generateView_modif_fiche($fiche,$admin,$id){
                        $ContentView="";
                        $template = file_get_contents("Vues/template.tpl");
                        if($admin == "Super_Admin"){
                                $baniere = file_get_contents("Vues/bar_nav_admin.tpl");
                                }
                        else{
                                $baniere = file_get_contents("Vues/bar_nav.tpl");  
                        }

                        $modif = file_get_contents("Vues/modif_fiche.tpl"); 

                         foreach($fiche as $fiches){

                                if( $fiches->Id_Fiche == $id){
                                      
                                $c = str_replace("<!--Titre-->", $fiches->Titre, $modif);
                                $c = str_replace("<!--ROM-->", $fiches->Code_ROM, $c);  
                                $c = str_replace("<!--Description_Courte-->", $fiches->Description_Courte, $c);
                                $c = str_replace("<!--Description_Detaille-->", $fiches->Description_Detaille, $c);  
                                $c = str_replace("<!--Photo-->", $fiches->Photo, $c);
                                $c = str_replace("<!--ID-->", $fiches->Id_Fiche, $c);
                                $ContentView .= $c;
                                
                        }
                       


                }

                        $template = str_replace("<!--ContentView-->", $ContentView, $template);
                        return str_replace("<!--baniere-->", $baniere, $template);




                

        }



                // generate view reinit_mdp
                function generateView_reinit_mdp($page){

                        $template = file_get_contents("Vues/template.tpl");
                        $baniere = file_get_contents("Vues/bar_nav_admin.tpl");
                        $reinit = file_get_contents("Vues/reinit_mdp.tpl"); 

                        $template = str_replace("<!--ContentView-->", $reinit, $template);
                        $template = str_replace("<--!action_page.php-->", $page, $template);
                        return str_replace("<!--baniere-->", $baniere, $template);

                }

                
                function generateview_utilisateur($users){              
                        $ContentView = "";

                    


                       $template = file_get_contents("Vues/template.tpl");                                       
                       $card = file_get_contents("Vues/card_utilisateur.tpl");   
                       $baniere = file_get_contents("Vues/bar_nav_admin.tpl");
                       $utilisateur = file_get_contents("Vues/utilisateur.tpl");
                      

                        foreach($users as $user){
                                $c = str_replace("<!--Nom-->", $user->Nom, $card);
                                $c = str_replace("<!--Prenom-->", $user->Prenom, $c);
                                $c = str_replace("<!--Mail-->", $user->Mail, $c);
                                $c = str_replace("<!--Niveau-->", $user->Niveau, $c); 
                                $c = str_replace("<!--ID-->", $user->Id_Utilisateur, $c);
                                $ContentView .= $c;
                        }

                
                        $utilisateur = str_replace("<!--user_card-->", $ContentView, $utilisateur);
                       $template = str_replace("<!--ContentView-->", $utilisateur, $template);
                       return str_replace("<!--baniere-->", $baniere, $template);
                }

        
                     // Generate view ajout utilisateur

                     function generateView_ajout_utilisateur(){

                        $template = file_get_contents("Vues/template.tpl");
                        $baniere = file_get_contents("Vues/bar_nav_admin.tpl");    
                        $utilisateur = file_get_contents("Vues/ajout_utilisateur.tpl");
    
    
    
                        
                        $template = str_replace("<!--ContentView-->", $utilisateur, $template);
                                return str_replace("<!--baniere-->", $baniere, $template);
                }

                                                //  MODIF USER

                    function generateView_modif_user($user,$admin,$id){
                        $ContentView="";
                        $template = file_get_contents("Vues/template.tpl");
                        if($admin == "Super_Admin"){
                                $baniere = file_get_contents("Vues/bar_nav_admin.tpl");
                                }
                        else{
                                $baniere = file_get_contents("Vues/bar_nav.tpl");  
                        }

                        $modif = file_get_contents("Vues/modif_utilisateur.tpl"); 

                         foreach($user as $users){

                                if( $users->Id_Utilisateur == $id){
                                      
                                $c = str_replace("<!--Nom-->", $users->Nom, $modif);
                                $c = str_replace("<!--Prenom-->", $users->Prenom, $c);  
                                $c = str_replace("<!--Mail-->", $users->Mail, $c);
                                $c = str_replace("<!--ID-->", $users->Id_Utilisateur, $c);
                                $c = str_replace("<!--MDP-->", $users->Mot_De_Passe, $c);       
                                $ContentView .= $c;
                                
                        }
                       


                }

                        $template = str_replace("<!--ContentView-->", $ContentView, $template);
                        return str_replace("<!--baniere-->", $baniere, $template);


                

        }

        function generateView_ajout_compet($admin,$input){
                $ContentView="";
                $template = file_get_contents("Vues/template.tpl");

                if($admin == "Super_Admin"){
                        $baniere = file_get_contents("Vues/bar_nav_admin.tpl");
                        }
                else{
                        $baniere = file_get_contents("Vues/bar_nav.tpl");  
                }

                $compet = file_get_contents("Vues/compet.tpl"); 


                $conn = new PDO('mysql:host=localhost;dbname=CSM;','root');

                $allsearch = $conn->query('SELECT * FROM competences ORDER BY Id_Competence DESC');

                if(isset($input['q']) AND !empty($input['q'])){
                        $recherche = htmlspecialchars($input['q']);
                        $allsearch = $conn->query('SELECT Savoir_Faire FROM competences WHERE Savoir_Faire LIKE "%'.$recherche.'%" ORDER BY Id_Competence DESC');
                    
                    }
      
                      
                  $i = 0;
                        if($allsearch->rowCount() > 0){
                            
                            while($search = $allsearch->fetch()){

                                $compet = str_replace("<!--compet$i-->", $search["Savoir_Faire"], $compet); 
                                $i++;
                            }
                        }else{
                          
                          echo  " <p>Aucun savoir-faire trouvé</p>";
            
                           
                        }
                    
                        
                $template = str_replace("<!--ContentView-->", $compet, $template);
                return str_replace("<!--baniere-->", $baniere, $template);

                 }

    }