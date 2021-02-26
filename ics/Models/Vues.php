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

                function generateView_fiche($fiche,$input){
                        $ContentView ="";

                         $template = file_get_contents("Vues/template.tpl");

                        $temp_fich = file_get_contents("Vues/fiche.tpl");

                        $baniere = file_get_contents("Vues/bar_nav.tpl");

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

                function generateview_interface($fiche){              
                        $ContentView = "";

                        $Message = '<h1 class="marge">Bievenue dans le gestionaire de fiches metiers du CSM </h1> ';

                       $template = file_get_contents("Vues/template.tpl");                                       
                       $interface = file_get_contents("Vues/interface.tpl");   
                       $baniere = file_get_contents("Vues/bar_nav.tpl");

                     

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
                function generateview_supp_fiche($fiche,$input){              
                    $ContentView="";
                    $template = file_get_contents("Vues/template.tpl");                                       
                      
                    $Supp_fiche = file_get_contents("Vues/supprimer_fiche.tpl");   
                    
                    $baniere = file_get_contents("Vues/bar_nav.tpl");
                    

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

                        function generateview_archives(){              

                            $template = file_get_contents("Vues/template.tpl");                                       
                              
                            $archives = file_get_contents("Vues/archives.tpl");   
                            
                            $baniere = file_get_contents("Vues/bar_nav_admin.tpl");
                             
                          
                         
                            $template = str_replace("<!--ContentView-->", $archives, $template);
                            return str_replace("<!--baniere-->", $baniere, $template);
                     }


                //  generate view ajout_fiche

                function generateView_ajout_fiche(){

                        $template = file_get_contents("Vues/template.tpl");
                        $baniere = file_get_contents("Vues/bar_nav_admin.tpl");
                        $ajout = file_get_contents("Vues/ajout_fiche.tpl"); 

                        $template = str_replace("<!--ContentView-->", $ajout, $template);
                        return str_replace("<!--baniere-->", $baniere, $template);
                }

                // generate view reinit_mdp
                function generateView_reinit_mdp(){

                        $template = file_get_contents("Vues/template.tpl");
                        $baniere = file_get_contents("Vues/bar_nav_admin.tpl");
                        $reinit = file_get_contents("Vues/reinit_mdp.tpl"); 

                        $template = str_replace("<!--ContentView-->", $reinit, $template);
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

                function generateView_modif_utilisateur($users){
                        $ContentView="";
                        $template = file_get_contents("Vues/template.tpl");
                        $baniere = file_get_contents("Vues/bar_nav_admin.tpl");    
                        $utilisateur = file_get_contents("Vues/ajout_utilisateur.tpl");

                        foreach($users as $user){
                                $c = str_replace("<!--Nom-->", $user->Nom, $utilisateur);
                                $c = str_replace("<!--Prenom-->", $user->Prenom, $c);
                                $c = str_replace("<!--Mail-->", $user->Mail, $c);
                                $c = str_replace("<!--Niveau-->", $user->Niveau, $c); 
                                $c = str_replace("<!--ID-->", $user->Id_Utilisateur, $c);
                                $ContentView .= $c;
                        }

                        
    
                        
                        $template = str_replace("<!--ContentView-->", $utilisateur, $template);
                                return str_replace("<!--baniere-->", $baniere, $template);
                }

    }