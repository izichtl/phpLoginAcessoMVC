<?php
namespace Classes;
use \Models\ClassLogin;

class ClassPassword{
    private $db;
    public function __construct(){
        $this->db = new ClassLogin();
    }
    #cria o hash da senha
    public function passwordHash($senha){
        return password_hash($senha, PASSWORD_DEFAULT);
    }
    #cria o hash da senha
    public function verifyHash($email, $senha){
        $hashDB=$this->db->getDataUser($email);
        return password_verify($senha, $hashDB["data"]["senha"]);
    }
}