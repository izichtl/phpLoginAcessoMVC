<?php
namespace Classes;
use Models;
use Traits\TraitGetIp;
class ClassSessions{
    private $trait;
    private $login;
    private $timeSession=1200;
    private $timeCanary=300;
    
    public function __construct(){

        if(session_id() == ''){
            ini_set("session.save.handler","files");
            ini_set("session.use_cookies",1);
            ini_set("session.use_only_cookies",1);
            ini_set("session.cookie_domain", DOMAIN);
            ini_set("session.cookie_httponly", 1);
            if(DOMAIN != "localhost"){
                ini_set("session.cookie_secure", 1);
                ini_set("seesion.entropy_lenght", 512);
                ini_set("seesion.entropy_file", '/dev/urandom');
                ini_set("seesion.hash_function", 'sha256');
                ini_set("seesion.hash_bits_per_character", 5);
                session_start();
            }
        }
        $this->login=new Models\ClassLogin();
        $this->trait = TraitGetip::GetUserIp();
    }
    #verifica a legitimidade da sessao
    public function setSessionCanary($par=null){
        session_regenerate_id(true);
        if($par==null){
            $_SESSION['canary']=[
            "birth"=> time()];
        }else{
            $_SESSION['canary']['birth']=time();
        }

    }

    public function verifyIDSessions(){
        if(!isset($_SESSION['canary'])){
            $this->setSessionCanary();
        }
        if($_SESSION['canary']['IP'] !== $this->trait){
            $this->destructSessions();
            $this->setSessionCanary();
        }
        if($_SESSION['canary']['birth'] < $this->timeCanary){
            $this->setSessionCanary("time");
        }
    }


    public function setSession($email){
        $this->verifyIDSessions();
        $_SESSION["login"]=true;
        $_SESSION["time"]=time();
        $_SESSION["name"]=$this->login->getDataUser($email)['data']['nome'];
        $_SESSION["email"]=$this->login->getDataUser($email)['data']['email'];
        $_SESSION["permition"]=$this->login->getDataUser($email)['data']['permissoes'];

    }
    public function verifyInsideSession(){
        $this->verifyIDSessions();
        if(isset($_SESSION["login"])){
            $this->destructSessions();
            echo "
                <script>
                    alert('Você não esta logado');
                    window.location.href='".DIRPAGE."views/login';
                </script>
                ";
        }else{
            if($_SESSION["time"] >= time() - $this->timeSession){
                $_SESSION["time"]=time();
            }else{
                $this->destructSessions();
                echo "
                
                <script>
                    alert('Sua sessão expirou, faça login novamente! ');
                    alert({$_SESSION['login']});
                    window.location.href='".DIRPAGE."views/login';
                </script>
                ";
            }
        }
        

    }
    #destroi a session <> 
    public function destructSessions(){
        foreach (array_keys($_SESSION) as $key){
            unset($_SESSION[$key]);
        }

    }
}
?>