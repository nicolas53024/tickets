<?php


namespace App\Controllers;

use App\Libraries\BaseController;

class HomeController extends BaseController
{
    public function index($request)
    {
        echo 'mi primera ruta';
    }

    public function index2()
    {
        echo 'mi segunda ruta';
    }
}