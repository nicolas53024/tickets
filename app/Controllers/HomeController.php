<?php


namespace App\Controllers;

use App\Libraries\BaseController;
use App\Libraries\Request;

class HomeController extends BaseController
{
    public function index(Request $request)
    {
        return view('home',[
            'nombre'=>'Nicolas',
            'apellido'=>'Aldana'
        ]);
    }

    public function index2($request)
    {
        echo 'mi segunda ruta';
    }
}