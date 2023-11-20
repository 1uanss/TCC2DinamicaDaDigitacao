<?php

namespace App\Controllers;

class Login extends BaseController
{
    public function index()
    {
        $session = session();
        if ($session->get('email') != null) {
            return redirect('Home');
        }

        return view('login');
    }

    public function login(){
        $session = session();
        $usersModel = new \App\Models\UsuariosModel();
        $resultado = $usersModel->getUsers($_POST["username"],$_POST["password"]);
        if(count($resultado) > 0){
            return redirect('fase1');
        }
        return redirect('login');
    }
}