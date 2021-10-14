<?php

#Camiinhos Absolutos
$pastaInterna="crudphp/loginAcesso/";
define('DIRPAGE', "http://{$_SERVER['HTTP_HOST']}/{$pastaInterna}");

if(substr($_SERVER['DOCUMENT_ROOT'], -1) == '/'){
    $barra="";
} else{
    $barra="/";
}

define('DIRREQ', "{$_SERVER['DOCUMENT_ROOT']}{$barra}{$pastaInterna}");

#Atalhos
define('DIRING', DIRPAGE.'img/');
define('DIRCSS', DIRPAGE.'lib/css/');
define('DIRJS', DIRPAGE.'lib/js/');

#DataBase config

define('HOST', 'localhost');
define('DB', 'linkaria');
define('USER', 'root');
define('PASS', '');

define('SITEKEY', '6LfSeKgaAAAAAP704tc_bJHiiO3j7tuSItncjcYO');
define('SECRETKEY', '6LfSeKgaAAAAACXHodzUqBnqc4QIC_jcIKj4IAEP');

define("DOMAIN", $_SERVER["HTTP_HOST"]);