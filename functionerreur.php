<?php 


    function affiche_erreur($erreur)
    {
                $message = nettoyer($erreur);
                intval($erreur); 
        
                switch($erreur){
                    case 0:
                        $messsage = "Erreur inconnue";
                        break;
                    case 1:
                        $message = "Erreur People !";
                        break;
                    case 2:
                        $message = "Erreur Session !";
                        break;
                    case 3:
                        $message="Erreur login password";
                        break;
                    default:
                        break;
                }

        return ($message);
    }
    
    


?>