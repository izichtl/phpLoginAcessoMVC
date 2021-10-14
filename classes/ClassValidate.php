<?php
namespace Classes;
use Models\ClassCadastro;
use ZxcvbnPhp\Zxcvbn;
use Classes\ClassPassword;
use Classes\ClassSessions;
use Models\ClassLogin;

class ClassValidate{
    private $erro=[];
    private $cadastro;
    private $password;
    private $login;
    private $session;

    public function __construct(){
        $this->cadastro = new ClassCadastro();
        $this->password = new ClassPassword();
        $this->login = new ClassLogin();
        $this->session = new ClassSessions();
    }
    public function getErro(){
        return $this->erro;
    }
    public function setErro($erro){
        array_push($this->erro, $erro);
    }
    #valida se os campos desejados foram preenchidos
    public function validateFields($par){
        $i = 0;
        foreach($par as $key => $value){
            if(empty($value)){
                $i++;
            }
        }
        if($i==0){
            return true;
        }else{
            $this->setErro(erro: "Preencha todos os dados!");
            return false;
        }
    }
    #validacao do input as email
    public function validateEmail($par){
        if(filter_var($par, filter: FILTER_VALIDATE_EMAIL)){
            return true;
        }else{
            $this->setErro(erro: "Por favor, preencha um email válido");
            return false;
        }
    }
    #valida se o email já é cadastrado
    public function validateIssetEmail($email, $action=null){
        $b=$this->cadastro->getIssetEmail($email);
        if($action==null){
            if($b > 0){
                $this->setErro("Email já cadastrado, por faça login");
                return false;

            }else{
                return true;
            }
        }else{
            if($b > 0){
                return true;
            }else{
                $this->setErro("Email não cadastrado, por cadastrar");
                return false;
            }

        }
    }
    #valida o formato da data
    public function validateData($par,){ 

        $data= \Datetime::createFromFormat("d/m/Y", $par);
        if(($data) && ($data->format(format: "d/m/Y") === $par)){
            return true;
        }else{
            $this->setErro(erro: "Data Inválida!");
            return false;
        }

    }
    #verifica se a senha é igual a confirmação de senha
    public function validateConfSenha($senha, $senhaConfi){
        if($senha === $senhaConfi){
            return true;
        }else{
            $this->setErro("Senha e Confirmação não conferem!");
            return false;
        }
    }
    #verifica a força da senha
    public function validateStrongSenha($senha, $par=null){
        $zxcvbn = new Zxcvbn();
        $force = $zxcvbn->passwordStrength($senha);
        if($par==null){
            if($force['score'] >= 1){
                return true;
            }else{
                $this->setErro("Por favor, use uma senha mais forte");
            }
        }else{
            /*login*/
        }
        echo $force['score'];
    }
    #verifica se senha digitada pertence ao usuario
    public function validateCaptcha($recaptchaToken, $score=0.1){
        $return=file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=".SECRETKEY."&response={$recaptchaToken}");
        $response=json_decode($return);
        if($response->sucess == true && $response->score >= $score){
            return true;
        }else{
            $this->setErro("Captcha Invalido");
        }

    }

    public function validateSenha($email, $senha){
        if($this->password->verifyHash($email, $senha)){
            return true;
        }else{
            $this->setErro("Usuário ou senha");
        }
    }

    #faz a verificaçao  final antes de enviar ao banco
    public function validateFinalCad($arrCadastro){
        if(count($this->getErro()) > 0 ){
            $arrResponse=[
                "retorno"=>"erro",
                "erros"=>$this->getErro()
            ];
        }else{
            $arrResponse=[
                "retorno"=>"success"
            ];
            //$this->cadastro->insertCad($arrCadastro); 
        }
        return json_encode($arrResponse);


    }
    
    public function validateAttemptLogin(){

        if($this->login->countAttempt() >= 5){
            $this->setErro("Você realizou mais do 5 tentativas, aguarde 20 minutos!");
            $this->tentativas=true;          
        }else{
            $this->tentativas=false;          
            return false;          
        }
    }
    #Verifica se tem erros ao logar, para salvar as tentativas
    public function validateFinalLogin($email){

        if(count($this->getErro()) > 0){
            $this->login->insertAttempt();
        }
        else{
            $this->login->deleteAttempt();
            $this->session->setSession($email);
        }
    }
}
?>