<?php


namespace App\Controllers;

use App\Libraries\BaseController;

class HomeController extends BaseController
{
    public function index($request)
    {
        
        
        echo 'mi primer controlletr ';
    }

    public function index2()
    {
        echo 'mi segunda ruta';
    }
}