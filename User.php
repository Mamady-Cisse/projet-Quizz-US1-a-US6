<?php
class User implements IManager{
    private $id;
    private $fullName;
    private $login;
    private $pwd;
    private $profil;
    private $avatar;
    private $score=null;
    private $allScore=[];


    public function getId(){
        return $this->id;
    }

    public function getFullName(){
        return $this->fullName;
    }
    public function getlogin(){
        return $this->login;
    }
    public function getPwd(){
        return $this->pwd;
    }
    public function getProfil(){
        return $this->profil;
    }
    public function getAvatar(){
        return $this->avatar;
    }
    public function getScore(){
        return $this->score;
    }

    public function setlogin($login){
        $this->login=$login;
    }

    public function setFullName($fullName){
        return $this->fullName=$fullName;
    }

    public function setPwd($pwd){
        $this->pwd=$pwd;
    }

    public function setProfil($profil){
        $this->profil=$profil;
    }

    public function setScore(){
        $this->score=calculScore();
        $this->Allscore[]=$this->score;
    }


    public function calculScore(){

        return null;

    }
    

    public function __construct($row=null){
        if($row!=null){
            $this->hydrate($row);
        }
    }

    public function hydrate($row){
       $this->id=$row['id'];
       $this->fullName=$row['fullName'];
       $this->profil=$row['profil'];
       $this->pwd=$row['pwd'];
       $this->score=$row['score'];
       $this->login=$row['login'];
    }
}