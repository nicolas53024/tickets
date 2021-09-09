<?php


namespace App\Controllers;

use App\Libraries\BaseController;
use App\Models\UserModel;

class HomeController extends BaseController
{
    public function index()
    {
        return view('home');
    }

}