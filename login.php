<?php
   
   session_start();

    include('functionnettoyer.php');
    //include('functionerreur.php');

    //var_dump($_SESSION['token']);
    //var_dump($_POST['token']);
    if (isset($_SESSION['token']) && isset($_POST['token']) && !empty($_SESSION['token']) && !empty($_POST['token']))
        {
            if ($_SESSION['token'] == nettoyer($_POST['token']))
            {
                if($_SERVER['HTTP_REFERER'] === "http://".$_SERVER['SERVER_NAME']."/formlog.php" && $_SERVER['REQUEST_METHOD'] == 'POST')
                    {
                        $email = nettoyer($_POST["login"]);
                        $mdp = nettoyer($_POST["mdp"]);
                        $souvenir = nettoyer($_POST["souvenir"]);
                
                        if($email=="user@email.com" && $mdp =="123456")
                        {
                            $_SESSION['login'] = $email;
                            $_SESSION['mdp'] = hash('sha256', $mdp);
                            
                
                            //DEBUT COOKIES POUR SOUVENIR
                                if(isset($souvenir) && $souvenir == "on")
                                {
                                    setcookie('login', hash('sha256'), $login, time()+1800, null, null, false, true);
                                    setcookie('mdp', hash('sha256'), $mpd, time()+1800, null, null, false, true);
                                    setcookie('color', 'indianred', time()+1800, null, null, false, true);
                                }
                            //FIN COOKIE
                            header('location:admin.php');     
                        }
                        else
                        {   
                            header('location:formlog.php?erreur=1');
                        }
                } else
                    header('location:formlog.php?erreur=2');
        } else   
            header('location:formlog.php?erreur=3');
        }   
    
?>

