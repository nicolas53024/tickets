<?php


namespace App\Libraries;

use Exception;


class RouterResolver
{
    public static function get(string $controller, string $method, $request)
    {
        $controller = new $controller;
        $request = new  Request($request);
        if (!method_exists($controller, $method)) {
            throw new Exception(sprintf("Method Not Exists in %s", $controller::class));
        }
        call_user_func_array([$controller, $method], [$request]);
    }

    public static function post(string $controller, string $method, $request)
    {

        $controller = new $controller;
        $request = new  Request($request);
        if (!method_exists($controller, $method)) {
            throw new Exception(sprintf("Method Not Exists in %s", $controller::class));
        }
        call_user_func_array([$controller, $method], [$request]);
    }

}