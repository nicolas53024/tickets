<?php


namespace App\Libraries;

use Exception;



class RouterResolver
{
    public static function get(String $controller,String $method,$request)
    {
        $controller=new $controller;
        if(! method_exists($controller,$method)){
            throw new Exception(sprintf("Method Not Exists in %s",$controller::class) ,500,null);
        }
         call_user_func_array([$controller,$method], array($request));
    }
}