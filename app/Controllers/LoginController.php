<?php

namespace App\Controllers;

use App\Libraries\BaseController;
use App\Libraries\Request;
use App\Models\UserModel;

class LoginController extends BaseController
{
    public function login(Request $request)
    {
        $email = $request->getInput('email');
        $password = $request->getInput('password');
        $model = new UserModel();
        $user = $model->select(null, [
            ['email', $email],
            ['estado', 1]
        ]);
        if (!$user) {
            putFlashMessage('El usuario no existe');
            redirect();
            return;
        } else {
            if (!password_verify($password, $user[0]['password'])) {
                putFlashMessage('Las credenciales no coinciden');
                redirect();
            }else{
                
                sessionPut('auth',
                 [
                     'id'=>$user[0]['id'],
                     'nombre'=>$user[0]['nombre'],
                     'email'=>$user[0]['email'],
                     'role_id'=>$user[0]['role_id'],
                 ]   
                );
                
                redirect('/dashboard');
            }
        }

    }

}
