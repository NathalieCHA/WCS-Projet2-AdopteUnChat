<?php

namespace App\Controller\Private;

use App\Model\Private\ConnexionManager;
use App\Controller\AbstractController;

class ConnexionController extends AbstractController

//$itemManager = new ItemManager();
        //$items = $itemManager->selectAll('title');
{
    public function connexion()
    {
        $manager = new ConnexionManager;
        $resultat = $manager->compare();
        if($resultat){
            session_start();
            $_SESSION ["connexion"] = 1;
            header ('location: nom de la route');   
        }else {
            $error = "identifians incorrects";
            return $this->twig->render ("Private/connexion.html.twig" ,['error'=>$error]);            
        }       
    }
    
    
    public function login(){
        
        return $this->twig->render ("Private/connexion.html.twig");
    }

}


