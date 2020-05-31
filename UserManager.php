<?php

class UserManager extends Manager{
   
    function __construct(){
        $this->className="User";
    }



    public function create($objet){
        $sql="insert into user (id,fullName,login,pwd,profil,score) values (".$objet->getId().",".$objet->getFullname().",".$objet->getLogin().",".$objet->getPwd().
        ",".$objet->getProfil().",".$objet->getScore().")";
        //die($sql);
        return $this->ExecuteUpdate($sql)!=0;

    }
    /*public function update($objet,$id){
        
        $sql="UPDATE user SET  fullname=[.$objet->getFullname($fullName).],login=[.$objet->setLogin($login).],pwd=[.$objet->setPwd($pwd).],profil=[.$objet->setProfil($profil).],score=[.$objet->getScore($score).] WHERE id=$id";
        //die($sql);
        return $this->ExecuteUpdate($sql)!=0;

    }*/
    public  function delete($id){
      $sql="DELETE FROM user WHERE id='$id' ";

      return $this->ExecuteUpdate($sql)!=0;
    }
    public function findAll(){

        $sql="select fullName,score from user";
        $results=$this-> ExecuteSelect($sql);
        $scoreMax=[];
        $max=0;
        foreach ($results as $result => $value) {
            if($result=="score"){
                for ($i=0; $i < 5; $i++) { 
                    foreach($result as $value){
                        
                        if($value>$max){
                            $max=$value;
                            $scoreMax[]=$result;

                        }
                    }
                    
                }
            }
        }

        return $scoreMax ;

       // afficher les 5 meilleurs scores result['fullName'] result['score']
    }
    public function findById($id){

        $sql="select score from user where id='$id'";
        
       return $this-> ExecuteSelect($sql);

    }  

    public function getUserByLoginAndPwd($login,$pwd){
       $sql="select * from user where login='$login' and pwd='$pwd'";
       return $this-> ExecuteSelect($sql);
    } 
}