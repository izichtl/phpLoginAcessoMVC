<?php
$objPass=new \Classes\ClassPassword();

if(isset($_POST['nome'])){
    $nome=filter_input(type: INPUT_POST, var_name: 'nome', filter: FILTER_SANITIZE_FULL_SPECIAL_CHARS);
}else{
    $nome=null;
}
if(isset($_POST['sobrenome'])){
    $sobrenome=filter_input(type: INPUT_POST, var_name: 'sobrenome', filter: FILTER_SANITIZE_FULL_SPECIAL_CHARS);
}else{
    $sobrenome=null;
}

if(isset($_POST['email'])){
    $email=filter_input(type: INPUT_POST, var_name: 'email', filter: FILTER_VALIDATE_EMAIL);
}else{
    $email=null;
}

if(isset($_POST['dataNascimento'])){
    $dataNascimento=filter_input(type: INPUT_POST, var_name: 'dataNascimento', filter: FILTER_SANITIZE_FULL_SPECIAL_CHARS);
}else{
    $dataNascimento=null;
}

if(isset($_POST['senha'])){
    $senha=$_POST['senha']; 
    $hashSenha=$objPass->passwordHash($senha); 
}else{
    $senha=null;
    $hashSenha=null;
}
if(isset($_POST['senhaConfi'])){$senhaConfi=$_POST['senhaConfi'];
}else{$senhaConfi=null;}

if(isset($_POST['g-recaptcha-response'])){
    $recaptchaToken=$_POST['g-recaptcha-response'];
}else{$recaptchaToken=null;}

$dataCreate=date(format:"Y-m-d H:i:s");
$token=bin2hex(random_bytes(length: 64));

$arrCadastro=[
    "nome"=>$nome,
    "sobrenome"=>$sobrenome,
    "email"=>$email,
    "dataNascimento"=>$dataNascimento,
    "senha"=>$senha,
    "senhaConfi"=>$senhaConfi,
    "hashSenha"=>$hashSenha,
    "dataCreate"=>$dataCreate,
    "token"=>$token,
];