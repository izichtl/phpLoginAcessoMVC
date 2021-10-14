<?php
namespace Traits;

trait TraitParseUrl{
    public static function parseUrl($parametro=null){
        $url=explode("/", rtrim($_GET['url'], FILTER_SANITIZE_URL));
        if($parametro == null){
            return $url;
        }else{
            return $url[$parametro];
        }
    }
}