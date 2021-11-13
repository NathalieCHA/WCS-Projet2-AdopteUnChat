<?php

namespace App\Controller\Private;

use App\Model\Private\ConnexionManager;
use App\Controller\AbstractController;

class ConnexionController extends AbstractController

//Creation de la session
{
    public function connexion()
    {
        $manager = new ConnexionManager;
        $resultat = $manager->compare();
        if($resultat){
            session_start();
            $_SESSION ["login"] = $_POST['nom'];
            header ('location: /private/chats');
        }else {
            $error = "identifians incorrects";
            return $this->twig->render ("Private/connexion.html.twig" ,['error'=>$error]);            
        }       
    }
    
    public function logout()
    {
        session_start();
        
            $_SESSION = array();
            if (isset($_COOKIE[session_name()]))
            {
                setcookie(session_name(),'',time()-4200, '/');
            }

            session_destroy();

            header('Location: /private/connexion'); 
    }
}


