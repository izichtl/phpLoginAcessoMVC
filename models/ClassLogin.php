<?php
namespace Models;

use Traits\TraitGetIp;


class ClassLogin extends ClassCrud{
    private $trait;
    private $dateNow;

    public function __construct(){
        $this->trait = TraitGetip::GetUserIp();
        $this->dateNow = date("Y-m-d H:i:s");
    }
    #retorna dados usuário LOGIN
    public function getDataUser($email){
        $b=$this->selectDB(
            "*",
            "users", 
            "where email=?",
            array( 
                $email
            )
        );
        $f=$b->fetch(\PDO:: FETCH_ASSOC);
        $r=$b->rowCount();
        return $arrData=[
            "data"=>$f,
            "rows"=>$r
        ];
    }

    #Conta as tentativa de login
    public function countAttempt(){
            $b=$this->selectDB(
                "*",
                "attempt",
                "where ip=?",
                array(
                    $this->trait
                    )
            );
            $r=0;
            while($f=$b->fetch(\PDO::FETCH_ASSOC)){
                if(strtotime($f["date"]) > strtotime($this->dateNow) - 1200){
                    $r++;
                }
            };
            return $r;
        
    }
    #Conta as tentativa de login
    public function deleteAttempt(){
        $this->deleteDB(
            "attempt",
            "ip=?",
            array(
                $this->trait
            )
            );

    }
    
    #Conta as tentativa de login
    public function insertAttempt(){
        if($this->countAttempt() < 5){
            $this->insertDB(
                "attempt",
                "?,?,?",
                array(
                    0,
                    $this->trait,
                    $this->dateNow

                )
                );
        }

    }
}