<?php
namespace Classes;

class ClassLayout{

    public static function setHead($title, $author, $description){

        $html="<!DOCTYPE html>\n";
        $html.="<html lang='pt-br'>\n";
        $html.="<head>\n";
        $html.="<meta charset='UTF-8'>\n";
        $html.="<meta http-equiv='X-UA-Compatible' content='IE=edge'>\n";
        $html.="<meta name='viewport' content='width=device-width, initial-scale=1.0'>\n";
        $html.="<meta name='author' content='$author'>\n";
        $html.="<meta name='format-detection' content='telephone=no'>\n";
        $html.="<meta name='description' content='$description'>\n";
        //$html.="<link media='screen' type='text/css' rel='stylesheet' href='grid.css'>\n";
        $html.="<link rel='preconnect' href='https://fonts.gstatic.com'>\n";
        $html.="<link href='https://fonts.googleapis.com/css2?family=Fira+Sans&display=swap' rel='stylesheet'>\n";
        $html.="<link rel='shortcut icon' type='image/jpg' href='./img/favico.ico'/>\n";
        $html.="<link href='https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css' rel='stylesheet' integrity='sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6' crossorigin='anonymous'>\n";
        $html.="<title>$title</title>\n";
        $html.="</head>\n";
        $html.="<body>\n";
        echo $html;

    }
    public static function setHeader(){
        $html="<div class='container'>\n";
        $html.="<div class='row'>\n"; 
        $html.="<div class='col-sm'>\n"; 
        $html.="<header class='d-flex flex-wrap justify-content-around py-3 mb-4 border-bottom'>\n";
        $html.="<a href='".DIRPAGE."views/index' class='d-flex align-items-center mb-3 mb-md-0 me-md-auto text-dark text-decoration-none'>\n";
        $html.="<span class='fs-4'>Linkaria</span>\n";
        $html.="</a>\n";
        $html.="<ul class='nav nav-pills'>\n";
        $html.="<li class='nav-item'><a href='".DIRPAGE."views/index' class='nav-link active'>Home</a></li>\n";
        $html.="<li class='nav-item'><a href='".DIRPAGE."views/login' class='nav-link'>Login</a></li>\n";
        $html.="<li class='nav-item'><a href='".DIRPAGE."views/cadastro' class='nav-link'>Cadastro</a></li>\n";
        //$html.="<li class='nav-item'><a href='#' class='nav-link'>FAQs</a></li>\n";
        $html.="<li class='nav-item'><a href='#' class='nav-link'>About</a></li>\n";
        $html.="</ul>\n";
        $html.="</div>\n";
        $html.="</div>\n";
        $html.="</header>\n";
        echo $html;

    }
    public static function setFooter(){
        
        $html="<script src='".DIRJS."zepto.min.js'></script>\n";
        $html.="<script src='".DIRJS."vanilla-masker.min.js'></script>\n";
        $html.="<script src='".DIRJS."bootstrap.js'></script>\n";
        //$html.="<script src='https://www.google.com/recaptcha/api.js?render=".SITEKEY."'></script>\n";
        $html.="<script src='".DIRJS."js.js'></script>\n";
        $html.="<footer id='footer'>\n";
        $html.="<p>Desenvolvido por Ivan Zichtl &#169; </p>\n";
        $html.="</footer>\n";
        $html.="</div>\n";
        $html.="</body>\n";
        $html.="</html>\n";
        echo $html;
        

    }
}