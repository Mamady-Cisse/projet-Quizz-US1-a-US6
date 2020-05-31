<?php
 abstract class Manager{
    
       private  $pdo=null;
       protected $className;
   
      private   function getConnexion(){
        try{
           
           if($this->pdo==null){
            $this->pdo = new PDO('mysql:host=localhost;dbname=quizz', 'root','');
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION );
            $this->pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE,PDO::FETCH_ASSOC);

          }
        }catch(Exception $ex ){
              die("Verifier les Parametres de Conexion".$ex->getMessage());
        }
      
      }

      private   function CloseConnexion(){
                 if($this->pdo!=null) {
                  $this->pdo=null;
                 } 
         }

    public function ExecuteSelect($sql){
            $this->getConnexion();
             $query=$this->pdo->query($sql);
             $data=[];
             while($row=$query->fetch()){
              $data[]=new $this->className($row);
             }
             $this->closeConnexion();
             return $data;

    }
    public function ExecuteUpdate($sql){
         $this->getConnexion();
         //$nbreLigne represente le nombre de ligne modifiée par la requete
          $nbreLigne = $this->pdo->exec($sql);
       $this->closeConnexion();
      return  $nbreLigne;

    }
 
    public abstract function create($objet);
    public abstract function update($objet,$id);
    public abstract function delete($id);
    public abstract function findAll();
    public abstract function findById($id);

  }
?>