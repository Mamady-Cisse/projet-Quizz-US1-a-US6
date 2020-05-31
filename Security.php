<?php
   
  class Security extends Controller {

    public function __construct(){
        $this->dirname="security"; 
    }

    public function index(){
       $this->layout="layout_connexion";
       $this->views="connexion";
       $this->render();
      
    }
    public function seConnecter(){
            echo 1; 
      
    }

    public function seDeconnecter(){
         echo 0; 
    }
    public function creerUtlisateur(){
        
    }

   }
