<?php
namespace Models;

class ClassCadastro extends ClassCrud{


    #vai chamar insert da class crud através do extendes.
    public function insertCAD($arrCadastro){
        $this->insertDB(
            "users",
            "?,?,?,?,?,?,?,?,?",
            array(
                0,
                $arrCadastro['nome'],
                $arrCadastro['sobrenome'],
                $arrCadastro['email'],
                $arrCadastro['hashSenha'],
                $arrCadastro['dataNascimento'],
                $arrCadastro['dataCreate'],
                'user',
                'confirmation',
            )
            );
        $this->insertDB(
            "confirmation",
            "?,?,?",
            array(
                0,
                $arrCadastro['email'],
                $arrCadastro['token'],
            )
            );
    }
    #vai validar se o email já existe na base de dados.
    public function getIssetEmail($email){
        $r=$this->selectDB(
            "email",
            "users",
            "where email=?",
            array(
                $email,
            )
            );
        return $rr=$r->rowCount();
    }
}
